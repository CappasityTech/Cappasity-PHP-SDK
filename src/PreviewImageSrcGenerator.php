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

namespace CappasitySDK;

use CappasitySDK\PreviewImageSrcGenerator\Validator\Type\PreviewImageOptions as PreviewImageOptionsType;

class PreviewImageSrcGenerator
{
    const BASE_URL_API_CAPPASITY = 'https://api.cappasity.com';
    const PATH_API_FILES_PREVIEW = '/api/files/preview';

    const OPTION_MODIFIERS = 'modifiers';
    const OPTION_FORMAT = 'format';
    const OPTION_OVERLAY = 'overlay';

    const OPTION_MODIFIER_HEIGHT = 'height';
    const OPTION_MODIFIER_WIDTH = 'width';
    const OPTION_MODIFIER_SQUARE = 'square';
    const OPTION_MODIFIER_TOP = 'top';
    const OPTION_MODIFIER_LEFT = 'left';
    const OPTION_MODIFIER_GRAVITY = 'gravity';
    const OPTION_MODIFIER_CROP = 'crop';
    const OPTION_MODIFIER_QUALITY = 'quality';
    const OPTION_MODIFIER_BACKGROUND = 'background';

    const OVERLAY_3DP = '3dp';
    const OVERLAY_3DP_2X = '3dp@2x';
    const OVERLAY_3DP_3X = '3dp@3x';

    const FORMAT_JPEG = 'jpeg';
    const FORMAT_JPG = 'jpg';
    const FORMAT_PNG = 'png';
    const FORMAT_WEBP = 'webp';
    const FORMAT_GIF = 'gif';

    const CROP_FIT = 'fit';
    const CROP_FILL = 'fill';
    const CROP_CUT = 'cut';
    const CROP_PAD = 'pad';

    const GRAVITY_CENTER = 'c';
    const GRAVITY_NORTH = 'n';
    const GRAVITY_SOUTH = 's';
    const GRAVITY_EAST = 'e';
    const GRAVITY_WEST = 'w';
    const GRAVITY_NORTH_EAST = 'ne';
    const GRAVITY_NORTH_WEST = 'nw';
    const GRAVITY_SOUTH_EAST = 'se';
    const GRAVITY_SOUTH_WEST = 'sw';

    public static $supportedOverlays = [
        self::OVERLAY_3DP,
        self::OVERLAY_3DP_2X,
        self::OVERLAY_3DP_3X,
    ];

    public static $supportedFormats = [
        self::FORMAT_JPEG,
        self::FORMAT_JPG,
        self::FORMAT_PNG,
        self::FORMAT_WEBP,
        self::FORMAT_GIF,
    ];

    public static $supportedCrops = [
        self::CROP_FIT,
        self::CROP_FILL,
        self::CROP_CUT,
        self::CROP_PAD,
    ];

    public static $supportedGravities = [
        self::GRAVITY_CENTER,
        self::GRAVITY_NORTH,
        self::GRAVITY_SOUTH,
        self::GRAVITY_EAST,
        self::GRAVITY_WEST,
        self::GRAVITY_NORTH_EAST,
        self::GRAVITY_NORTH_WEST,
        self::GRAVITY_SOUTH_EAST,
        self::GRAVITY_SOUTH_WEST,
    ];

    public static $modifiers = [
        self::OPTION_MODIFIER_HEIGHT,
        self::OPTION_MODIFIER_WIDTH,
        self::OPTION_MODIFIER_SQUARE,
        self::OPTION_MODIFIER_TOP,
        self::OPTION_MODIFIER_LEFT,
        self::OPTION_MODIFIER_GRAVITY,
        self::OPTION_MODIFIER_CROP,
        self::OPTION_MODIFIER_QUALITY,
        self::OPTION_MODIFIER_BACKGROUND,
    ];

    public static $queryOptionsToKeys = [
        self::OPTION_OVERLAY => 'o',
    ];

