<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('coupon_program')->truncate();
        
        DB::table('coupon_program')->insert([
            'product_id' => 1,
            'coupon_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('coupon_program')->insert([
            'product_id' => 1,
            'coupon_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('coupon_program')->insert([
            'product_id' => 2,
            'coupon_id' => 3,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
