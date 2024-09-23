<?php

namespace Modules;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

abstract class ModuleServiceProvider extends ServiceProvider
{
    protected function boot(): void
    {
        $this->loadMigrationsFrom($this->getMigrationsPath());
        $this->loadRoutesFrom($this->getDirectoryName().'/../../routes/api.php');
    }


    abstract protected function getMigrationsPath(): string;
    abstract protected function getDirectoryName(): string;
}
