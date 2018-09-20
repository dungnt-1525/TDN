<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('payment_methods')->truncate();
        
        DB::table('payment_methods')->insert([
            'name' => 'Thanh toan qua the ATM',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Thanh toan bang the tin dung',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Thanh toan khi nhan hang',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
