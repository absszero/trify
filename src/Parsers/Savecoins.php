<?php

namespace Absszero\Trify\Parsers;

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
}
