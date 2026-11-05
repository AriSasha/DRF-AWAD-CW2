<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // clear the package's saved list of permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create the permissions
        $permissions = [
            'manage courses',
            'view courses',
            'manage students',
            'manage registrations',
            'view registrations',
            'register for courses',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Create the roles and give each one its permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(['manage courses', 'manage students', 'manage registrations']);

        $lecturer = Role::firstOrCreate(['name' => 'lecturer']);
        $lecturer->syncPermissions(['view courses', 'view registrations']);

        $student = Role::firstOrCreate(['name' => 'student']);
        $student->syncPermissions(['view courses', 'view registrations', 'register for courses']);
    }
}
