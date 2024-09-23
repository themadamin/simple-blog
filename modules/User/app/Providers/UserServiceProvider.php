<?php

namespace Modules\User\Providers;

use Modules\ModuleServiceProvider;

class UserServiceProvider extends ModuleServiceProvider
{
    public function boot(): void
    {
        parent::boot();
    }

    protected function getMigrationsPath(): string
    {
        return __DIR__ . '/../../Database/migrations';
    }

    protected function getDirectoryName(): string
    {
        return __DIR__;
    }
}
