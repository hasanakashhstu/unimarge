<?php

use Illuminate\Database\Seeder;
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
        // create roles
        $superAdminRole = Role::create(['name' => 'super admin']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $staffRole = Role::create(['name' => 'staff']);
        $parentRole = Role::create(['name' => 'parent']);
        $studentRole = Role::create(['name' => 'student']);

        // permission
        $permissions = [
            // role and permission
            'role and permission' => [
                'manage role and permission',
            ],

            // admin
            'admin' => [
                'view admin',
                'create admin',
                'edit admin',
                'delete admin',
            ],

            // teacher
            'teacher' => [
                'view teacher',
                'create teacher',
                'edit teacher',
                'delete teacher',
            ],

            // staff
            'staff' => [
                'view staff',
                'create staff',
                'edit staff',
                'delete staff',
            ],

            // parent
            'parent' => [
                'view parent',
                'create parent',
                'edit parent',
                'delete parent',
            ],

            // student
            'student' => [
                'view student',
                'create student',
                'edit student',
                'delete student',
            ],

            // apprisal
            'apprisal' => [
                'view apprisal',
                'create apprisal',
                'edit apprisal',
                'delete apprisal',
            ],

            // department
            'department' => [
                'view department',
                'create department',
                'edit department',
                'delete department',
            ],

            // class routine
            'class routine' => [
                'view class routine',
                'create class routine',
                'edit class routine',
                'delete class routine',
            ],

            // subject
            'subject' => [
                'view subject',
                'create subject',
                'edit subject',
                'delete subject',
            ],

            // attendence
            'attendence' => [
                'view attendence',
                'create attendence',
                'edit attendence',
                'delete attendence',
            ],

            // exam
            'exam' => [
                'view exam',
                'create exam',
                'edit exam',
                'delete exam',
            ],

            // payroll
            'payroll' => [
                'view payroll',
                'create payroll',
                'edit payroll',
                'delete payroll',
            ],

            // accounting
            'accounting' => [
                'view accounting',
                'create accounting',
                'edit accounting',
                'delete accounting',
            ],

            // library
            'library' => [
                'view library',
                'create library',
                'edit library',
                'delete library',
            ],

            // transport
            'transport' => [
                'view transport',
                'create transport',
                'edit transport',
                'delete transport',
            ],

            // dormitory
            'dormitory' => [
                'view dormitory',
                'create dormitory',
                'edit dormitory',
                'delete dormitory',
            ],

            // canteen
            'canteen' => [
                'view canteen',
                'create canteen',
                'edit canteen',
                'delete canteen',
            ],

            // message
            'message' => [
                'view message',
                'create message',
                'edit message',
                'delete message',
            ],

            // setting
            'setting' => [
                'view setting',
                'create setting',
                'edit setting',
                'delete setting',
            ],

            // live class
            'live class' => [
                'view live class',
                'create live class',
                'edit live class',
                'delete live class',
            ],

            // report
            'report' => [
                'view report',
                'create report',
                'edit report',
                'delete report',
            ],

            // website setup
            'website setup' => [
                'view website setup',
                'create website setup',
                'edit website setup',
                'delete website setup',
            ],

            // publication
            'publication' => [
                'view publication',
                'create publication',
                'edit publication',
                'delete publication',
            ],

            // awards and honours
            'awards and honours' => [
                'view awards and honours',
                'create awards and honours',
                'edit awards and honours',
                'delete awards and honours',
            ],
        ];

        // create permissions
        foreach ($permissions as $permissionGroup => $permissionArray) {
            foreach ($permissionArray as $permission) {
                Permission::create([
                    'name' => $permission,
                    'group_name' => $permissionGroup,
                ]);
            }
        }
    }
}
