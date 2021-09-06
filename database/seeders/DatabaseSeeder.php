<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::insert('insert into roles (id, role_name) values (?, ?)', [1, 'ADMIN']);
        DB::insert('insert into roles (id, role_name) values (?, ?)', [2, 'USER']);
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('123123123'),
        ]);
    }
    
}
