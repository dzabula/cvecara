<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\InvocieAdminController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\ProductsAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IfNotLogedYet;
use App\Http\Middleware\IfLogedYet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[HomeController::class,"index"])->name("home");
Route::get("/single-category/{id?}",[HomeController::class,"index"])->name("single-category")->whereNumber("id");

/*USER*/
Route::get("/login",[LoginController::class,"index"])->name("login");

Route::post("/loginUser",[LoginController::class,"login"])->name("loginUser")->middleware(IfNotLogedYet::class);
Route::get("/logout",[LoginController::class,"logout"])->name("logout")->middleware(IfLogedYet::class);
Route::post("/registration",[LoginController::class,"registration"])->name("registration")->middleware(IfNotLogedYet::class);
Route::post("/activation-link",[LoginController::class,"activation"])->name("activation-link");
Route::post("/sendMailToChangePassword",[LoginController::class,"sendMailToChangePassword"])->name("sendMailToChangePassword");
Route::post("/changePassword",[LoginController::class,"changePassword"])->name("changePassword");
Route::get("/changePassword",[LoginController::class,"changePassword"])->name("changePasswordGet");
Route::post("/applyChangePassword",[LoginController::class,"applyChangePassword"])->name("applyChangePassword");

/*PRODUCT*/
Route::get("/products",[ProductsController::class,"index"])->name("products");
Route::get("/products-search",[ProductsController::class,"show"])->name("search");
Route::get("/filter-products/{singleCategory?}/{categories?}/{sizes?}/{colors?}/{maxPrice?}/{minPrice?}/{sort?}",function($singleCategory,$categories,$sizes,$colors,$maxPrice,$minPrice,$sort){
    $object = new ProductsController();
    $search_text =  isset($_GET['search-text']) ? $_GET['search-text'] : "";
    return $object->filter($singleCategory,$categories,$sizes,$colors,$maxPrice,$minPrice,$sort,$search_text);

})->whereNumber(['maxPrice','minPrice'])->name("filter");


/*CART*/
Route::get("/cart",[CartController::class,"index"])->name("cart");
Route::post("/add-to-cart",[CartController::class,"store"])->name("addCart");
Route::delete("/deleteCart",[CartController::class,"destroy"])->name("deleteCart");
Route::patch("/decrement-quantity",[CartController::class,"update"])->name("decrement-quantity");
Route::put("/ghost-cart",[CartController::class,"ghost"])->name("ghost-cart");

/*Payament & Ordering*/
Route::post("/cupon",[CuponController::class,"index"])->name("cupon");
Route::post("/order",[InvoiceController::class,"store"])->name("invoice");

/*ADMIN*/
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get("/dashboard", [AdminController::class, "index"])->name("dashboard");

    Route::get("/admin-products", [ProductsAdminController::class, "index"])->name("admin-products");
    Route::get("/admin-products-new", [ProductsAdminController::class, "create"])->name("admin-products-new");
    Route::post("/store-product", [ProductsAdminController::class, "store"])->name("store-product");
    Route::get("/single-products/{id?}", [ProductsAdminController::class, "show"])->name("single-product")->whereNumber("id");
    Route::post("/redelete-products", [ProductsAdminController::class, "redelete"])->name("redelete-product");
    Route::post("/delete-products", [ProductsAdminController::class, "destroy"])->name("delete-products");
    Route::post("/update-product", [ProductsAdminController::class, "update"])->name("update-product");

    Route::get("/single-invoice/{id}", [InvocieAdminController::class, "show"])->name("single-invoice");
    Route::post("/delete-invoice", [InvocieAdminController::class, "destroy"])->name("delete-invoice");
    Route::patch("/change-status-invoice", [InvocieAdminController::class, "changeStatusInvoice"])->name("change-status-invoice");


    Route::get("/statistic", [StatisticController::class, "index"])->name("statistic");
    Route::post("/filter-statistic", [StatisticController::class, "filter"])->name("filter-statistic");
});
