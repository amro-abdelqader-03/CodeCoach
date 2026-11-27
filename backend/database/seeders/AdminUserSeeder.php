<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@smartcoach.local');
        $password = env('ADMIN_PASSWORD', 'ChangeMe123!');

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Smart Coach Admin'),
                'password' => Hash::make($password),
                'role' => 'admin',
                'plan' => 'admin',
            ],
        );
    }
}
