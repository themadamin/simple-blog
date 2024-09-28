<?php

namespace Modules\Project\Constants;

enum ProjectPermissionsEnum: string
{
    case EDIT = 'edit-project';

    case REMOVE = 'remove-project';


    public function label(): string
    {
        return match ($this) {
            self::EDIT => 'Edit Project',
            self::REMOVE => 'Remove Project',
        };
    }

    public static function getAllPermissions(): array
    {
        return [self::EDIT, self::REMOVE];
    }
}
