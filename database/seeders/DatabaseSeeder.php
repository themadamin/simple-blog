<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Category\Constants\CategoryPermissionEnum;
use Modules\Category\Database\Seeders\CategoryPermissionsSeeder;
use Modules\Category\Database\seeders\CategorySeeder;
use Modules\Project\Constants\ProjectPermissionsEnum;
use Modules\Project\Database\Seeders\ProjectPermissionsSeeder;
use Modules\Project\Database\Seeders\ProjectSeeder;
use Modules\User\Constants\RolesEnum;
use Modules\User\Constants\StatusConstants;
use Modules\User\Database\Seeders\RolesSeeder;
use Modules\User\Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            CategorySeeder::class,
            CategoryPermissionsSeeder::class,
            ProjectSeeder::class,
            ProjectPermissionsSeeder::class,
        ]);


        Role::findByName(RolesEnum::ADMIN->value)->syncPermissions([ProjectPermissionsEnum::getAllPermissions(), CategoryPermissionEnum::getAllPermissions()]);
        Role::findByName(RolesEnum::WRITER->value)->syncPermissions([ProjectPermissionsEnum::getAllPermissions(), CategoryPermissionEnum::getAllPermissions()]);

        \Modules\User\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => StatusConstants::LEFT,
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(RolesEnum::ADMIN->value);

    }
}
