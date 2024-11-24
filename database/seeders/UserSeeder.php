<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        if (User::query()->count() === 0) {
            foreach ($users as $user) {
                $newUser = User::query()->create($user);
                $newUser->assignRole(str($user['name'])->lower()->value());
            }
        }
    }
}
