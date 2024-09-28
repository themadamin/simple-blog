<?php

namespace Modules\User\Actions;

use Modules\User\Models\User;

class GenerateTokenAction
{
    public function execute(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}
