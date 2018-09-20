<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('orders')->truncate();
        
        DB::table('orders')->insert([
            'user_id' => '2',
            'payment_method_id' => 1,
            'amount' => 120000,
            'phone' => '0927632764',
            'name' => 'Mai Thi Nham',
            'zipcode' => '100000',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('orders')->insert([
            'user_id' => '2',
            'payment_method_id' => 2,
            'amount' => 100000,
            'phone' => '0176372162',
            'name' => 'Hong Phuong',
            'zipcode' => '100000',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('orders')->insert([
            'user_id' => '3',
            'payment_method_id' => 3,
            'amount' => 50000,
            'phone' => '0973826322',
            'name' => 'Nguyen Trang',
            'zipcode' => '65000',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
