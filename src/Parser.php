<?php

namespace Absszero\Trify;

use Absszero\Trify\Patterns\Pattern;

class Parser
{
    public function parse(array $bodies)
    {
        foreach ($bodies as $url => $body) {
            $pattern = (new Pattern)->instance($url);
            $bodies[$url] = $pattern->parse($url, $body);
        }

        return $bodies;
    }
}
