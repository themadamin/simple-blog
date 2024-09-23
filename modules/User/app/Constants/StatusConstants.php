<?php

namespace Modules\User\Constants;

class StatusConstants {
    const WORKING = 1;

    const BREAK = 2;

    const LEFT = 3;

    const ONLINE = 4;

    const ABSENT = 5;

    const TYPES = [
        self::WORKING,
        self::BREAK,
        self::LEFT,
        self::ONLINE,
        self::ABSENT,
    ];
}
