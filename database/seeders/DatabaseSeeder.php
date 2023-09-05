<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            city::class,
            adress::class,
            brand::class,
            category::class,
            cupon::class,
            global_size::class,
            offer::class,
            product::class,
            price::class,
            color::class,
            color_product::class,
            size::class,
            size_product::class,
            role::class,
            user::class
        ]);
    }
}
