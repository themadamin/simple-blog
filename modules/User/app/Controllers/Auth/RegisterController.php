<?php

namespace Modules\User\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Actions\CreateUserAction;
use Modules\User\Actions\GenerateTokenAction;
use Modules\User\Constants\RolesEnum;
use Modules\User\Requests\Auth\RegistrationRequest;
use Modules\User\Resources\UserResource;

class RegisterController extends Controller
{
    public function __construct(
        protected GenerateTokenAction $generateTokenAction,
        protected CreateUserAction $createUserAction
    )
    {}

    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = $this->createUserAction->execute($validated);

        $token = $this->generateTokenAction->execute($user);

        $user['is_admin'] = $user->hasRole(RolesEnum::ADMIN->value);

        return $this->resultResponse(['user' => UserResource::make($user), 'token' => $token]);
    }
}
