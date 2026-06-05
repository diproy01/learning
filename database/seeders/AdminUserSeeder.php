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
            ['is_system_admin' => true],
            [
                'email' => 'sysadmin@example.com',
                'name' => 'System Admin',
                'password' => Hash::make('System@123'),
            ]
        );

        $user->syncRoles(['admin']);
    }
}
