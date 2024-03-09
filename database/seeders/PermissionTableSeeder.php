<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'student-list',
           'student-create',
           'student-edit',
           'student-delete',

           'gear-list',
           'gear-create',
           'gear-edit',
           'gear-delete',

           'report-list',
           'report-create',
           'report-edit',
           'report-delete',

           'request-list',
           'request-create',
           'request-edit',
           'request-delete',

           'admin-delete',

           
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
