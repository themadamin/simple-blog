<?php

namespace Modules\Project\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Models\Project;

class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1,10),
            'title' => $this->faker->text(),
            'body' => $this->faker->paragraph(),
            'published_at' => $this->faker->dateTimeBetween(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()),
        ];
    }
}
