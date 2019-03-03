<?php

namespace Absszero\Trify;

class Observer
{
    protected $tracks = [];

    public function watch($track)
    {
        $price = $track['target'] ?: $track['price'];
        if ($price < $track['old_price']) {
            $this->tracks[] = $track;
        }
    }

    public function tracks()
    {
        return $this->tracks;
    }
}
