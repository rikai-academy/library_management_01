<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::insert('insert into roles (id, role_name) values (?, ?)', [1, 'ADMIN']);
        DB::insert('insert into roles (id, role_name) values (?, ?)', [2, 'USER']);
        $this->call([
            UserSeeder::class,
        ]);
    }
    
}
