<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nama_role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Pimpinan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}