<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('coupon')->truncate();
        
        DB::table('coupon')->insert([
            'code' => str_random(10),
            'type' => 1,
            'decrease' => 30,
            'start_at' => date('y-m-d H:i:s'),
            'end_at' => date('y-m-d H:i:s'),
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('coupon')->insert([
            'code' => str_random(10),
            'type' => 2,
            'decrease' => 3000,
            'start_at' => date('y-m-d H:i:s'),
            'end_at' => date('y-m-d H:i:s'),
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('coupon')->insert([
            'code' => str_random(10),
            'type' => 1,
            'decrease' => 20,
            'start_at' => date('y-m-d H:i:s'),
            'end_at' => date('y-m-d H:i:s'),
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
