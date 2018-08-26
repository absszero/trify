<?php
namespace Tests\Track;

class ObserverTest extends \Tests\TestCase
{
    public function testWatch()
    {
        $track = [
            'id' => "1",
            'price' => 1234,
            'title' => "FIFA",
            'old_price' => null,
        ];

        $observer = new \Absszero\PSStore\Observer;

        $observer->watch($track);
        $this->assertEmpty($observer->tracks());

        $track['old_price'] = 4321;
        $observer->watch($track);
        $this->assertNotEmpty($observer->tracks());
    }
}
