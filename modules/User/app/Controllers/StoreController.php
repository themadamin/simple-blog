<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Actions\CreateUserAction;
use Modules\User\Requests\Auth\RegistrationRequest;
use Modules\User\Resources\UserResource;

class StoreController extends Controller
{
    public function __construct(
        protected CreateUserAction $createUserAction,
    )
    {}
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = $this->createUserAction->execute($validated);

        return $this->resultResponse(UserResource::make($user));
    }
}
