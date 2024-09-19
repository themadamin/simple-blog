<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Models\User;
use Modules\User\Resources\UserResource;

class IndexController extends Controller {
    public function __invoke(): JsonResponse
    {
        $users = User::query()->get();

        return $this->resultResponse(UserResource::collection($users));
    }
}
