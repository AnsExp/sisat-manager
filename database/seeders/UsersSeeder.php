<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'rooseveltabrigo@gmail.com'
        ], [
            'name' => 'Roosevelt Stalin Remache Abrigo',
            'email' => 'rooseveltabrigo@gmail.com',
            'password' => Hash::make('roosevelt99'),
        ]);
    }
}
