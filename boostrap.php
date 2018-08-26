<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__, getenv('ENV_FILE'));
$dotenv->load();
