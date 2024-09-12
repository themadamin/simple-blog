<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Models\Project;
use Modules\Project\Resources\ProjectResource;

class ShowController extends Controller
{
    public function __invoke(Project $project): JsonResponse
    {
        return $this->resultResponse(ProjectResource::make($project));
    }
}
