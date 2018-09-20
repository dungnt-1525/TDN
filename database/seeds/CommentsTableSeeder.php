<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('comments')->truncate();
        
        DB::table('comments')->insert([
            'title' => 'Good',
            'content' => 'I like it',
            'user_id' => 1,
            'comment_type' => 1,
            'comment_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'title' => 'Bad',
            'content' => 'I dont like it',
            'user_id' => 1,
            'comment_type' => 2,
            'comment_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('comments')->insert([
            'title' => 'Very Good',
            'content' => 'I want to buy it',
            'user_id' => 2,
            'comment_type' => 2,
            'comment_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
