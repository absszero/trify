<?php
namespace Tests\Parsers;

use Absszero\Trify\Parsers\Savecoins;

class SaveCoinsTest extends \Tests\TestCase
{
    public function testParse()
    {
        $parser = new Savecoins;
        $meta = $parser->parse('url', $this->body());
        $this->assertEquals('Unravel Two', $meta->title);
        $this->assertEquals('616.26', $meta->price);
    }

    protected function body()
    {
        return '{"data":{"platform":"nintendo","slug":"unravel-two","url":"https://api-savecoins.nznweb.com.br/v1/games/unravel-two","title":"Unravel Two","japaneseTitle":null,"imageUrl":"https://media.nintendo.com/nintendo/bin/nUuVr7YXxyG7EQclMjJmODA_sSFGll14/h1j6770Rw7XWxn-eIqnSMT5JPDs6esg7.png","releaseDate":"2019-03-22","releaseDateOrder":"2019-03-22","description":null,"releaseDates":[{"region":"美洲","releaseDate":"2019-03-22"}],"publishers":[],"developers":[],"languages":[],"categories":["Platformer"],"retailRelease":null,"numberOfPlayers":"2 players simultaneous","hasDemo":false,"demos":[{"region":"美洲","hasDemo":false}],"preorderAvailable":false,"size":null,"youtubeId":"j2TmLrTl6gs","linkToPurchaseDigital":"https://ec.nintendo.com/title_purchase_confirm?title=70010000015568\u0026v_country=US","linkToPurchasePhysical":"","price_info":{"best_price":true,"url_eshop":null,"currentPrice":"TWD 616.26","rawCurrentPrice":616.26,"hasDiscount":false,"status":"沒有發布","goldPoints":100,"digital_release":true,"physical_release":false,"country":{"code":"US","name":"美國"},"regularPrice":{"rawOriginalRegularPrice":19.99,"originalRegularPrice":"USD 19.99","rawRegularPrice":616.26,"regularPrice":"TWD 616.26"}},"price_digital":{"best_price":true,"url_eshop":null,"currentPrice":"TWD 616.26","rawCurrentPrice":616.26,"hasDiscount":false,"status":"沒有發布","goldPoints":100,"digital_release":true,"physical_release":false,"country":{"code":"US","name":"美國"},"regularPrice":{"rawOriginalRegularPrice":19.99,"originalRegularPrice":"USD 19.99","rawRegularPrice":616.26,"regularPrice":"TWD 616.26"}},"price_physical":null,"dlcs":[],"price_history":[]}}';
    }
}
