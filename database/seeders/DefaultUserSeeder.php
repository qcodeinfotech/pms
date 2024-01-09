<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users[] = [
            'name' => 'Admin User',
            'email' => 'admin@pms.com',
            'password' => Hash::make(123456),
            'role' => 'admin',
        ];

        foreach ($users as $user) {
            $exist = User::whereEmail($user['email'])->exists();
            if (!$exist) {
                $role = $user['role'];
                unset($user['role']);
                $user = User::create($user);

                $user->assignRole($role);
            }
        }
    }
}
