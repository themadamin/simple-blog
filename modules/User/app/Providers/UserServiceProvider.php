<?php

namespace Modules\User\Providers;

use Modules\ModuleServiceProvider;

class UserServiceProvider extends ModuleServiceProvider
{
    protected function getMigrationsPath(): string
    {
        return __DIR__ . '/../../Database/migrations';
    }
}
