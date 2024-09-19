<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $user): JsonResponse
    {
        $user->delete();

        return $this->successResponse('User has been deleted');
    }
}
