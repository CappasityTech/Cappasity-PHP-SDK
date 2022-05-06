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
    public function buildByType($typeClassName)
    {
        if (!method_exists($typeClassName, 'configureValidator')) {
            throw new \LogicException('Type class must have method configureValidator()');
        }

        if (!method_exists($typeClassName, 'getRequiredRuleNamespaces')) {
            throw new \LogicException('Type class must have method getRequiredRuleNamespaces()');
        }

        $namespacesDiff = array_diff($typeClassName::getRequiredRuleNamespaces(), $this->factory->getRulePrefixes());
        if (count($namespacesDiff) > 0) {
            $diffAsString = join(', ', $namespacesDiff);

            throw new \LogicException("Not all required rule namespaces were appended to the factory, check out the diff: ${diffAsString}");
        }

        Validator::setFactory($this->factory);

        /** @var \Respect\Validation\Validator $validator */
        $validator = $typeClassName::configureValidator($this->factory);

        Validator::setFactory(null);

        return $validator;
    }

    /**
     * @param Validator $typeValidator
     * @param $input
     * @return bool
     *
     * @throws ValidationException
     */
    public function assert($input, Validator $typeValidator)
    {
        Validator::setFactory($this->factory);

        try {
            return $typeValidator->assert($input);
        } catch (NestedValidationException $e) {
            throw ValidationException::fromNestedValidationException($e);
        } finally {
            Validator::setFactory(null);
        }
    }

    /**
     * @param $input
     * @param Validator $typeValidator
     * @return bool
     */
    public function validate($input, Validator $typeValidator)
    {
        Validator::setFactory($this->factory);

        try {
            return $typeValidator->validate($input);
        } finally {
            Validator::setFactory(null);
        }
    }

    /**
     * @return static
     */
    public static function setUpInstance()
    {
        $factory = new Factory();
        foreach (self::$rulePrefixesToAppend as $rulePrefix) {
            $factory->appendRulePrefix($rulePrefix);
        }

        return new static($factory);
    }
}
