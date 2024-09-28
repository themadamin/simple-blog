<?php

namespace Modules\Project\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Project\Constants\ProjectPermissionsEnum;
use Spatie\Permission\Models\Permission;

class ProjectPermissionsSeeder extends Seeder{
    public function run(): void
    {

        $permissions = [
            [
                'name' => ProjectPermissionsEnum::EDIT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ProjectPermissionsEnum::REMOVE->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
