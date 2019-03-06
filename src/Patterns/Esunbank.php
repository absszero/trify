<?php

namespace Absszero\Trify\Patterns;

use Absszero\Trify\Interfaces\Crawlable;
use Absszero\Trify\Interfaces\Parsable;
use Absszero\Trify\Meta;

class Esunbank implements Parsable, Crawlable
{
    const CURRENCY = 'USD';

    public function parse($url, $body)
    {
        $json = json_decode($body)->d;
        $json = json_decode($json);
        foreach ($json->Rates as $rate) {
            if (self::CURRENCY == $rate->Key) {
                $meta = new Meta($url);
                $meta->setTitle($rate->Title);
                $meta->setPrice($rate->SellDecreaseRate);

                return $meta;
            }
        }
    }

    public function method()
    {
        return 'POST';
    }

    public function options(array $default)
    {
        $default['headers']['Content-Type'] = 'application/json';
        $default['headers']['Referer'] = 'https://www.esunbank.com.tw/bank/personal/deposit/rate/forex/foreign-exchange-rates';
        $default['body'] = sprintf("{day:'%s',time:'%s'}", date('Y-m-d'), date('H:i:s'));

        return $default;
    }

    public function bytes()
    {
        return 0;
    }
}

