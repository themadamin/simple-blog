<?php

namespace Modules\User\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Hash;
use Modules\User\Models\User;

class LoginController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(LoginRequest $request)
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
