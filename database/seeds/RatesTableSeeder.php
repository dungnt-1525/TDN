<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('rate')->truncate();
        
        DB::table('rate')->insert([
            'rate_point' => 8,
            'user_id' => 1,
            'product_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('rate')->insert([
            'rate_point' => 10,
            'user_id' => 1,
            'product_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('rate')->insert([
            'rate_point' => 9,
            'user_id' => 1,
            'product_id' => 3,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
