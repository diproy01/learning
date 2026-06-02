<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin@123'),
            ]
        );

        $user->syncRoles(['admin']);
    }
}
