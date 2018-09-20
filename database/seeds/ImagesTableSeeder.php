<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('images')->truncate();
        
        DB::table('images')->insert([
            'img_path' => 'images/phong-cach-hien-dai.jpg',
            'product_attributes_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('images')->insert([
            'img_path' => 'images/phong-khach-01.jpg',
            'product_attributes_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('images')->insert([
            'img_path' => 'images/giuong-ngu-01.jpg',
            'product_attributes_id' => 3,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
