<?php

namespace Absszero\Trify\Patterns;

use Absszero\Trify\Interfaces\Crawlable;
use Absszero\Trify\Interfaces\Parsable;
use Absszero\Trify\Meta;

class SonyPlaystation implements Parsable, Crawlable
{
    const BYTES = 6000;

    const START_TAG = '<script type="application/ld+json"';
    const JSON_TAG = '{';
    const END_TAG = '</script>';

    public function parse($url, $body)
    {
        $start = strpos($body, self::START_TAG);
        if ($start === false) {
            return;
        }
        $body = substr($body, $start);
        $json = strstr($body, self::JSON_TAG);
        $json = strstr($json, self::END_TAG, true);
        $data = json_decode($json);

        $meta = new Meta($url);
        $meta->setTitle($data->name);
        $meta->setPrice($data->offers[0]->price);

        return $meta;
    }

    public function method()
    {
        return 'GET';
    }

    public function options(array $default)
    {
        return $default;
    }

    public function bytes()
    {
        return self::BYTES;
    }
}
