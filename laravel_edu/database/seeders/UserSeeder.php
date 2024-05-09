<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => '홍', 'email' => 'admin@admin.com', 'password' => Hash::make('qwer1234!')]
            ,['name' => '갑', 'email' => 'admin2@admin.com', 'password' => Hash::make('qwer1234!')]
            ,['name' => '순', 'email' => 'admin3@admin.com', 'password' => Hash::make('qwer1234!')]
        ]);
    }
}
