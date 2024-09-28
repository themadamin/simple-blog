<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Constants\CategoryPermissionEnum;
use Spatie\Permission\Models\Permission;

class CategoryPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'name' => CategoryPermissionEnum::CREATE->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => CategoryPermissionEnum::EDIT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => CategoryPermissionEnum::REMOVE->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
