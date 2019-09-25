<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019 Cappasity Inc.
 */

namespace CappasitySDK\Tests\Unit;

class EmbedRendererTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \CappasitySDK\EmbedRenderer
     */
    private $renderer;

    public function setUp()
    {
        $this->renderer = \CappasitySDK\EmbedRendererFactory::getRendererInstance();
    }

    /**
     * @expectedExceptionMessage Cappasity 3D View ID is required to render template
     * @expectedException \CappasitySDK\EmbedRenderer\Exception\InvalidParamsException
     */
    public function testFailOnRenderingWithoutViewId()
    {
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
    src="https://api.cappasity.com/api/player/38020fdf-5e11-411c-9116-1610339d59cf/embedded?autorun=0&closebutton=0&logo=0&autorotate=0&autorotatetime=&autorotatedelay=&autorotatedir=&hidefullscreen=0&hideautorotateopt=0&hidesettingsbtn=0&enableimagezoom=0&zoomquality=&hidezoomopt=0&analytics=0"
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
            'autoRotate' => false,
            'autoRotateTime' => 10,
            'autoRotateDelay' => 2,
            'autoRotateDir' => 1,
            'hideFullScreen' => true,
            'hideAutoRotateOpt' => true,
            'hideSettingsBtn' => false,
            'enableImageZoom' => true,
            'zoomQuality' => 2,
            'hideZoomOpt' => false,
            'analytics' => true,
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
    src="https://api.cappasity.com/api/player/38020fdf-5e11-411c-9116-1610339d59cf/embedded?autorun=1&closebutton=0&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0&enableimagezoom=1&zoomquality=2&hidezoomopt=0&analytics=1"
></iframe>

EXPECTED;

        $this->assertEquals(
            $expectedEmbedCode,
            $actualEmbedCode
        );
    }
}
