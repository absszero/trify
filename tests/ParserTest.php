<?php
namespace Tests\Track;

use Absszero\Trify\Parser;

class ParserTest extends \Tests\TestCase
{
    public function testParse()
    {
        $parser = new Parser;
        $urls = [
            'https://store.playstation.com' => 'body'
        ];
        $urls = $parser->parse($urls);

        $this->assertArrayHasKey('https://store.playstation.com', $urls);
    }
}
