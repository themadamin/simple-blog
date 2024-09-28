<?php

namespace Modules\User\Actions;

use Modules\User\Constants\RolesEnum;

class ChangeUserRoleAction
{
    public function execute(): void
    {
        $user = auth()->user();
        if ($user->hasRole(RolesEnum::READER->value)) {
            $user->removeRole(RolesEnum::READER->value);
            $user->assignRole(RolesEnum::WRITER->value);
        }
    }
}
