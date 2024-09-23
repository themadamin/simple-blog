<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Models\User;
use Modules\User\Requests\UpdateUserRequest;
use Modules\User\Resources\UserResource;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateUserRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user->update($validated);

        return $this->resultResponse(UserResource::make($user));
    }
}
