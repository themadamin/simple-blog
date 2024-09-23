<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class UpdateController extends Controller
{
    public function __invoke(ProjectRequest $request, Project $project): JsonResponse
    {
        $validated = $request->validated();

        $project->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        if ($request->hasFile('thumbnail')) {
            $project->clearMediaCollection();
            $project->uploadFile($request->file('thumbnail'))->toMediaCollection('project');
        }

        return $this->resultResponse(ProjectResource::make($project));
    }
}
