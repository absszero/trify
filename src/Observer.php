<?php

namespace Absszero\Trify;

class Observer
{
    protected $tracks = [];

    public function watch($track)
    {
        if ($track['price'] < $track['old_price']) {
            $this->tracks[] = $track;
        }
    }

    public function tracks()
    {
        return $this->tracks;
    }
}
