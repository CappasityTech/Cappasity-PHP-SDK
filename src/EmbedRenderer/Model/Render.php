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

namespace CappasitySDK\EmbedRenderer\Model;

class Render
{
    const ROTATE_DIRECTION_CLOCKWISE = 1;
    const ROTATE_DIRECTION_COUNTER_CLOCKWISE = -1;

    const QUALITY_SD = 1;
    const QUALITY_HD = 2;

    const AUTOROTATE_TIME_MIN = 2;
    const AUTOROTATE_TIME_MAX = 60;

    const AUTOROTATE_DELAY_MIN = 1;
    const AUTOROTATE_DELAY_MAX = 10;

    public static $rotateDirectionOptions = [
        self::ROTATE_DIRECTION_CLOCKWISE,
        self::ROTATE_DIRECTION_COUNTER_CLOCKWISE
    ];

    public static $qualityOptions = [
        self::QUALITY_SD,
        self::QUALITY_HD,
    ];
}
