<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboardModule = Module::updateOrCreate(['name'  => 'Admin Dashboard',]);

        Permission::updateOrCreate([
            'module_id' => $dashboardModule->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'app.dashboard'
        ]);

        $roleManagementModule = Module::updateOrCreate(['name'  => 'Role Management',]);
        Permission::updateOrCreate([
            'module_id' => $roleManagementModule->id,
            'name'      => 'Access Role',
            'slug'      => 'app.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleManagementModule->id,
            'name'      => 'Create Role',
            'slug'      => 'app.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleManagementModule->id,
            'name'      => 'Edit Role',
            'slug'      => 'app.roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $roleManagementModule->id,
            'name'      => 'Delete Role',
            'slug'      => 'app.roles.destroy'
        ]);


        $userManagementModule = Module::updateOrCreate(['name'  => 'User Management',]);
        Permission::updateOrCreate([
            'module_id' => $userManagementModule->id,
            'name'      => 'Access User',
            'slug'      => 'app.user.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userManagementModule->id,
            'name'      => 'Create User',
            'slug'      => 'app.user.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userManagementModule->id,
            'name'      => 'Edit User',
            'slug'      => 'app.user.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userManagementModule->id,
            'name'      => 'Delete User',
            'slug'      => 'app.user.destroy'
        ]);
    }
}
