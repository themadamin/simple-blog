<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class StoreController extends Controller
{
    public function __invoke(ProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $project = Project::create([
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'title' => $validated['title'],
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        if ($request->hasFile('thumbnail')) {
            $project->uploadFile($request->file('thumbnail'))->toMediaCollection('project');
        }

        return $this->resultResponse(ProjectResource::make($project));
    }
}
