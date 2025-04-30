<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'aroljabea71@gmail.com',
            'password' => Hash::make('password'),
            'magic_number' => 1000001,
            'role' => 'ADMIN',
        ]);
    }
}
