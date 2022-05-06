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

use Twig_Loader_Filesystem;
use Twig_Environment;

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
    public static function getRendererInstance(array $engineOptions = [])
    {
        $loader = new Twig_Loader_Filesystem(['templates'], __DIR__.'/..');
        $twig = new Twig_Environment($loader, $engineOptions);
        $validator = ValidatorWrapper::setUpInstance();

        return new EmbedRenderer($twig, $validator);
    }
}
