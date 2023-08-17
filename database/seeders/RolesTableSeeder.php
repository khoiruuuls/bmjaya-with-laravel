<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sales', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('users')->insert([
            ['name' => 'Khoirul', 'email' => 'khoirul@gmail.com', 'password' => bcrypt('unsika123'), 'role_id' => 1, 'employee_id' => 20202020],
            ['name' => 'Mifat', 'email' => 'mifat@gmail.com', 'password' => bcrypt('unsika123'), 'role_id' => 2, 'employee_id' => 10202020],
            ['name' => 'Ruls', 'email' => 'ruls@gmail.com', 'password' => bcrypt('unsika123'), 'role_id' => 2, 'employee_id' => 10202021],
        ]);
    }
}