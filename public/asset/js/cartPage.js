
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

}



function WriteProductsInPageChart(items){

   var html = "";

    if(items != null && items.length > 0) {
    html = `   <table class="table table-striped table-hover cart-list">
            <thead>
            <tr>
                <th>Slika</th>
                <th>Naziv</th>`
             /* <th>Boja</th>
                <th>Velicina</th>*/
               html+=`<th>Cena/kom.</th>
                <th>Kolicina</th>
                <th>Ukupno</th>
                <th>Ukloni</th>
            </tr>
            </thead>
            <tbody id="container-items">`





       items.forEach(e => {
           html += `
             <tr id="${e.id}">
                <td class="column-with-img">
                    <div class="thumb_cart">
                        <img src="${globalUrl}/asset/img/${e.src}" data-src="asset/img/${e.src}" class="img-fluid lazy" alt="Image">
                    </div>
                </td>
                <td class="column-with-title">
                    <span >${e.name.charAt(0).toUpperCase() + e.name.slice(1)}</span>
                </td>`
                /*<td>
                    <strong>${e.colors[0].color.charAt(0).toUpperCase() + e.colors[0].color.slice(1)}</strong>
                </td>
                <td>
                    <strong>${e.sizes[0].size.charAt(0).toUpperCase() + e.sizes[0].size.slice(1)}</strong>
                </td>*/
                html+=`
                <td>
                    <strong id="single-price-${e.id}">${WriteMoney(parseInt(e.price_with_offer))}</strong> RSD
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" value="${e.quantity}" id="quantity-${e.id}" data-id="${e.id}" class="quantity qty2" name="quantity_1">
                        <div data-id="${e.id}" data-cart-product-id="${e.id_cart_product}" data-operator="inc" class="inc button_inc">+</div><div data-operator="dec" data-cart-product-id="${e.id_cart_product}" data-id="${e.id}" class="dec button_inc">-</div></div>
                    </div>
                </td>
                <td>
                    <strong class="sum-price" id="sum-price-${e.id}">${ WriteMoney(parseInt(e.price_with_offer) * e.quantity)}</strong> RSD
                </td>
                <td class="options">
                    <a href="#" class="deletee" data-id="${e.id}"><i class="ti-trash"></i></a>
                </td>
            </tr>
           `
       })
        html +=`</tbody></table>`;
   }else{
       html = "Vasa korpa je truntno prazna";
       $("#myBtn").remove();
   }

    $("#table").html(html);

    CalculateTotalForAllCart();

    addEvents();

}
function SubmitForm1(e){
    $("#checkout-spiner-1").removeClass("d-none")
    e.preventDefault()
    var first = $("#first-name-1").val();
    var last = $("#last-name-1").val();
    var email = $("#email-name-1").val();
    var phone = $("#phone-name-1").val();
    if(!isLogedIn){
        var ides = [];
        var items = JSON.parse(localStorage.getItem("cart"));
        items.forEach(e =>{
            let obj = {
                id:e.id,
                quantity:e.quantity
            };
            ides.push(obj);
        })
        $.ajax({
            url:AddItemsToCartForGhost,
            method:"PUT",
            dataType:"JSON",
            data:{
                "items":items,
                "_token":csrf
            },
            success:function (data){

                html= `<input type="hidden" name="id_cart" value="${data}"/>`
                $("#form-1").append(html);
                localStorage.clear("cart");
                $("#form-1").submit();


            },
            error:function(xhr){
                console.log(xhr)
            }
        })
    }else{
        $("#form-1").submit();

    }

}


function SubmitForm2(e){
    e.preventDefault();
    $("#checkout-spiner-2").removeClass("d-none")

    if(!isLogedIn){
        var ides = [];
        var items = JSON.parse(localStorage.getItem("cart"));
        items.forEach(e =>{
            let obj = {
                id:e.id,
                quantity:e.quantity
            };
            ides.push(obj);
        })
        $.ajax({
            url:AddItemsToCartForGhost,
            method:"PUT",
            dataType:"JSON",
            data:{
                "items":items,
                "_token":csrf
            },
            success:function (data){
                localStorage.clear("cart");
                console.log(data);
                var html = `<input type="hidden" name="id_cart" value="${data}"/>`
                $("#form-2").append(html);
                $("#form-2").submit();

            },
            error:function(xhr){
                console.log(xhr)
            }
        })
    }
    else{
        $("#form-2").submit();

    }
}