    public static $modifiersTitlesToKeys = [
        self::OPTION_MODIFIER_HEIGHT => 'h',
        self::OPTION_MODIFIER_WIDTH => 'w',
        self::OPTION_MODIFIER_SQUARE => 's',
        self::OPTION_MODIFIER_TOP => 'y',
        self::OPTION_MODIFIER_LEFT => 'x',
        self::OPTION_MODIFIER_GRAVITY => 'g',
        self::OPTION_MODIFIER_CROP => 'c',
        self::OPTION_MODIFIER_QUALITY => 'q',
        self::OPTION_MODIFIER_BACKGROUND => 'b',
    ];

    /**
     * @var ValidatorWrapper
     */
    private $validator;

    /**
     * @param ValidatorWrapper $validator
     */
    public function __construct(ValidatorWrapper $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return string
     */
    private static function getBaseUrl()
    {
        $baseUrl = static::BASE_URL_API_CAPPASITY;
        $path = static::PATH_API_FILES_PREVIEW;

        return "{$baseUrl}{$path}";
    }

    /**
     * @param $userAlias
     * @param $viewId
     * @param array $options
     *
     * @return string
     *
     * @throws \CappasitySDK\PreviewImageSrcGenerator\Exception\ValidationException
     */
    public function generatePreviewImageSrc($userAlias, $viewId, array $options = [])
    {
        $urlSections = [self::getBaseUrl(), $userAlias];
        $this->validateOptions($options);
        $preparedOptions = $this->prepareOptions($options);

        if (array_key_exists(self::OPTION_MODIFIERS, $preparedOptions)) {
            $urlSections[] = $this->prepareModifiersString($preparedOptions[self::OPTION_MODIFIERS]);
        }

        $urlSections[] = $viewId;
        $baseViewUrl = join("/", $urlSections);
        $format = array_key_exists(self::OPTION_FORMAT, $preparedOptions)
            ? ".{$preparedOptions[self::OPTION_FORMAT]}"
            : "";
        $queryOptions = [];
        if (array_key_exists(self::OPTION_OVERLAY, $preparedOptions)) {
            $queryOptions[self::$queryOptionsToKeys[self::OPTION_OVERLAY]] = $preparedOptions[self::OPTION_OVERLAY];
        }

        $query = !empty($queryOptions)
            ? join("", ["?", http_build_query($queryOptions)])
            : "";

        return "{$baseViewUrl}{$format}{$query}";
    }

    /**
     * @param array $modifiers
     * @return string
     */
    private function prepareModifiersString(array $modifiers)
    {
        $filteredModifiers = array_filter(
            $modifiers,
            function ($value) {
                return $value !== null;
            }
        );
        $modifiersTitlesToKeys = self::$modifiersTitlesToKeys;
        $modifiersStrings = [];

        foreach ($filteredModifiers as $title => $value) {
            $key = $modifiersTitlesToKeys[$title];
            $modifiersStrings[] = "{$key}{$value}";
        }

        return join("-", $modifiersStrings);
    }

    /**
     * @param array $options
     * @throws PreviewImageSrcGenerator\Exception\ValidationException
     */
    private function validateOptions(array $options)
    {
        try {
            $this->validator->assert($options, $this->validator->buildByType(PreviewImageOptionsType::class));
        } catch (ValidatorWrapper\Exception\ValidationException $e) {
            throw PreviewImageSrcGenerator\Exception\ValidationException::fromValidatorWrapperValidationException($e);
        }
    }

    /**
     * @param array $options
     * @return array
     */
    private function prepareOptions(array $options)
    {
        $transformedOptions = [];

        $hasBackgroundModifier = array_key_exists('modifiers', $options)
            && array_key_exists(self::OPTION_MODIFIER_BACKGROUND, $options['modifiers']);

        if ($hasBackgroundModifier) {
            $originalBackground = $options['modifiers']['background'];
            $transformedOptions['modifiers']['background'] = $this->prepareBackgroundModifier($originalBackground);
        }

        return array_replace_recursive($options, $transformedOptions);
    }

    /**
     * Strips hash char
     *
     * @param string $background hash prefixed hex value
     * @return bool|string
     */
    private function prepareBackgroundModifier($background)
    {
        return substr($background, 1);
    }
}
