<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Database\seeders\CategorySeeder;
use Modules\Project\Database\Seeders\ProjectSeeder;
use Modules\User\Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class
        ]);
    }
}
