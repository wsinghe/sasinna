<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'view users']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$bUvmVYQMTp59mdwFydv1BeqgboAQ8K0UC51YXn0JdwXpObHwS0VAW',
        ]);
        $user->assignRole('admin');

    }
}
