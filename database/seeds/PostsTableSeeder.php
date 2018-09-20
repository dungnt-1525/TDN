<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('posts')->truncate();
        
        DB::table('posts')->insert([
            'title' => 'Cach mua hang tot nhat',
            'slug' => 'cach-mua-hang-tot-nhat',
            'content' => ' content demo 1',
            'img' => '/images/phong-cach-hien-dai.jpg',
            'user_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('posts')->insert([
            'title' => 'Cac mau thiet ke noi that dep',
            'slug' => 'cac-mau-thiet-ke-noi-that-dep',
            'content' => 'content demo 2',
            'img' => '/images/phong-khach-01.jpg',
            'user_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('posts')->insert([
            'title' => 'Cac yeu cau khi thiet ke noi that',
            'slug' => 'cac-yeu-cau-khi-thiet-ke-noi-that',
            'content' => 'content demo 3',
            'img' => '/images/rem-vai-59.jpg',
            'user_id' => 3,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
