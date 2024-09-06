<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Modules\Project\Models\Project;
use Modules\Project\Requests\ProjectRequest;
use Modules\Project\Resources\ProjectResource;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->get();

        return $this->resultResponse(ProjectResource::collection($projects));
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        $project = Project::create($validated);

        return $this->resultResponse(ProjectResource::make($project));
    }

    public function show(Project $project)
    {
        return $this->resultResponse(ProjectResource::make($project));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return $this->resultResponse(ProjectResource::make($project));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return $this->successResponse('Project deleted');
    }
}
