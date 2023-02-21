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

namespace CappasitySDK\Client\Validator\Type\Request\Process;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Process\JobsPullResultGet as JobsPullResultGetModel;
use CappasitySDK\Client\Validator\TypeInterface;

class JobsPullResultGet implements TypeInterface
{
    /**
     * @return V
     */
    public static function configureValidator(): V
    {
        return V::create()
            ->setName('JobsPullResultGet')
            ->instance(JobsPullResultGetModel::class)
            ->attribute('jobId', V::stringType());
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces(): array
    {
        return [];
    }
}
