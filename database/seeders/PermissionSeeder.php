<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            // Show SETTINGS

            'show_settings', //branches years designations
            'edit_settings',

            //  Role manage 

            'edit_role',
            'show_role',

            //Notice manage

            'edit_notice',
            'show_notice',

            //chat 

            'show_chat',



            //Storage Permisisons

            'view_placement',
            'notes_branch',
            'notes_placement',



            'show_profiles',

            'create_role',
            'view_role',
            'delete_role',

            'user_management_access',
            'show_Student',
            'edit_Student',
            'delete_Student',

            'show_Teacher',
            'edit_Teacher',
            'delete_Teacher',

            'show_Admin',
            'edit_Admin',
            'delete_Admin',

            'show_superAdmin',
            'edit_superAdmin',
            'delete_superAdmin',



            'show_permission',

            'permission_create',
        ];

        $Adminpermissions  = [

            'show_settings',

            'show_chat',

            'user_management_access',
            'show_Student',
            'edit_Student',
            'delete_Student',

            'show_profiles',

            'show_Teacher',
            'edit_Teacher',
            'delete_Teacher',

            'show_Admin',


            'create_role',

            'permission_create'
        ];


        $teacherpermissions = [

            'user_management_access',

            'show_Student',
            'edit_Student',
            'delete_Student',

            'show_Teacher',

            'show_chat',
        ];

        $designations = [
            'Principal',
            'Professor',
            'Ass Professor',
            'Co-ordination',
            'Student',
        ];

        $roles = [
            'SuperAdmin',
            'Admin',
            'Teacher',
            'Student',
        ];

        foreach ($designations as $designation) {

            Designation::create([
                'name' => $designation
            ]);
        }

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }

        $role = Role::findByName('Admin');

        foreach ($Adminpermissions as $permission) {

            $role->givePermissionTo($permission);
        }

        $role = Role::findByName('Teacher');

        foreach ($teacherpermissions as $permission) {

            $role->givePermissionTo($permission);
        }
    }
}
