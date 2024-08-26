<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Exception;
use Hash;

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

        if ($user->password !== Hash::make($validated['password'])){
            throw new Exception('Wrong password');
        }

//        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']]);

//        return $this->resultResponse(['token' => $token]);
    }
}
