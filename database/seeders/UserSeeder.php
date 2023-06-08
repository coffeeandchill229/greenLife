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
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'address' => 'Đồng Tháp',
                'phone' => '0354632349',
                'is_customer' => 1,
                'password' => Hash::make('admin'),
                'created_at' => '2023-05-17 21:30:00'
            ],
            [
                'name' => 'Nam Lê',
                'email' => 'lnam6507@gmail.com',
                'address' => 'Đồng Tháp',
                'phone' => '0354632349',
                'is_customer' => 0,
                'password' => Hash::make('sonnam'),
                'created_at' => '2023-05-17 21:30:00'
            ]
        ];
        DB::table('users')->insert($data);
    }
}
