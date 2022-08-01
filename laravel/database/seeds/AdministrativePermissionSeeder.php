<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdministrativePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permission
        $permissions = [
            // administrative
            'administrative' => [
                'view administrative',
                'create administrative',
                'edit administrative',
                'delete administrative',
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
