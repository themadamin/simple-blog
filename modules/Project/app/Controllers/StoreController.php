<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Actions\FileUploadAction;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class StoreController extends Controller
{
    public function __construct(protected FileUploadAction $fileUploadAction)
    {}
    public function __invoke(ProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileUploadAction->execute($validated['thumbnail']);
        }

        $project = Project::create($validated);

        return $this->resultResponse(ProjectResource::make($project));
    }
}
