<?php

namespace Modules\Project\Policies;

use Modules\Project\Constants\ProjectPermissionsEnum;
use Modules\Project\Models\Project;
use Modules\User\Constants\RolesEnum;
use Modules\User\Models\User;

class ProjectPolicy
{
    public function update(User $user, Project $project): bool
    {
        if (!$user->hasPermissionTo(ProjectPermissionsEnum::EDIT->value)) {
            return false;
        }

        if (!($user->hasRole(RolesEnum::ADMIN->value) || $project->user_id === $user->id)) {
            return false;
        }

        return true;
    }

    public function delete(User $user, Project $project): bool
    {
        if (!$user->hasPermissionTo(ProjectPermissionsEnum::REMOVE->value)) {
            return false;
        }

        if (!($user->hasRole(RolesEnum::ADMIN->value) || $project->user_id === $user->id)) {
            return false;
        }

        return true;
    }
}
