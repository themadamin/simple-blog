<?php

namespace Modules\Category\Constants;

enum CategoryPermissionEnum: string
{
    case CREATE = 'create-category';

    case EDIT = 'update-category';

    case REMOVE = 'delete-category';


    public function label(): string
    {
        return match ($this) {
            self::CREATE => 'Create Category',
            self::EDIT => 'Edit Project',
            self::REMOVE => 'Remove Project',
        };
    }

    public static function getAllPermissions(): array
    {
        return [self::CREATE, self::EDIT, self::REMOVE];
    }
}
