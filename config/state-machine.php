<?php

return [
    'user' => [
        // class of your domain object
        'class' => \Modules\User\Models\User::class,

        // name of the graph (default is "default")
        'graph' => 'user',

        // property of your object holding the actual state (default is "state")
        'property_path' => 'status',

        // list of all possible states
        'states' => [
            \Modules\User\Constants\StatusConstants::AT_OFFICE,
            \Modules\User\Constants\StatusConstants::WORKING,
            \Modules\User\Constants\StatusConstants::BREAK,
            \Modules\User\Constants\StatusConstants::LEFT,
        ],

        // list of all possible transitions
        'transitions' => [
            \Modules\User\Constants\TransitionConstants::CAME_TO_OFFICE => [
                'from' => [
                    \Modules\User\Constants\StatusConstants::LEFT,
                ],
                'to' => \Modules\User\Constants\StatusConstants::AT_OFFICE
            ],
            \Modules\User\Constants\TransitionConstants::WORKING => [
                'from' => [
                    \Modules\User\Constants\StatusConstants::AT_OFFICE,
                    \Modules\User\Constants\StatusConstants::BREAK
                ],
                'to' => \Modules\User\Constants\StatusConstants::WORKING
            ],
            \Modules\User\Constants\TransitionConstants::TAKING_BREAK => [
                'from' => [\Modules\User\Constants\StatusConstants::WORKING],
                'to' => \Modules\User\Constants\StatusConstants::BREAK
            ],
            \Modules\User\Constants\TransitionConstants::LEFT_OFFICE => [
                'from' => [
                    \Modules\User\Constants\StatusConstants::WORKING,
                    \Modules\User\Constants\StatusConstants::AT_OFFICE,
                    \Modules\User\Constants\StatusConstants::BREAK
                ],
                'to' => \Modules\User\Constants\StatusConstants::LEFT
            ],
        ],

        // list of all callbacks
        'callbacks' => [
            // will be called when testing a transition
            'after' => [
                'history' => [
                    'do' => 'StateHistoryManager@storeHistory'
                ]
            ]
        ],
    ],
];
