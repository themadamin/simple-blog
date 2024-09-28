<?php

use Modules\Project\Providers\ProjectServiceProvider;
use Modules\Category\Providers\CategoryServiceProvider;
use Modules\User\Providers\UserServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    ProjectServiceProvider::class,
    CategoryServiceProvider::class,
    UserServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
];
