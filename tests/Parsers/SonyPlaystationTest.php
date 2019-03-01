<?php
namespace Tests\Parsers;

use Absszero\Trify\Parsers\SonyPlaystation;

class SonyPlaystationTest extends \Tests\TestCase
{
    public function testParse()
    {
        $parser = new SonyPlaystation;
        $meta = $parser->parse('url', $this->body());
        $this->assertEquals('《FIFA 19》終極版 PS Plus 同捆包 預購', $meta->title);
        $this->assertEquals('3887', $meta->price);
    }

    protected function body()
    {
        return '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/img/favicons/favicon-797c65013063519546525db9296a4cf3.png">
    <link rel="apple-touch-icon" href="/img/favicons/apple-touch-icon-9c19f4a7c74f72244f540112c2a37fec.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicons/apple-touch-icon-72x72-e8cc2aa249e5e2d88b9b7dfe87493977.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicons/apple-touch-icon-114x114-9c19f4a7c74f72244f540112c2a37fec.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicons/apple-touch-icon-144x144-8d51bae3c7934c3995a3bcfbb4704d2a.png">


<meta name="valkyrie-storefront/config/environment" content="%7B%22modulePrefix%22%3A%22valkyrie-storefront%22%2C%22environment%22%3A%22production%22%2C%22rootURL%22%3A%22/%22%2C%22version%22%3A%221.7.0%22%2C%22netstoragePrefix%22%3A%22/valkyrie-storefront/%22%2C%22podModulePrefix%22%3A%22valkyrie-storefront/pods%22%2C%22locationType%22%3A%22auto%22%2C%22browserify%22%3A%7B%22ignores%22%3A%5B%22fetch-mock%22%5D%7D%2C%22EmberENV%22%3A%7B%22FEATURES%22%3A%7B%7D%7D%2C%22defaultLine%22%3A%22e1-np%22%2C%22platform%22%3A%22desktop%22%2C%22defaultServiceLocation%22%3A%22remote%22%2C%22loadingScreenConfig%22%3A%7B%22enable%22%3Afalse%2C%22durationMs%22%3A2000%2C%22timerStart%22%3Afalse%2C%22loadingScreenStyle%22%3A%22modernChihiro%22%7D%2C%22APP%22%3A%7B%22jwPlayerKey%22%3A%22DI6oApSyEsTnadsAz/ZUUq5tLpEqYRCy1qAb3A%3D%3D%22%2C%22footer%22%3A%7B%22url%22%3A%22https%3A//cdn.playstationnetwork.com/unifiedfooter/unifiedfooter.js%22%7D%2C%22name%22%3A%22valkyrie-storefront%22%2C%22version%22%3A%22v1.12.1%22%7D%2C%22FEATURES%22%3A%7B%22MANDATORY_SETTER%22%3Afalse%7D%2C%22config%22%3A%7B%22pathBase%22%3A%22config/%22%7D%2C%22localization%22%3A%7B%22showLocalizedKeys%22%3Afalse%2C%22missingTranslationThrowsException%22%3Afalse%7D%2C%22fastboot%22%3A%7B%22hostWhitelist%22%3A%5B%7B%7D%2C%7B%7D%2C%7B%7D%5D%2C%22redirectCode%22%3A302%7D%2C%22valkyrieGitVersion%22%3A%22tags/v1.12.1-0-g581c5f8%22%2C%22valkyrieGitSHA%22%3A%22581c5f8fce793e93e7f89b387587e400b1994698%22%2C%22exportApplicationGlobal%22%3Afalse%7D">
<meta name="universal-cart-engine/config/environment" content="%7B%22modulePrefix%22%3A%22universal-cart-engine%22%2C%22environment%22%3A%22production%22%2C%22podModulePrefix%22%3A%22universal-cart-engine/pods%22%2C%22ember-component-css%22%3A%7B%22namespacing%22%3Afalse%2C%22terseClassNames%22%3Atrue%7D%2C%22FEATURES%22%3A%7B%22MANDATORY_SETTER%22%3Afalse%7D%2C%22rootURL%22%3A%22/%22%2C%22localization%22%3A%7B%22defaultLanguage%22%3A%22en%22%2C%22defaultCountry%22%3A%22us%22%2C%22showLocalizedKeys%22%3Afalse%2C%22fastbootBaseUrl%22%3A%22http%3A//localhost%22%2C%22missingTranslationThrowsException%22%3Afalse%7D%2C%22valkyrieGitVersion%22%3A%22%22%2C%22valkyrieGitSHA%22%3A%22%22%7D">
<!-- EMBER_CLI_FASTBOOT_TITLE --><meta name="ember-cli-head-start"><!-- `ember-cli-meta-tags/templates/head.hbs` -->
  <meta property="susuwatari-version" content="Susuwatari v1.10.1-1cd59a49" id="ember11503630" class="ember-view">

  <meta property="vsf-version" content="" id="ember11503632" class="ember-view">

  <meta property="fb-vsf-version" content="v1.5.1-0-g509af09e" id="ember11503634" class="ember-view">

  <title id="ember11503636" class="ember-view">&#x300A;FIFA 19&#x300B;&#x7D42;&#x6975;&#x7248; PS Plus &#x540C;&#x6346;&#x5305; &#x9810;&#x8CFC; - PS4 | PlayStation&#x2122;Store&#x5B98;&#x65B9;&#x7DB2;&#x7AD9; &#x53F0;&#x7063;
</title>
  <script type="application/ld+json" id="ember11503638" class="ember-view">{"@context":"http://schema.org","@type":"Product","name":"《FIFA 19》終極版 PS Plus 同捆包 預購","category":"同捆包","image":"https://store.playstation.com/store/api/chihiro/00_09_000/container/TW/ch/999/HP0006-CUSA11810_00-FIFA19PRESUPPSAP/1535163463000/image?w=240&amp;h=240&amp;bg_color=000000&amp;opacity=100&amp;_version=00_09_000","offers":[{"@type":"Offer","priceCurrency":"TWD","price":3887},{"@type":"Offer","priceCurrency":"TWD","price":3887}],"sku":"HP0006-CUSA11810_00-FIFA19PRESUPPSAP","description":"&lt;b&gt;&lt;font color=\"orange\"&gt;※在購買本套裝包前若已購買單獨商品，恕不會作出退款，敬請見諒。&lt;/font&gt;&lt;/b&gt;&lt;br&gt;&lt;br&gt;凡購買此版本的《FIFA 19》終極版，即可獲得12個月的PlayStation®Plus兌換券和2200 FIFA點數來強化您的FIFA 19 Ultimate Team隊伍。 &lt;br&gt;&lt;br&gt;終極版預購*內容包括：&lt;br&gt;• 多達40套大型高級黃金"}
</script>
  <meta property="og:title" content="&#x300A;FIFA 19&#x300B;&#x7D42;&#x6975;&#x7248; PS Plus &#x540C;&#x6346;&#x5305; &#x9810;&#x8CFC;" id="ember11503640" class="ember-view">

  <meta property="og:url" content="http://localhost:3000/zh-hant-tw/product/HP0006-CUSA11810_00-FIFA19PRESUPPSAP" id="ember11503642" class="ember-view">

  <meta property="og:type" content="psnfeed:game" id="ember11503644" class="ember-view">

  <meta property="og:description" content="&lt;b&gt;&lt;font color=&quot;orange&quot;&gt;&#x203B;&#x5728;&#x8CFC;&#x8CB7;&#x672C;&#x5957;&#x88DD;&#x5305;&#x524D;&#x82E5;&#x5DF2;&#x8CFC;&#x8CB7;&#x55AE;&#x7368;&#x5546;&#x54C1;&#xFF0C;&#x6055;&#x4E0D;&#x6703;&#x4F5C;&#x51FA;&#x9000;&#x6B3E;&#xFF0C;&#x656C;&#x8ACB;&#x898B;&#x8AD2;&#x3002;&lt;/font&gt;&lt;/b&gt;&lt;br&gt;&lt;br&gt;&#x51E1;&#x8CFC;&#x8CB7;&#x6B64;&#x7248;&#x672C;&#x7684;&#x300A;FIFA 19&#x300B;&#x7D42;&#x6975;&#x7248;&#xFF0C;&#x5373;&#x53EF;&#x7372;&#x5F97;12&#x500B;&#x6708;&#x7684;PlayStation&#xAE;Plus&#x514C;&#x63DB;&#x5238;&#x548C;2200 FIFA&#x9EDE;&#x6578;&#x4F86;&#x5F37;&#x5316;&#x60A8;&#x7684;FIFA 19 Ultimate Team&#x968A;&#x4F0D;&#x3002; &lt;br&gt;&lt;br&gt;&#x7D42;&#x6975;&#x7248;&#x9810;&#x8CFC;*&#x5167;&#x5BB9;&#x5305;&#x62EC;&#xFF1A;&lt;br&gt;&#x2022; &#x591A;&#x9054;40&#x5957;&#x5927;&#x578B;&#x9AD8;&#x7D1A;&#x9EC3;&#x91D1;&#x7D44;&#x5408;&#x5305;&#xFF08;&#x6BCF;&#x9031;&#x7D66;&#x4E88;&#x73A9;&#x5BB6;2&#x500B;&#x7D44;&#x5408;&#x5305;&#xFF0C;&#x9023;&#x7E8C;&#x6D3E;&#x9001;20&#x9031;&#xFF09;&lt;br&gt;&#x2022; &#x63D0;&#x524D; 3 &#x5929;&#x66A2;&#x73A9;&lt;br&gt;&#x2022; &#x6B50;&#x6D32;&#x51A0;&#x8ECD;&#x806F;&#x8CFD;&#x9EC3;&#x91D1;&#x7403;&#x54E1;&#x5FB5;&#x53EC;&lt;br&gt;&#x2022; 7&#x5834;&#x6BD4;&#x8CFD;&#x7684;Neymar FUT&#x79DF;&#x501F;&#x7269;&#x54C1;&lt;br&gt;&#x2022; 7&#x5834;&#x6BD4;&#x8CFD;&#x7684;Cristian" id="ember11503646" class="ember-view">

  <meta property="og:image" content="https://store.playstation.com/store/api/chihiro/00_09_000/container/TW/ch/999/HP0006-CUSA11810_00-FIFA19PRESUPPSAP/1535163463000/image?w=240&amp;h=240&amp;bg_color=000000&amp;opacity=100&amp;_version=00_09_000" id="ember11503648" class="ember-view">

  <meta property="og:locale" content="ch_TW" id="ember11503650" class="ember-view">

  <meta property="og:site_name" content="PlayStation&#x2122;Store" id="ember11503652" class="ember-view">


<meta name="ember-cli-head-end">';
    }
}
