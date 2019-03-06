<?php

namespace Absszero\Trify;

use Absszero\Trify\Patterns\Pattern;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class Crawler
{
    const MAX_BYTES = 9999999;

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
        $patterns = [];
        $promises = [];
        foreach ((array)$urls as $url) {
            $patterns[$url] = $pattern = (new Pattern)->instance($url);
            $promises[$url] = $this->client->requestAsync($pattern->method(), $url, $pattern->options($this->options));
        }

        $results = Promise\settle($promises)->wait();

        $bodies = [];
        foreach ($results as $url => $result) {
            if ('fulfilled' !== $result['state']) {
                continue;
            }
            $size = $patterns[$url]->bytes() ?: self::MAX_BYTES;
            $bodies[$url] = $result['value']->getBody()->read($size);
        }

        return $bodies;
    }
}
