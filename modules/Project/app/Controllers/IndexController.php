<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Models\Project;
use Modules\Project\Resources\ProjectResource;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $projects = Project::query()->get();

        return $this->resultResponse(ProjectResource::collection($projects));
    }
}
