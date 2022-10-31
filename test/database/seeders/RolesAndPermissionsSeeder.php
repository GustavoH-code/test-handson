<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

            $addUser = 'add-user';
            $deleteUser = 'delete-user';
            $editUser = 'edit-user';
            $getAllUser = 'view-all-user';
            $getOneUser = 'view-one-user';
            $viewCourse = 'view-course';
            $viewCategories = 'view-categories';
            $viewFiles = 'view-files';

            $user_admin = 'admin';
            $user_comum = 'comum';
    
    
            Permission::create(['name' => $addUser]);
            Permission::create(['name' => $deleteUser]);
            Permission::create(['name' => $editUser]);
            Permission::create(['name' => $getAllUser]);
            Permission::create(['name' => $getOneUser]);
    
            Permission::create(['name' => $viewCourse]);
            Permission::create(['name' => $viewCategories]);
            Permission::create(['name' => $viewFiles]);
    
            Role::create(['name' => $user_admin])->givePermissionTo([
                $addUser,
                $deleteUser,
                $editUser,
                $getAllUser,
                $getOneUser,
            ]);
    
            Role::create(['name' => $user_comum])->givePermissionTo([
                $viewCourse,
                $viewCategories,
                $viewFiles,
            ]);
    }
}
