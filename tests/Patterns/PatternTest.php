<?php
namespace Tests\Patterns;

use Absszero\Trify\Patterns\Pattern;

class PatternTest extends \Tests\TestCase
{
    public function testInstance()
    {
        $url = 'https://store.playstation.com/zh-hant-tw/product/HP9000-CUSA09893_00-ASIAPLACEHOLDER1';

        $pattern = new Pattern;
        $instance = $pattern->instance($url);
        $this->assertInstanceOf(\Absszero\Trify\Patterns\SonyPlayStation::class, $instance);

        // Parser not found
        $this->expectExceptionMessage('Pattern not found: unknow');
        $instance = $pattern->instance('http://unknow');
    }
}
