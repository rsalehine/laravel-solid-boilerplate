<?php

return [
    'db_failed' => [
        'message' => 'Database operation failed',
        'code'    => 500, // Internal Server Error
    ],
    'email_exists' => [
        'message' => 'This email is already registered',
        'code'    => 409, // Conflict
    ],
    'unauth' => [
        'message' => 'unauthrized',
        'code'    => 401, // Conflict
    ]
];
