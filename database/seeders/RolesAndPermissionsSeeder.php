<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //find role
        

        // create permissions
        Permission::create(['name' => 'dashboard permission']);
        Permission::create(['name' => 'user management permission']);
        Permission::create(['name' => 'patient management permission for doctor']);
        Permission::create(['name' => 'patient management permission for nurse']);
        Permission::create(['name' => 'inventory permission']);
        Permission::create(['name' => 'reports permission']);

        //create role
        $role = Role::create(['name' => 'Admin']);

        //add all permission to role
        $role->givePermissionTo(Permission::all());

    }
}
