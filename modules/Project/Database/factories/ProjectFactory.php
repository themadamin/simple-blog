<?php

namespace Modules\Project\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Models\Category;
use Modules\Project\Models\Project;
use Modules\User\Models\User;

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
        $user = User::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $this->faker->text(20),
            'body' => $this->faker->paragraph(),
            'published_at' => $this->faker->dateTimeBetween(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()),
        ];
    }
}
