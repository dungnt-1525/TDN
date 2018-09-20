<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('orders_detail')->truncate();
        
        DB::table('orders_detail')->insert([
            'quantity' => '2',
            'price_sale' => 30000,
            'order_id' => 1,
            'product_attributes_id' => '1',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

       	DB::table('orders_detail')->insert([
            'quantity' => '3',
            'price_sale' => 20000,
            'order_id' => 1,
            'product_attributes_id' => '2',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('orders_detail')->insert([
            'quantity' => '10',
            'price_sale' => 10000,
            'order_id' => 2,
            'product_attributes_id' => '3',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
