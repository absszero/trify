<?php

return [
    'host' => getenv('MAIL_HOST'),
    'port' => getenv('MAIL_PORT'),
    'user' => getenv('MAIL_USER'),
    'pass' => getenv('MAIL_PASS'),
    'encryption' => getenv('MAIL_ENCRYPTION'),
    'from' => getenv('MAIL_FROM'),
    'to' => getenv('MAIL_TO'),
];
