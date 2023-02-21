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

namespace CappasitySDK;

use Twig;

class EmbedRendererFactory
{
    /**
     * @param array $engineOptions
     *
     * You are expected to use `cache` option.
     * "The cache option is a compilation cache directory, where Twig caches the compiled templates to avoid the parsing
     * phase for sub-sequent requests. It is very different from the cache you might want to add for the evaluated
     * templates. For such a need, you can use any available PHP cache library."
     * @link https://twig.symfony.com/doc/1.x/api.html
     *
     * @return EmbedRenderer
     */
    public static function getRendererInstance(array $engineOptions = []): EmbedRenderer
    {
        $loader = new Twig\Loader\FilesystemLoader(['templates'], __DIR__.'/..');
        $twig = new Twig\Environment($loader, $engineOptions);
        $validator = ValidatorWrapper::setUpInstance();

        return new EmbedRenderer($twig, $validator);
    }
}
