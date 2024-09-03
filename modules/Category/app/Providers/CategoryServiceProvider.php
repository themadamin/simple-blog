<?php

namespace Modules\Category\Providers;

use Modules\ModuleServiceProvider;

class CategoryServiceProvider extends ModuleServiceProvider
{

    public function boot(): void
    {
        parent::boot();
    }

    protected function getMigrationsPath(): string
    {
        return (__DIR__ . '/../../Database/migrations');
    }
}
