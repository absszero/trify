<?php
namespace Tests\Track;

class ObserverTest extends \Tests\TestCase
{
    public function testTargetPrice()
    {
        $track = [
            'id' => "1",
            'target' => 1050,
            'price' => 1100,
            'title' => "FIFA",
            'old_price' => 1100,
        ];

        $observer = new \Absszero\Trify\Observer;

        $observer->watch($track);
        $this->assertNotEmpty($observer->tracks());
    }

    public function testWatch()
    {
        $track = [
            'id' => "1",
            'target' => null,
            'price' => 1234,
            'title' => "FIFA",
            'old_price' => null,
        ];

        $observer = new \Absszero\Trify\Observer;

        $observer->watch($track);
        $this->assertEmpty($observer->tracks());

        $track['old_price'] = 4321;
        $observer->watch($track);
        $this->assertNotEmpty($observer->tracks());
    }
}
