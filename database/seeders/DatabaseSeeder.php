<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        Role::create([
            'name' => 'admin',
            'description' => 'admin role',
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'user role',
        ]);
        Permission::create([
            'name' => 'add_user',
            'description' => 'user can add new user',
        ]);
        Permission::create([
            'name' => 'view_user',
            'description' => 'user can view the user info',
        ]);
    }
}
