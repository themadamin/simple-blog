<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Actions\FileUploadAction;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class UpdateController extends Controller
{
    public function __construct(protected FileUploadAction $fileUploadAction)
    {}
    public function __invoke(ProjectRequest $request, Project $project): JsonResponse
    {
        $validated = $request->validated();

        $project->update($validated);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadAction->execute($validated['thumbnail']);
        }

        $project->update($validated);

        return $this->resultResponse(ProjectResource::make($project));
    }
}
