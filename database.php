<?php

return [
    // required
    'type' => getenv('DB_TYPE'),
    'dbname' => getenv('DB_NAME'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
];
