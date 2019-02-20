<?php

namespace Absszero\Trify;

class Parser
{
    const START_TAG = '<script type="application/ld+json"';
    const JSON_TAG = '{';
    const END_TAG = '</script>';

    public static function parse(array $bodies)
    {
        foreach ($bodies as $url => $body) {
            $start = strpos($body, self::START_TAG);
            if ($start === false) {
                $bodies[$url] = false;
                continue;
            }
            $body = substr($body, $start);
            $json = strstr($body, self::JSON_TAG);
            $json = strstr($json, self::END_TAG, true);
            $data = json_decode($json);
            $bodies[$url] = $data;
        }

        return $bodies;
    }
}
