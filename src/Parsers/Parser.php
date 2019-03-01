<?php

namespace Absszero\Trify\Parsers;

class Parser
{
    const HOSTS = [
        'store.playstation.com' => SonyPlaystation::class,
        'api-savecoins.nznweb.com.br' => Savecoins::class
    ];

    public function instance($url)
    {
        $host = parse_url($url, PHP_URL_HOST);
        if (isset(self::HOSTS[$host])) {
            $class = self::HOSTS[$host];
            return new $class;
        }

        throw new \Exception('Parser not found: ' . $host);
    }

    public function parse(array $bodies)
    {
        foreach ($bodies as $url => $body) {
            $instance = $this->instance($url);
            $bodies[$url] = $instance->parse($url, $body);
        }

        return $bodies;
    }
}
