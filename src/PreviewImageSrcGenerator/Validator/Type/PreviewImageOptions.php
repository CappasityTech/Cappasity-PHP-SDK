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

namespace CappasitySDK\PreviewImageSrcGenerator\Validator\Type;

use Respect\Validation\Validator as V;

use CappasitySDK\ValidatorTypeInterface;
use CappasitySDK\PreviewImageSrcGenerator as Preview;

class PreviewImageOptions implements ValidatorTypeInterface
{
    /**
     * @return \Respect\Validation\Validator
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('PreviewImageOptions')
            ->arrayType()
            ->keySet(
                V::key(
                    'modifiers',
                    V::arrayType()->keySet(
                        V::key('width', V::intType()->positive(), false),
                        V::key('height', V::intType()->positive(), false),
                        V::key('background', V::background(), false),
                        V::key('square', V::intType()->positive(), false),
                        V::key('top', V::intType()->positive(), false),
                        V::key('left', V::intType()->positive(), false),
                        V::key('gravity', V::in(Preview::$supportedGravities), false),
                        V::key('quality', V::allOf(V::intType(), V::between(1, 100)), false),
                        V::key('crop', V::in(Preview::$supportedCrops), false)
                    ),
                    false
                ),
                V::key('format', V::in(Preview::$supportedFormats), false),
                V::key('overlay', V::in(Preview::$supportedOverlays), false)
            );
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [
            'CappasitySDK\\PreviewImageSrcGenerator\\Validator\\Rules\\',
        ];
    }
}
