<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(CategoriesTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(RatesTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(CouponProgramTableSeeder::class);
        $this->call(ProductAttributesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
