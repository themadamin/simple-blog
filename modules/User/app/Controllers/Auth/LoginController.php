<?php

namespace Modules\User\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Modules\User\Actions\GenerateTokenAction;
use Modules\User\Constants\RolesEnum;
use Modules\User\Models\User;
use Modules\User\Requests\Auth\LoginRequest;
use Modules\User\Resources\UserResource;

class LoginController extends Controller
{

    public function __construct(
        protected GenerateTokenAction $generateTokenAction
    )
    {}
    /**
     * @throws Exception
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::whereEmail($validated['email'])->first();

        if (!$user){
            throw new Exception('User not found');
        }
        if (!Hash::check($validated['password'], $user->password)){
            throw new Exception('Wrong password');
        }

        $token = $this->generateTokenAction->execute($user);

        $user['is_admin'] = $user->hasRole(RolesEnum::ADMIN->value);

        return $this->resultResponse(['user' => UserResource::make($user), 'token' => $token]);
    }
}
