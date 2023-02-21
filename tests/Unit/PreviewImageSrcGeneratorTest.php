<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2023 Cappasity Inc.
 */

namespace CappasitySDK\Tests\Unit;

class PreviewImageSrcGeneratorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \CappasitySDK\PreviewImageSrcGenerator
     */
    private $generator;

    public function setUp(): void
    {
        $validator = \CappasitySDK\ValidatorWrapper::setUpInstance();

        $this->generator = new \CappasitySDK\PreviewImageSrcGenerator($validator);
    }

    /**
     * @dataProvider provideValidPreviewImageSrcGenerationParams
     */
    public function testGeneratePreviewImageSrc($userAlias, $viewId, $options, $expectedLink)
    {
         $actualLink = $this->generator->generatePreviewImageSrc($userAlias, $viewId, $options);

         $this->assertEquals($expectedLink, $actualLink);
    }

    /**
     * @return array
     */
    public function provideValidPreviewImageSrcGenerationParams()
    {
        return [
            [
                'foobaruser',
                '38020fdf-5e11-411c-9116-1610339d59cf',
                [],
                'https://api.cappasity.com/api/files/preview/foobaruser/38020fdf-5e11-411c-9116-1610339d59cf'
            ],
            [
                'foobaruser',
                '38020fdf-5e11-411c-9116-1610339d59cf',
                [
                    'format' => \CappasitySDK\PreviewImageSrcGenerator::FORMAT_PNG,
                    'overlay' => \CappasitySDK\PreviewImageSrcGenerator::OVERLAY_3DP,
                    'modifiers' => [
                        'width' => 600,
                        'height' => 500,
                        'crop' => \CappasitySDK\PreviewImageSrcGenerator::CROP_FILL,
                        'background' => '#09214c',
                    ]
                ],
                'https://api.cappasity.com/api/files/preview/foobaruser/w600-h500-cfill-b09214c/38020fdf-5e11-411c-9116-1610339d59cf.png?o=3dp'
            ],
        ];
    }
}
