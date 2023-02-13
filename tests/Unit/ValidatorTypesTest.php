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

namespace CappasitySDK\Tests\Unit;

use Respect\Validation\Validator as v;
use Respect\Validation\Factory;
use Respect\Validation\Exceptions\NestedValidationException;

use CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost as JobsRegisterSyncPostModel;
use CappasitySDK\Client\Model\Request\Process\JobsPullListGet as JobsPullListGetModel;
use CappasitySDK\Client\Model\Request\Process\JobsPullResultGet as JobsPullResultGetModel;
use CappasitySDK\Client\Model\Request\Process\JobsPullAckPost as JobsPullAckPostModel;
use CappasitySDK\Client\Model\Request\Files\InfoGet as InfoGetModel;
use CappasitySDK\Client\Model\Request\Files\ListGet as ListGetModel;
use CappasitySDK\Client\Validator\Type\Request\Process\JobsRegisterSyncPost as JobsRegisterSyncPostType;
use CappasitySDK\Client\Validator\Type\Request\Process\JobsPullListGet as JobsPullListGetType;
use CappasitySDK\Client\Validator\Type\Request\Process\JobsPullResultGet as JobsPullResultGetType;
use CappasitySDK\Client\Validator\Type\Request\Process\JobsPullAckPost as JobsPullAckPostType;
use CappasitySDK\Client\Validator\Type\Request\Files\InfoGet as InfoGetType;
use CappasitySDK\Client\Validator\Type\Request\Files\ListGet as ListGetType;
use CappasitySDK\PreviewImageSrcGenerator\Validator\Type\PreviewImageOptions as PreviewImageOptionsType;
use CappasitySDK\EmbedRenderer\Validator\Type\Render as RenderType;

class ValidatorTypesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideJobsRegisterSyncPostData
     * @param array $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateRegisterSyncJobPost(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = JobsRegisterSyncPostModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (JobsRegisterSyncPostType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = JobsRegisterSyncPostType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideJobsRegisterSyncPostData()
    {
        return [
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                true
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                        ],
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                true
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'pull'
                ],
                true
            ],
            [
                [
                    [
                        [
                            'id' => 123,
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsRegisterSyncPost',
                    '  - All of the required rules must pass for SyncItem',
                    '    - id must be of type string'
                ])
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['invalid-sku!!!'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsRegisterSyncPost',
                    '  - All of the required rules must pass for SyncItem',
                    '    - "invalid-sku!!!" must match pattern /^[0-9A-Za-z_\-.]{1,50}$/'
                ])
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'push.http',
                ],
                false,
                // TODO don't like this error message because it does not tell when it must me a URL
                join(PHP_EOL, [
                    '- All of the required rules must pass for when syncType is push',
                    '  - callbackUrl must be a URL'
                ])
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ],
                    ],
                    'pull',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                // TODO don't like this error message because it does not tell when it must be null
                join(PHP_EOL, [
                    '- All of the required rules must pass for When syncType is pull callbackUrl',
                    '  - callbackUrl must be null'
                ])
            ],
            [
                [
                    array_fill(
                        0,
                        501,
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ]
                    ),
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsRegisterSyncPost',
                    '  - items must be valid'
                ])
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => array_fill(
                                0,
                                501,
                                'Bear'
                            ),
                            'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
                        ]
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsRegisterSyncPost',
                    '  - items must be valid'
                ])
            ],
            [
                [
                    [
                        [
                            'id' => 'inner-product-id',
                            'aliases' => ['Bear'],
                            'capp' => 'invalid capp format',
                        ],
                    ],
                    'push.http',
                    'http://somewhere.com/over/the/rainbow',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsRegisterSyncPost',
                    '  - All of the required rules must pass for SyncItem',
                    '    - Only one of these rules must pass for capp',
                    '      - capp must be null',
                    '        - capp must be a valid UUID',
                ]),
            ],
        ];
    }

    /**
     * @dataProvider provideGetPullJobListData
     * @param array $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateGetPullJobList(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = JobsPullListGetModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (JobsPullListGetType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = JobsPullListGetType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideGetPullJobListData()
    {
        return [
            [
                [null, null],
                true,
            ],
            [
                [40, 100],
                true,
            ],
            [
                [50, null],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullListGet',
                    '  - Only one of these rules must pass for limit',
                    '    - limit must be null',
                    '    - limit must be less than or equal to 40'
                ]),
            ],
            [
                [-100, 100],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullListGet',
                    '  - Only one of these rules must pass for limit',
                    '    - limit must be null',
                    '    - limit must be greater than or equal to 1'
                ]),
            ],
            [
                [-100, -100],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullListGet',
                    '  - Only one of these rules must pass for limit',
                    '    - limit must be null',
                    '    - limit must be greater than or equal to 1',
                    '  - Only one of these rules must pass for cursor',
                    '    - cursor must be null',
                    '    - cursor must be greater than or equal to 0',
                ]),
            ]
        ];
    }

    /**
     * @dataProvider provideJobsPullResultGetData
     * @param array $fromDataArgs
     * @param bool $shouldBeValid
     * @param null $expectedError
     */
    public function testValidateJobsPullResultGet(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = JobsPullResultGetModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (JobsPullResultGetType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = JobsPullResultGetType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideJobsPullResultGetData()
    {
        return [
            [
                [
                    'a9673347-8f2e-4caa-83e9-4139d7473c2f:A1',
                ],
                true,
            ],
            [
                [
                    null,
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullResultGet',
                    '  - jobId must be of type string'
                ])
            ],
            [
                [
                    123,
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullResultGet',
                    '  - jobId must be of type string'
                ])
            ]
        ];
    }

    /**
     * @dataProvider providePullAckPostData
     * @param [] $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateJobsPullAckPost(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = JobsPullAckPostModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (JobsPullAckPostType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = JobsPullAckPostType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function providePullAckPostData()
    {
        return [
            [
                [
                    ['a9673347-8f2e-4caa-83e9-4139d7473c2f:A1'],
                ],
                true,
            ],
            [
                [
                    ['a9673347-8f2e-4caa-83e9-4139d7473c2f:A1', 'a9673347-8f2e-4caa-83e9-4139d7473c2f:B2'],
                ],
                true,
            ],
            [
                [
                    []
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullAckPost',
                    '  - jobIds must have a length greater than or equal to 1'
                ])
            ],
            [
                [
                    [123],
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullAckPost',
                    '  - 123 must be of type string'
                ])
            ],
        ];
    }

    /**
     * @dataProvider providePreviewLinkGenerationPreviewImageOptionsData
     * @param array $options
     * @param boolean $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidatePreviewLinkGenerationPreviewImageOptions(array $options, $shouldBeValid, $expectedError = null)
    {
        $factory = new Factory();
        foreach (PreviewImageOptionsType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = PreviewImageOptionsType::configureValidator();

        $this->assertValidator($validator, $options, $shouldBeValid, $expectedError);
    }

    public function providePreviewLinkGenerationPreviewImageOptionsData()
    {
        return [
            [
                [],
                true,
            ],
            [
                [
                    'modifiers' => [
                        'background' => '#aaaaaa',
                        'crop' => 'cut',
                    ],
                    'format' => 'png',
                    'overlay' => '3dp',
                ],
                true,
            ],
            [
                [
                    'modifiers' => [
                        'background' => 'aaaaaa',
                        'crop' => 'unknown-crop',
                    ],
                    'format' => 'unknown-format',
                    'overlay' => 'unknown-overlay',
                ],
                false,
                join(PHP_EOL, [
                    '- All of the required rules must pass for PreviewImageOptions',
                    '  - These rules must pass for modifiers',
                    '    - background must match pattern /^#[0-9a-f]{6}$/',
                    '    - crop must be in `{ "fit", "fill", "cut", "pad" }`',
                    '  - format must be in `{ "jpeg", "jpg", "png", "webp", "gif" }`',
                    '  - overlay must be in `{ "3dp", "3dp@2x", "3dp@3x" }`',
                ]),
            ]
        ];
    }

    /**
     * @dataProvider provideFileInfoGetData
     * @param array $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateFileInfoGetData(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = InfoGetModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (InfoGetType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = InfoGetType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideFileInfoGetData(): array
    {
        return [
            [
                [
                    'alice',
                    'dd596de4-ae2b-4d66-a023-242ca7d86b51',
                ],
                true,
            ],
            [
                [
                    1,
                    2,
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for InfoGet',
                    '  - userAlias must be of type string',
                    '  - viewId must be of type string',
                ]),
            ],
        ];
    }

    /**
     * @dataProvider provideFileListGetData
     * @param [] $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateFileListGetData(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = ListGetModel::fromData(...$fromDataArgs);

        $factory = new Factory();
        foreach (ListGetType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);


        $validator = ListGetType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideFileListGetData()
    {
        return [
            [
                // limit, offset
                [
                    20,
                    10
                ],
                true,
            ],
            [
                // sorting criteria and order
                [
                    null,
                    null,
                    'name',
                    'ASC',
                ],
                true,
            ],
            [
                // filtering
                [
                    null,
                    null,
                    null,
                    null,
                    [
                        '#multi' => [
                            'fields' => ['name', 'alias'],
                            'match' => 'filter-me',
                        ],
                        'alias' => ['match' => 'filter-me'],
                        'status' => ['eq' => 'processed'],
                        'public' => ['ne' => '1'],
                        'uploadedAt' => ['gte' => 1551090243020, 'lte' => 1551090243029],
                        'startedAt' => ['gte' => 1551090243020],
                    ]
                ],
                true,
            ],
            [
                // filtering
                [
                    null,
                    null,
                    null,
                    null,
                    [
                        'alias' => ['match' => 'filter-me'],
                        'status' => ['eq' => 'processed'],
                        'public' => ['ne' => '1'],
                        'uploadedAt' => ['lte' => 1551090243029],
                        'startedAt' => ['gte' => 1551090243020],
                    ]
                ],
                true,
            ],
            [
                // filtering
                [
                    null,
                    null,
                    null,
                    null,
                    [
                        'alias' => 'desired-alias',
                    ]
                ],
                true,
            ],
            [
                // filtering
                [
                    null,
                    null,
                    null,
                    null,
                    [
                        '#multi' => [
                            'fields' => ['name', 'alias'],
                            'match' => 'filter-me',
                        ],
                    ]
                ],
                true,
            ],
            [
                // invalid filtering
                [
                    null,
                    null,
                    null,
                    null,
                    [
                        'some_field' => [
                            'unknown-filter-modifier' => '1',
                        ],
                    ]
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for ListGet',
                    '  - Only one of these rules must pass for filter',
                    '    - filter must be null',
                    '    - filter must be of type string',
                    '      - Only one of these rules must pass for `{ "unknown-filter-modifier": "1" }`',
                    '        - `{ "unknown-filter-modifier": "1" }` must be of type string',
                    '          - All of the required rules must pass for `{ "unknown-filter-modifier": "1" }`',
                    '            - Must have keys `{ "fields", "eq", "ne", "match", "gte", ... }`',
                ]),
            ],
        ];
    }

    /**
     * @dataProvider provideRenderData
     * @param [] $fromDataArgs
     * @param bool $shouldBeValid
     * @param null|string $expectedError
     */
    public function testValidateRender(array $fromDataArgs, $shouldBeValid, $expectedError = null)
    {
        $params = $fromDataArgs;

        $factory = new Factory();
        foreach (RenderType::getRequiredRuleNamespaces() as $namespace) {
            $factory = $factory->withRuleNamespace($namespace);
        }
        Factory::setDefaultInstance($factory);

        $validator = RenderType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideRenderData()
    {
        return [
            [
                [],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for Render',
                    '  - viewId must be present',
                ])
            ],
            [
                ['viewId' => 'i am not uuid'],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for Render',
                    '  - viewId must be a valid UUID',
                ])
            ],
            [
                [
                    'viewId' => '38020fdf-5e11-411c-9116-1610339d59cf!',
                    'width' => '100%%',
                    'height' => '-600',
                    'autoRun' => 1,
                    'closeButton' => 0,
                    'logo' => 1,
                    'autorotate' => 0,
                    'autorotateTime' => 70,
                    'autorotateDelay' => 11,
                    'autorotateDir' => 2,
                    'hideFullScreen' => 1,
                    'hideAutorotateOpt' => 1,
                    'hideSettingsBtn' => 0,
                    'enableImageZoom' => 1,
                    'zoomQuality' => 3,
                    'hideZoomOpt' => 0,
                    'analytics' => 1,
                    'uiPadX' => '10',
                    'uiPadY' => '20',
                    'enableStoreUrl' => '1',
                    'storeUrl' => false,
                    'hideHints' => '1',
                    'startHint' => '1',
                    'arButton' => 'yes',
                ],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for Render',
                    '  - viewId must be a valid UUID',
                    '  - height must be defined in pixels or in % of the containing element. The percentage must be between 0 and 100. Examples of valid dimension size values: \'210\', \'80%\'',
                    '  - autoRun must be of type boolean',
                    '  - closeButton must be of type boolean',
                    '  - logo must be of type boolean',
                    '  - analytics must be of type boolean',
                    '  - autorotate must be of type boolean',
                    '  - autorotateTime must be less than or equal to 60',
                    '  - autorotateDelay must be less than or equal to 10',
                    '  - autorotateDir must be in `{ 1, -1 }`',
                    '  - hideFullScreen must be of type boolean',
                    '  - hideAutorotateOpt must be of type boolean',
                    '  - hideSettingsBtn must be of type boolean',
                    '  - enableImageZoom must be of type boolean',
                    '  - zoomQuality must be in `{ 1, 2 }`',
                    '  - hideZoomOpt must be of type boolean',
                    '  - uiPadX must be of type integer',
                    '  - uiPadY must be of type integer',
                    '  - enableStoreUrl must be of type boolean',
                    '  - storeUrl must be of type string',
                    '  - hideHints must be of type boolean',
                    '  - startHint must be of type boolean',
                    '  - arButton must be of type boolean',
                ]),
            ],
            [
                ['viewId' => 'a9673347-8f2e-4caa-83e9-4139d7473c2f'],
                true,
            ],
            [
                [
                    'viewId' => '38020fdf-5e11-411c-9116-1610339d59cf',
                    'width' => '100%',
                    'height' => '600',
                    'autoRun' => true,
                    'closeButton' => false,
                    'logo' => true,
                    'autorotate' => false,
                    'autorotateTime' => 10,
                    'autorotateDelay' => 2,
                    'autorotateDir' => 1,
                    'hideFullScreen' => true,
                    'hideAutorotateOpt' => true,
                    'hideSettingsBtn' => false,
                    'enableImageZoom' => true,
                    'zoomQuality' => 2,
                    'hideZoomOpt' => false,
                    'analytics' => true,
                    'uiPadX' => 10,
                    'uiPadY' => 20,
                    'enableStoreUrl' => true,
                    'storeUrl' => 'http://google.com',
                    'hideHints' => true,
                    'startHint' => true,
                    'arButton' => false,
                ],
                true
            ],
        ];
    }

    private function assertValidator(\Respect\Validation\Validator $validator, $params, $shouldBeValid, $expectedError)
    {
        try {
            $validator->assert($params);

            $this->assertTrue($shouldBeValid, 'Value should be considered invalid');
        } catch (NestedValidationException $e) {
            $actualError = $e->getFullMessage();

            if ($shouldBeValid) {
                $this->fail("Value should be considered valid, but assertion failed: {$actualError}");
            }

            $this->assertEquals($expectedError, $actualError);
        }
    }
}
