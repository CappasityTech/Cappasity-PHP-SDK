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

use LogicException;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Factory;

use CappasitySDK\ValidatorWrapper\Exception\ValidationException;

class ValidatorWrapper
{
    private static $rulePrefixesToAppend = [
        'CappasitySDK\\Common\\Validator\\Rules',
        'CappasitySDK\\PreviewImageSrcGenerator\\Validator\\Rules',
        'CappasitySDK\\EmbedRenderer\\Validator\\Rules'
    ];

    private static $exceptionPrefixesToAppend = [
        'CappasitySDK\\Common\\Validator\\Exceptions',
        'CappasitySDK\\PreviewImageSrcGenerator\\Validator\\Exception',
        'CappasitySDK\\EmbedRenderer\\Validator\\Exception'
    ];

    /**
     * @var Factory
     */
    private $factory;

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $typeClassName
     * @return Validator
     */
    public function buildByType(string $typeClassName): Validator
    {
        if (!method_exists($typeClassName, 'configureValidator')) {
            throw new LogicException('Type class must have method configureValidator()');
        }

        if (!method_exists($typeClassName, 'getRequiredRuleNamespaces')) {
            throw new LogicException('Type class must have method getRequiredRuleNamespaces()');
        }

        /** @var Validator $validator */
        $validator = $typeClassName::configureValidator();

        return $validator;
    }

    /**
     * @param $input
     * @param Validator $typeValidator
     *
     * @return bool
     *
     * @throws ValidationException
     */
    public function assert($input, Validator $typeValidator): void
    {
        try {
            $typeValidator->assert($input);
        } catch (NestedValidationException $e) {
            throw ValidationException::fromNestedValidationException($e);
        }
    }

    /**
     * @param $input
     * @param Validator $typeValidator
     * @return bool
     */
    public function validate($input, Validator $typeValidator): bool
    {
        return $typeValidator->validate($input);
    }

    /**
     * @return static
     */
    public static function setUpInstance(): ValidatorWrapper
    {
        $factory = new Factory();
        foreach (self::$rulePrefixesToAppend as $rulePrefix) {
            $factory = $factory->withRuleNamespace($rulePrefix);
        }
        foreach (self::$exceptionPrefixesToAppend as $exceptionPrefix) {
            $factory = $factory->withExceptionNamespace($exceptionPrefix);
        }
        Factory::setDefaultInstance($factory);

        return new static($factory);
    }
}
