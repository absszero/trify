<?php

namespace Absszero\PSStore;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class Crawler
{
    const BYTES = 6000;

    public $client;

    public $options = [];

    const USER_AGENT = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1";

    public function __construct($options = [])
    {
        $this->client = new Client();
        $this->options = [
            'headers' => ['User-Agent' => self::USER_AGENT],
            'verify' => false,
            'stream' => true,
        ];
        $this->options = array_merge($this->options, $options);
    }

    public function request($urls)
    {
        $promises = [];
        foreach ((array)$urls as $url) {
            $promises[$url] = $this->client->requestAsync('GET', $url, $this->options);
        }

        $results = Promise\settle($promises)->wait();

        $bodies = [];
        foreach ($results as $url => $result) {
            if ('fulfilled' !== $result['state']) {
                continue;
            }
            $bodies[$url] = $result['value']->getBody()->read(self::BYTES);
        }

        return $bodies;
    }
}
