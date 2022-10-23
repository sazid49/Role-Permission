<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        //permission list array
        $permissions=[
             // dashboard

             'dashboard.view',

            //blog permission
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',
             //admin permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve', 
            //profile permission
            
            'profile.view',
            'profile.edit',
           
        ];


        //Assign permission
        // $permission = Permission::create(['name' => 'dashboard.view']);

        for ($i=0; $i < count($permissions); $i++) { 
            $permission = Permission::create(['name' =>$permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
