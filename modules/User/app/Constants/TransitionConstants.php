<?php

namespace Modules\User\Constants;

class TransitionConstants
{
    const CAME_TO_OFFICE = 1;

    const WORKING = 2;

    const TAKING_BREAK = 3;

    const LEFT_OFFICE = 4;


    const TYPES = [
        self::CAME_TO_OFFICE,
        self::WORKING,
        self::TAKING_BREAK,
        self::LEFT_OFFICE,
    ];
}
