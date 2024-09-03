<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use Modules\Project\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->paginate(5);

        return $this->paginationResponse($projects);
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        Project::create($validated);

        return $this->successResponse('Project created');
    }

    public function show(Project $project)
    {
        return $this->resultResponse(ProjectResource::make($project));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return $this->successResponse('Project updated');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return $this->successResponse('Project deleted');
    }
}
