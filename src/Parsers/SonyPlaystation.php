<?php

namespace Absszero\Trify\Parsers;

class SonyPlaystation
{
    const START_TAG = '<script type="application/ld+json"';
    const JSON_TAG = '{';
    const END_TAG = '</script>';

    public function parse($body)
    {
        $start = strpos($body, self::START_TAG);
        if ($start === false) {
            return;
        }
        $body = substr($body, $start);
        $json = strstr($body, self::JSON_TAG);
        $json = strstr($json, self::END_TAG, true);
        $data = json_decode($json);

        return $data;
    }
}
