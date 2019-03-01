<?php
namespace Tests\Parsers;

use Absszero\Trify\Parsers\Parser;

class ParserTest extends \Tests\TestCase
{
    public function testInstance()
    {
        $url = 'https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA09893_00-ASIAPLACEHOLDER1';

        $parser = new Parser;
        $instance = $parser->instance($url);
        $this->assertInstanceOf(\Absszero\Trify\Parsers\SonyPlayStation::class, $instance);

        // Parser not found
        $this->expectExceptionMessage('Parser not found: unknow');
        $instance = $parser->instance('http://unknow');
    }
}
