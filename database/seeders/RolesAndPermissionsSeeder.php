<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $agentRole = Role::create(['name' => 'agent']);
        $liasonPersonRole = Role::create(['name' => 'liasonperson']);
        $clientRole = Role::create(['name' => 'client']);
        $superAdminRole = Role::create(['name' => 'super-admin']);


        $adminUser =  User::create([
                'firstname' => 'Admin',
                'lastname' => 'User',
                'username' => 'admin',
                'queues_id' => 1,
                'is_active' => 1,
                'email' => 'admin@gmail.com',
                'phonenumber' => 0711111111,
               'password' => Hash::make('11111111'),
            ]);

            $agentUser =  User::create([
                'firstname' => 'Agent',
                'lastname' => 'User',
                'username' => 'agent',
                'queues_id' => 1,
                'is_active' => 1,
                'email' => 'agent@gmail.com',
                'phonenumber' => 0722222222,
               'password' => Hash::make('11111111'),
            ]);

            $clientUser =  User::create([
                'firstname' => 'Client',
                'lastname' => 'User',
                'username' => 'client',
                'queues_id' => 2,
                'is_active' => 1,
                'email' => 'client@gmail.com',
                'phonenumber' => 0755555555,
               'password' => Hash::make('11111111'),
            ]);

            $liasonPersonUser =  User::create([
                'firstname' => 'LiaisonPerson',
                'lastname' => 'User',
                'username' => 'liasonperson',
                'queues_id' => 2,
                'is_active' => 1,
                'email' => 'liason@gmail.com',
                'phonenumber' => 0766666666,
               'password' => Hash::make('11111111'),
            ]);


            $superAdminUser =  User::create([
                'firstname' => 'SuperAdmin',
                'lastname' => 'User',
                'username' => 'superAdmin',
                'queues_id' => 1,
                'is_active' => 1,
                'email' => 'superAdmin@gmail.com',
                'phonenumber' => 0744444444,
               'password' => Hash::make('11111111'),
            ]);



            $superAdminUser -> syncPermissions([
                $Permission1,
                $Permission2,
                $Permission3,
                $Permission4
            ]);

            $adminUser -> syncRoles([
                $adminRole
            ]);

            $agentUser -> syncRoles([
                $agentRole
            ]);

            $liasonPersonUser -> syncRoles([
                $liasonPersonRole
            ]);

            $clientUser -> syncRoles([
                $clientRole
            ]);

            $superAdminUser ->syncRoles([
                $superAdminRole
            ]);



            $adminUser -> syncPermissions(
                $Permission1,
                $Permission2,
                $Permission3
            );


            $agentUser -> syncPermissions([
                $Permission1,
                $Permission2
            ]);







        $superAdminRole -> syncPermissions([
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4
        ]);

        $adminRole -> syncPermissions([
            $Permission1,
            $Permission2,
            $Permission3
        ]);

        $agentRole -> syncPermissions([
            $Permission1,
            $Permission2
        ]);


    }
}
