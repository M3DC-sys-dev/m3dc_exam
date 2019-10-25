<?php

return [
    'channels' => [
        'seminar' => [
            'driver' => 'custom',
            'via' => App\Logging\SeminarInputLogger::class
        ]
    ]
];