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

namespace CappasitySDK;

use Twig;
use CappasitySDK\EmbedRenderer\Validator\Type\Render;

class EmbedRenderer
{
    /**
     * @var Twig\Environment
     */
    private $twig;

    /**
     * @var ValidatorWrapper
     */
    private $validator;

    /**
     * @param Twig\Environment $twig
     * @param ValidatorWrapper $validator
     */
    public function __construct(Twig\Environment $twig, ValidatorWrapper $validator)
    {
        $this->twig = $twig;
        $this->validator = $validator;
    }

    /**
     * @param array $params
     * @return string
     * @throws EmbedRenderer\Exception\RenderException
     */
    public function render(array $params): string
    {
        $this->validateParams($params);

        try {
            return $this->twig->render('embed.html.twig', $params);
        } catch (Twig\Error\Error $e) {
            throw new EmbedRenderer\Exception\RenderException('Error occurred while rendering embed code template', 0, $e);
        }
    }

    /**
     * @param array $params
     *
     * @throws EmbedRenderer\Exception\InvalidParamsException
     */
    private function validateParams(array $params)
    {
        try {
            $this->validator->assert($params, $this->validator->buildByType(Render::class));
        } catch (ValidatorWrapper\Exception\ValidationException $e) {
            throw new EmbedRenderer\Exception\InvalidParamsException($e->getMessage());
        }
    }
}
