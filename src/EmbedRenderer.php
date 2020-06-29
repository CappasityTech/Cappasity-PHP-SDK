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

use Twig_Error;
use Twig_Environment;
use CappasitySDK\EmbedRenderer\Validator\Type\Render;

class EmbedRenderer
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var ValidatorWrapper
     */
    private $validator;

    /**
     * @param Twig_Environment $twig
     * @param ValidatorWrapper $validator
     */
    public function __construct(Twig_Environment $twig, ValidatorWrapper $validator)
    {
        $this->twig = $twig;
        $this->validator = $validator;
    }

    /**
     * @param array $params
     * @return string
     * @throws EmbedRenderer\Exception\RenderException
     */
    public function render(array $params)
    {
        $this->triggerDeprecationWarning($params);

        $this->validateParams($params);

        try {
            return $this->twig->render('embed.html.twig', $params);
        } catch (Twig_Error $e) {
            throw new EmbedRenderer\Exception\RenderException('Error occurred while rendering embed code template', 0, $e);
        }
    }

    private function validateParams(array $params)
    {
        try {
            $this->validator->assert($params, $this->validator->buildByType(Render::class));
        } catch (ValidatorWrapper\Exception\ValidationException $e) {
            throw new EmbedRenderer\Exception\InvalidParamsException($e->getMessage());
        }
    }

    /**
     * Produces silenced deprecation error when deprecated params are passed
     *
     * @deprecated since 3.8.4, will be removed in 4.0.0
     * @param array $params
     */
    private function triggerDeprecationWarning(array $params)
    {
        $paramTitles = array_keys($params);
        $deprecatedCaseSettingsTitles = ['autoRotate', 'autoRotateTime', 'autoRotateDelay', 'autoRotateDir', 'hideAutoRotateOpt'];

        if (count(array_intersect($paramTitles, $deprecatedCaseSettingsTitles))) {
            @trigger_error('EmbedRenderer::render($params) method params autoRotate, autoRotateTime, autoRotateDelay, autoRotateDir, hideAutoRotateOpt are deprecated. Since version 4.0.0 the support of this params will be stopped. Use autorotate, autorotateTime, autorotateDelay, autorotateDir and hideAutorotateOpt instead.', E_USER_DEPRECATED);
        }
    }
}
