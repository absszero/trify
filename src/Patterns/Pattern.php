<?php

namespace Absszero\Trify\Patterns;

class Pattern
{
    const HOSTS = [
        'store.playstation.com' => SonyPlaystation::class,
        'api-savecoins.nznweb.com.br' => Savecoins::class,
        'www.esunbank.com.tw' => Esunbank::class,
    ];

    public function instance($url)
    {
        $host = parse_url($url, PHP_URL_HOST);
        if (isset(self::HOSTS[$host])) {
            $class = self::HOSTS[$host];
            return new $class;
        }

        throw new \Exception('Pattern not found: ' . $host);
    }
}
