<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Modules\User\Actions\ChangeStatusAction;
use Modules\User\Constants\StatusConstants;
use Modules\User\Constants\TransitionConstants;
use Modules\User\Models\User;
use Modules\User\Requests\ChangeStatusRequest;

class ChangeStatusController extends Controller
{
    public function __construct(
        protected ChangeStatusAction $changeStatusAction
    ) {
    }

    /**
     * @throws Exception
     */
    public function index(): JsonResponse
    {
        $statuses = [
            TransitionConstants::CAME_TO_OFFICE => StatusConstants::getStatusName(StatusConstants::AT_OFFICE),
            TransitionConstants::WORKING => StatusConstants::getStatusName(StatusConstants::WORKING),
            TransitionConstants::TAKING_BREAK => StatusConstants::getStatusName(StatusConstants::BREAK),
            TransitionConstants::LEFT_OFFICE => StatusConstants::getStatusName(StatusConstants::LEFT)
        ];

        return response()->json($statuses);
    }

    /**
     * @throws Exception
     */
    public function change(ChangeStatusRequest $request, User $user): JsonResponse
    {
        $transition = $request->validated('transition');

        $this->changeStatusAction->execute($user, $transition);

        return $this->successResponse("Status changed");
    }
}
