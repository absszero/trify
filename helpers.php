<?php

if (!function_exists('db')) {
    function db()
    {
        return new Absszero\Trify\Database;
    }
}