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

namespace CappasitySDK\Client\Validator\Type\Request\Process;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Process\JobsPullAckPost as JobsPullAckPostModel;
use CappasitySDK\Client\Validator\TypeInterface;

class JobsPullAckPost implements TypeInterface
{
    /**
     * @return \Respect\Validation\Validator
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('JobsPullAckPost')
            ->instance(JobsPullAckPostModel::class)
            ->attribute('jobIds', V::allOf([
                V::arrayType(),
                V::each(V::stringType()),
                V::length(1),
            ]));
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
