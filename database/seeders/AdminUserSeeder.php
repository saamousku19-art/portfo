<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'saamousku19@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('BatBat19'),
            ]
        );
    }
}