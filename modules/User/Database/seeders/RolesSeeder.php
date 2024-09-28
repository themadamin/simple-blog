<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Constants\RolesEnum;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => RolesEnum::ADMIN->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => RolesEnum::WRITER->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => RolesEnum::READER->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

    }
}
