<?php
namespace Tests\Track;

use Absszero\Trify\Crawler;

class GoCommandTest extends \Tests\TestCase
{
    public function testGo()
    {
        $url = 'http://example.com/list.html';
        $price = 1234;
        db()->save([
            'url' => $url
        ]);

        $crawler = $this->mockCrawler($url, $price);
        $command = $this->addCommand(new \Absszero\Trify\Track\GoCommand($crawler));
        $tester = $this->executeCommand($command);

        $track = db()->select()[0];
        $this->assertEquals($track['price'], $price);
    }

    protected function mockCrawler($url, $price)
    {
        $crawler = $this->createMock(Crawler::class);
        $crawler->expects($this->once())
            ->method('request')
            ->withAnyParameters()
            ->willReturn([
                $url => '
  <script type="application/ld+json" id="ember11503638" class="ember-view">{"@context":"http://schema.org","@type":"Product","name":"FIFA","category":"同捆包","image":"","offers":[{"@type":"Offer","priceCurrency":"TWD","price":' . $price . '},{"@type":"Offer","priceCurrency":"TWD","price":' . $price . '}]}
</script>'
            ]);

        return $crawler;
    }
}
