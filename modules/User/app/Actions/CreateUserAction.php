<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\User\Constants\RolesEnum;
use Modules\User\Constants\StatusConstants;
use Modules\User\Models\User;

class CreateUserAction
{
    public function execute(array $validated): User
    {
        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->status = StatusConstants::LEFT;
        $user->password = Hash::make($validated['password']);
        $user->save();

        $user->assignRole(RolesEnum::READER->value);

        return $user;
    }
}
