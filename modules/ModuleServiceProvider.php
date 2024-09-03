<?php

namespace Modules;

use Illuminate\Support\ServiceProvider;

abstract class ModuleServiceProvider extends ServiceProvider
{
    protected function boot(): void
    {
        $this->loadMigrationsFrom($this->getMigrationsPath());
    }

    abstract protected function getMigrationsPath(): string;
}
