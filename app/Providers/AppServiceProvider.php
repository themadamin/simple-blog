<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Project\Models\Project;
use Modules\Project\Policies\ProjectPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Project::class, ProjectPolicy::class);
    }
}
