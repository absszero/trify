<?php

if (!function_exists('db')) {
    function db()
    {
        return Absszero\PSStore\Database::instance();
    }
}
