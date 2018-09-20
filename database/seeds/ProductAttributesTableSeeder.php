<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('product_attributes')->truncate();
        
        DB::table('product_attributes')->insert([
            'color_id' => 1,
            'product_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('product_attributes')->insert([
            'color_id' => 2,
            'product_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('product_attributes')->insert([
            'color_id' => 1,
            'product_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
