<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Models\Project;

class DeleteController extends Controller
{
    public function __invoke(Project $project): JsonResponse
    {
        $project->clearMediaCollection();

        $project->delete();

        return $this->successResponse('Project deleted');
    }
}
