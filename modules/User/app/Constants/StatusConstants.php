<?php

namespace Modules\User\Constants;

class StatusConstants {

    const AT_OFFICE = 1;

    const WORKING = 2;

    const BREAK = 3;

    const LEFT = 4;

    const TYPES = [
        self::AT_OFFICE,
        self::WORKING,
        self::BREAK,
        self::LEFT,
    ];

    /**
     * @throws \Exception
     */
    public static function getStatusName(int $status): string
    {
        return match ($status){
            self::AT_OFFICE => 'Office',
            self::WORKING => 'Working',
            self::BREAK => 'Break',
            self::LEFT => 'Left',
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
