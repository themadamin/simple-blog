<?php

namespace Modules\User\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Modules\User\Models\User;
use Modules\User\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
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

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->resultResponse(['user' => $user, 'token' => $token]);
    }
}
