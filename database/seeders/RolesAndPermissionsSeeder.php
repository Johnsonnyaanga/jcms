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

        // create permissions
        $Permission1 = Permission::create(['name' => 'edit agents']);
        $Permission2= Permission::create(['name' => 'delete agents']);
        $Permission3= Permission::create(['name' => 'create agents']);
        $Permission4= Permission::create(['name' => 'view agents']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('create agents');

        // or may be done by chaining
        $agentRole = Role::create(['name' => 'agent'])
            ->givePermissionTo(['view agents', 'create agents']);

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole -> syncPermissions([
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4
        ]);
    }
}
