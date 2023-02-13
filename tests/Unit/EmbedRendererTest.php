<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2022 Cappasity Inc.
 */

namespace CappasitySDK\Tests\Unit;

class EmbedRendererTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \CappasitySDK\EmbedRenderer
     */
    private $renderer;

    public function setUp(): void
    {
        $this->renderer = \CappasitySDK\EmbedRendererFactory::getRendererInstance();
    }

    public function testFailOnRenderingWithoutViewId()
    {
        $this->expectExceptionMessage('viewId must be present');
        $this->expectException(\CappasitySDK\EmbedRenderer\Exception\InvalidParamsException::class);
        $this->renderer->render([]);
    }

    public function testRenderWithViewIdOnly()
    {
        $actualEmbedCode = $this->renderer->render([
            'viewId' => '38020fdf-5e11-411c-9116-1610339d59cf',
        ]);

        $expectedEmbedCode = <<<EXPECTED
<iframe
    allowfullscreen
    mozallowfullscreen="true"
    webkitallowfullscreen="true"
    width=""
    height=""
    frameborder="0"
    style="border:0;"
    onmousewheel=""
    src="https://api.cappasity.com/api/player/38020fdf-5e11-411c-9116-1610339d59cf/embedded?autorun=0&closebutton=1&logo=1&autorotate=0&autorotatetime=&autorotatedelay=&autorotatedir=&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0&enableimagezoom=1&zoomquality=&hidezoomopt=0&analytics=1&uipadx=&uipady=&enablestoreurl=0&storeurl=&hidehints=0&starthint=0&arbutton=1"
></iframe>

EXPECTED;

        $this->assertEquals(
            $expectedEmbedCode,
            $actualEmbedCode
        );
    }

    public function testRenderAllOptions()
    {
        $actualEmbedCode = $this->renderer->render([
            'viewId' => '38020fdf-5e11-411c-9116-1610339d59cf',
            'width' => '100%',
            'height' => '600',
            'autoRun' => true,
            'closeButton' => false,
            'logo' => true,
            'autorotate' => false,
            'autorotateTime' => 10,
            'autorotateDelay' => 2,
            'autorotateDir' => 1,
            'hideFullScreen' => true,
            'hideAutorotateOpt' => true,
            'hideSettingsBtn' => false,
            'enableImageZoom' => true,
            'zoomQuality' => 2,
            'hideZoomOpt' => false,
            'analytics' => true,
            'uiPadX' => 10,
            'uiPadY' => 20,
            'enableStoreUrl' => true,
            'storeUrl' => 'http://gant.myshopify.com/products/1',
            'startHint' => true,
            'hideHints' => true,
            'arButton' => false,
        ]);

        $expectedEmbedCode = <<<EXPECTED
<iframe
    allowfullscreen
    mozallowfullscreen="true"
    webkitallowfullscreen="true"
    width="100%"
    height="600"
    frameborder="0"
    style="border:0;"
    onmousewheel=""
    src="https://api.cappasity.com/api/player/38020fdf-5e11-411c-9116-1610339d59cf/embedded?autorun=1&closebutton=0&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0&enableimagezoom=1&zoomquality=2&hidezoomopt=0&analytics=1&uipadx=10&uipady=20&enablestoreurl=1&storeurl=http%3A%2F%2Fgant.myshopify.com%2Fproducts%2F1&hidehints=1&starthint=1&arbutton=0"
></iframe>

EXPECTED;

        $this->assertEquals(
            $expectedEmbedCode,
            $actualEmbedCode
        );
    }
}
