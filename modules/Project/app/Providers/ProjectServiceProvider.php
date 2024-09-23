<?php

namespace Modules\Project\Providers;


use Modules\ModuleServiceProvider;

class ProjectServiceProvider extends ModuleServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }

    protected function getMigrationsPath(): string
    {
        return (__DIR__. "/../../database/migrations");
    }

    protected function getDirectoryName(): string
    {
        return __DIR__;
    }
}
