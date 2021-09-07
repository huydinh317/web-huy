<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		['id'=>1, 'fullname' => 'Administrator', 'password'=>bcrypt("123"), 'email' => 'admin@gmail.com', 'phone' => '0123789', 'level' => 1],
    		['id'=>2, 'fullname' => 'Vietpro Academy', 'password'=>bcrypt("123"), 'email' => 'vietpro.edu.vn@gmail.com', 'phone' => '0123789', 'level' => 1],
    		['id'=>3, 'fullname' => 'Member', 'password'=>bcrypt("123"), 'email' => 'member@gmail.com', 'phone' => '0123456789', 'level' => 2],
    	];
    	DB::table('users')->delete();
        DB::table('users')->insert($data);
    }
}
