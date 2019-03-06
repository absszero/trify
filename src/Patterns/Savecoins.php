<?php

namespace Absszero\Trify\Patterns;

use Absszero\Trify\Meta;

class Savecoins
{
    public function parse($url, $body)
    {
        $json = json_decode($body);

        $meta = new Meta($url);
        $meta->setTitle($json->data->title);
        $meta->setPrice($json->data->price_digital->rawCurrentPrice);

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
        return 0;
    }
}
