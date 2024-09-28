<?php

namespace Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Project\Actions\CreateProjectAction;
use Modules\Project\Requests\ProjectRequest;
use Modules\User\Actions\ChangeUserRoleAction;

class StoreController extends Controller
{
    public function __construct(
        protected CreateProjectAction $createProjectAction,
        protected ChangeUserRoleAction $changeUserRoleAction
    )
    {}
    public function __invoke(ProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $this->createProjectAction->execute($validated, $request->file('thumbnail'));

        $this->changeUserRoleAction->execute();

        return $this->successResponse("Project successfully created");
    }
}
