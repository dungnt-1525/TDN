<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => md5('123456'),
            'role_id' => '1',
            'phone' => '0968382511',
            'sex' => 0,
            'birthday' => date('y-m-d'),
            'address' => 'Hoc Vien BCVT - Nguyen Trai',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => md5('123456'),
            'role_id' => '2',
            'phone' => '0972512611',
            'sex' => 0,
            'birthday' => date('y-m-d'),
            'address' => 'Dai hoc thuy loi',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'Iadmin2@gmail.com',
            'password' => md5('123456'),
            'role_id' => '1',
            'phone' => '0916563363',
            'sex' => 0,
            'birthday' => date('y-m-d'),
            'address' => 'Kinh te quoc dan',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
