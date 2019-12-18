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

namespace CappasitySDK\Client\Validator\Type\Request\Files;

use Respect\Validation\Validator as V;

use CappasitySDK\Client\Model\Request\Files\ListGet as ListGetModel;
use CappasitySDK\Client\Validator;

class ListGet implements Validator\TypeInterface
{
    const NOT_MANDATORY = false;

    /**
     * @return V
     */
    public static function configureValidator()
    {
        return V::create()
            ->setName('ListGet')
            ->instance(ListGetModel::class)
            ->attribute(
                'offset',
                V::oneOf(
                    V::nullType(),
                    V::intType()->min(0)
                )
            )
            ->attribute(
                'limit',
                V::oneOf(
                    V::nullType(),
                    V::intType()->min(1)->max(100)
                )
            )
            ->attribute('criteria', V::oneOf(V::nullType(), V::stringType()))
            ->attribute('order', V::oneOf(V::nullType(), V::stringType()))
            /**
             * Filename filter example:
             * $filter = ['filename' => 'foobarfilename']
             *
             * Single field filter example:
             * $filter = [
             *      'alias' => [
             *          ListGet::FILTER_EQ => 'foobar'
             *      ],
             * ]
             *
             * Multi field filter example:
             * $filter = [
             *      ListGet::FILTER_MULTI => [
             *          ListGet::FILTER_FIELDS => ['name', 'alias'],
             *          ListGet::FILTER_MATCH => 'foobar',
             *      ]
             * ]
             *
             * [
             *   '#multi' => [
             *     'fields' => ['name', 'alias'],
             *     'match' => 'filter-me',
             *   ],
             *   'alias' => ['match' => 'filter-me'],
             *   'status' => ['eq' => 'processed'],
             *   'public' => ['ne' => '1'],
             *   'uploadedAt' => ['gte' => 1551090243020, 'lte' => 1551090243029],
             *   'startedAt' => ['gte' => 1551090243020],
             * ]
             */
            ->attribute(
                'filter',
                V::oneOf(
                    V::nullType(),
                    V::stringType(),
                    V::allOf(
                        V::arrayVal(),
                        V::length(1),
                        V::each(
                            V::oneOf(
                                V::stringType(),
                                V::allOf(
                                    V::arrayVal(),
                                    V::keySet(
                                        V::key(ListGetModel::FILTER_FIELDS, V::allOf(V::arrayVal(), V::each(V::stringType())), self::NOT_MANDATORY),
                                        V::key(ListGetModel::FILTER_EQ, V::stringType(), self::NOT_MANDATORY),
                                        V::key(ListGetModel::FILTER_NE, V::stringType(), self::NOT_MANDATORY),
                                        V::key(ListGetModel::FILTER_MATCH, V::stringType(), self::NOT_MANDATORY),
                                        V::key(ListGetModel::FILTER_GTE, V::intType(), self::NOT_MANDATORY),
                                        V::key(ListGetModel::FILTER_LTE, V::intType(), self::NOT_MANDATORY)
                                    )
                                )
                            )
                        )
                    )
                )
            );
    }

    /**
     * @return array
     */
    public static function getRequiredRuleNamespaces()
    {
        return [];
    }
}
