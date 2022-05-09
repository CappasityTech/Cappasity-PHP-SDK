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

class PreviewImageSrcGeneratorFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetClientInstance()
    {
        $generator = \CappasitySDK\PreviewImageSrcGeneratorFactory::getGeneratorInstance();

        $this->assertEquals(\CappasitySDK\PreviewImageSrcGenerator::class, get_class($generator));
    }
}
