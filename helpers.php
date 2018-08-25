<?php

if (!function_exists('db')) {
    function db()
    {
        return new Absszero\PSStore\Database;
    }
}