<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('colors')->truncate();
        
        DB::table('colors')->insert([
                'name' => 'Grey',
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('colors')->insert([
                'name' => 'Yellow',
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('colors')->insert([
                'name' => 'Black',
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
