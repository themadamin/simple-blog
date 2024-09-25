<?php

namespace Modules\User\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Modules\User\Constants\StatusConstants;
use Modules\User\Models\User;
use Modules\User\Requests\Auth\RegistrationRequest;

class RegisterController extends Controller
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->status = StatusConstants::LEFT;
        $user->password = Hash::make($validated['password']);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->resultResponse(['user' => $user, 'token' => $token]);
    }
}
