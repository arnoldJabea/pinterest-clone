<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'aroljabea71@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'magic_number' => 1000001,
                'role' => 'ADMIN',
            ]
        );
    }
}