function addEvents() {
    $("#checkout-1").click(function(e){
        SubmitForm1(e)});
    $("#checkout-2").click(function(e){SubmitForm2(e)});

    $("#close-modal-button").click(function (){
        $("#myModal").css("display","none");
    })

    $("#cupon").click(function(){
        var cupon = $("#cupon-text").val();
        SendCuponRequest(cupon);
    })

    $(".button_inc").click(function () {

        var id = $(this).attr("data-id");
        var id_cart_product = $(this).attr("data-cart-product-id")
        var operator = $(this).attr("data-operator");
        var input = null;

        $(".quantity").each(function (e) {

            if ($(this).attr("data-id") == id) {
                input = $(this);
            }
        })

        var value = input.val();

        if (operator == "dec") {
            if (value != 1) {
                input.val(value - 1);
                DecrementQuantityInCart(id,id_cart_product);
            }
        } else {
            input.val(parseInt(value) + 1)
            IncrementQuantity(id);

        }

        CalculateTotalForSingleProduct(id);
        CalculateTotalForAllCart()
    })

    $(".deletee").click(function () {
        var id = $(this).attr("data-id");

        if (isLogedIn) {
            RemoveItemInDataBase(id);
            RemoveItemInChartPageVisualy(id);

        } else {
            var items = JSON.parse(localStorage.getItem("cart"));
            var res = items.filter(e => e.id != id);
            localStorage.setItem("cart",JSON.stringify(res));
            RemoveItemInChartPageVisualy(id);

        }
        CalculateTotalForAllCart();
    })

}

function IncrementQuantity(id){
    if(isLogedIn) {
        $.ajax({
            method: "POST",
            url: urlToAddCart,
            dataType: "JSON",
            data: {
                "_token": csrf,
                "id": id,
            },
            success: function (data, isSuccess, xhr) {


            },
            error: function (xhr) {
                //  alert("Doslo je do greske prilikom komunikacije sa bazom podataka. Pokusajte kasnije. (Problem #18564)")
                console.log(xhr)

            }
        })
    }else{
        let item = new Object();
        item.id = id;
        AddItemToLocaclStorage(new Array(item));
    }
}

function  RemoveItemInChartPageVisualy(id){
    $("#"+id).remove();
    if($("tbody").children().length == 0){
        $("table").remove();
        $("#table").html("<div class='alert'>Vasa korpa je prazna</div>")
        $("#myBtn").remove();
    }
}

function DecrementQuantityInCart(id,idCartProduct){
    if(isLogedIn) {
        $.ajax({
            method: "PATCH",
            url: urlToDecrementQuantity,
            dataType: "JSON",
            data: {
                "csrf": csrf,
                "id": idCartProduct,
            },
            success: function (data, isSuccess, xhr) {

            },
            error: function (xhr) {
                //  alert("Doslo je do greske prilikom komunikacije sa bazom podataka. Pokusajte kasnije. (Problem #18564)")
                console.log(xhr)

            }

        })
    }else{
        DecrementQuantityInLocalStorage(id);
    }

}

function DecrementQuantityInLocalStorage(id){
    var items = JSON.parse(localStorage.getItem("cart"));

    items.forEach(e =>{
        if(e.id == id && e.quantity > 1){
            e.quantity -= 1;
        }

    })

    localStorage.setItem("cart",JSON.stringify(items));
}

function CalculateTotalForSingleProduct(id)
{

    var single = $("#single-price-"+id).html()
    var res = ""
    single = single.toString();
    single = single.split(".");
    single.forEach(e =>{
        res+=e;
    })

    var quantity = $("#quantity-"+id).val()

    var sum = parseFloat(res) * parseFloat(quantity);
    $("#sum-price-"+id).text(WriteMoney(sum));
}

function CalculateTotalForAllCart(offer = 0){

        var total = 0;
        $(".sum-price").each(function(){

            var num = $(this).html();
            var res = ""
            num = num.toString();
            num = num.split(".");
            num.forEach(e =>{
                res+=e;
            })

            total += parseFloat(res);
        })
         $("#totalCart").html(WriteMoney(total));

        if(offer > 0){
            var offerM = parseFloat(Math.round(parseFloat(total) * offer / 100));
            $("#block-offer").removeClass("d-none");

            $("#offer-money").html(WriteMoney(offerM));
            $("#masterTotalCart").html(WriteMoney(total - offerM));

        }else{
            $("#block-offer").addClass("d-none");
            $("#masterTotalCart").html(WriteMoney(total));
        }


}

function SendCuponRequest(cupon){
    $("#cupon span").each(function (){
        $(this).removeClass("d-none")
    })

    $.ajax({
        method:"POST",
        url:urlToCupon,
        data:{
            "cupon":cupon,
            "_token":csrf

        },
        dataType:"JSON",
        success:function(data){
            $("#cupon span").each(function (){
                $(this).addClass("d-none")
            })
            if(data){
                $("#field-offer").addClass("d-none");

                $("#success-offer").removeClass("d-none");

                $("#offer").html(data.offer);

                $(".set-cupon").each(function(){
                    $(this).val(data.cupon);
                })

                CalculateTotalForAllCart(data.offer);

            }else{

                $("#field-offer").removeClass("d-none");

                $("#success-offer").addClass("d-none");
            }
        },
        error:function(xhr){
            console.log(xhr)
            $("#cupon span").each(function (){
                $(this).addClass("d-none")
            })
        }
    })
}


