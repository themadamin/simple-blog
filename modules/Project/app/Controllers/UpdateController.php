<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\JsonResponse;
use Modules\Project\Actions\UpdateProjectAction;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class UpdateController extends Controller
{
    public function __construct(
        protected UpdateProjectAction $updateProjectAction
    )
    {}

    public function __invoke(ProjectRequest $request, Project $project): JsonResponse
    {
        Gate::authorize('update', $project);

        $validated = $request->validated();

        $this->updateProjectAction->execute($project, $validated, $request->file('thumbnail'));

        return $this->resultResponse(ProjectResource::make($project));
    }
}
