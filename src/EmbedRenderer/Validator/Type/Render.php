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

namespace CappasitySDK\EmbedRenderer\Validator\Type;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Validator;
use CappasitySDK\EmbedRenderer\Model\Render as RenderModel;

class Render implements Validator\TypeInterface
{
    const NOT_REQUIRED = false;

    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('Render')
            ->arrayType()
            ->key('viewId', V::allOf(V::stringType(), V::uuid()))
            ->key('width', V::allOf(V::stringType(), V::dimensionSize()), self::NOT_REQUIRED)
            ->key('height', V::allOf(V::stringType(), V::dimensionSize()), self::NOT_REQUIRED)
            ->key('autoRun', V::boolType(), self::NOT_REQUIRED)
            ->key('closeButton', V::boolType(), self::NOT_REQUIRED)
            ->key('logo', V::boolType(), self::NOT_REQUIRED)
            ->key('analytics', V::boolType(), self::NOT_REQUIRED)
            ->key('autorotate', V::boolType(), self::NOT_REQUIRED)
            ->key(
                'autorotateTime',
                V::allOf(
                    V::intType(),
                    V::min(RenderModel::AUTOROTATE_TIME_MIN),
                    V::max(RenderModel::AUTOROTATE_TIME_MAX)
                ),
                self::NOT_REQUIRED
            )
            ->key(
                'autorotateDelay',
                V::allOf(
                    V::intType(),
                    V::min(RenderModel::AUTOROTATE_DELAY_MIN),
                    V::max(RenderModel::AUTOROTATE_TIME_MAX)
                ),
                self::NOT_REQUIRED
            )
            ->key('autorotateDir', V::in(RenderModel::$rotateDirectionOptions), self::NOT_REQUIRED)
            ->key('hideFullScreen', V::boolType(), self::NOT_REQUIRED)
            ->key('hideAutorotateOpt', V::boolType(), self::NOT_REQUIRED)
            ->key('hideSettingsBtn', V::boolType(), self::NOT_REQUIRED)
            ->key('enableImageZoom', V::boolType(), self::NOT_REQUIRED)
            ->key('zoomQuality', V::in(RenderModel::$qualityOptions), self::NOT_REQUIRED)
            ->key('hideZoomOpt', V::boolType(), self::NOT_REQUIRED)
            ->key('uiPadX', V::allOf(V::intType(), V::min(0)), self::NOT_REQUIRED)
            ->key('uiPadY', V::allOf(V::intType(), V::min(0)), self::NOT_REQUIRED)
            ->key('enableStoreUrl', V::boolType(), self::NOT_REQUIRED)
            ->key('storeUrl', V::stringType(), self::NOT_REQUIRED)
            ->key('hideHints', V::boolType(), self::NOT_REQUIRED)
            ->key('startHint', V::boolType(), self::NOT_REQUIRED)
            ->key('arButton', V::boolType(), self::NOT_REQUIRED)
            ;
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [
            'CappasitySDK\\Common\\Validator\\Rules\\',
            'CappasitySDK\\EmbedRenderer\\Validator\\Rules\\'
        ];
    }
}
