<?php

use Modules\Project\Providers\ProjectServiceProvider;
use Modules\Category\Providers\CategoryServiceProvider;
return [
    App\Providers\AppServiceProvider::class,
    ProjectServiceProvider::class,
    CategoryServiceProvider::class,
];
