<?php

namespace Modules\User\Constants;

enum RolesEnum: string {
    case ADMIN = 'admin';

    case WRITER = 'writer';

    case READER = 'reader';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admins',
            self::WRITER => 'Writers',
            self::READER => 'Readers',
        };
    }

    public static function getAllRoles(): array
    {
        return [self::ADMIN->value, self::WRITER->value, self::READER->value];
    }
}
