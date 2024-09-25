<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Constants\StatusConstants;
use Modules\User\Models\User;
use Modules\User\Requests\Auth\RegistrationRequest;
use Modules\User\Resources\UserResource;

class StoreController extends Controller
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => StatusConstants::LEFT,
            'password' => bcrypt($validated['password']),
        ]);

        return $this->resultResponse(UserResource::make($user));
    }
}
