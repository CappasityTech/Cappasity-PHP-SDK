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

        foreach (JobsRegisterSyncPostType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                '- id must be a string',
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
                '- "invalid-sku!!!" must match pattern /^[0-9A-Za-z_\-.]{1,50}$/'
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
                '- callbackUrl must be a URL'
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
                '- callbackUrl must be null'
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
                '- items must be valid' //:(
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
                '- items must be valid' //:(
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
                    '- At least one of these rules must pass for capp',
                    '  - capp must be null',
                    '    - capp must be a valid UUID and therefore match pattern /^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-4[0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/',
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

        foreach (JobsPullListGetType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                    '- At least one of these rules must pass for limit',
                    '  - limit must be null',
                    '  - limit must be less than or equal to 40'
                ]),
            ],
            [
                [-100, 100],
                false,
                join(PHP_EOL, [
                    '- At least one of these rules must pass for limit',
                    '  - limit must be null',
                    '  - limit must be greater than or equal to 1'
                ]),
            ],
            [
                [-100, -100],
                false,
                join(PHP_EOL, [
                    '- These rules must pass for JobsPullListGet',
                    '  - At least one of these rules must pass for limit',
                    '    - limit must be null',
                    '    - limit must be greater than or equal to 1',
                    '  - At least one of these rules must pass for cursor',
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

        foreach (JobsPullResultGetType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                '- jobId must be a string'
            ],
            [
                [
                    123,
                ],
                false,
                '- jobId must be a string'
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

        foreach (JobsPullAckPostType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                // TODO: upgrade respect/validation to make GTE message
                '- jobIds must have a length greater than 1'
            ],
            [
                [
                    [123],
                ],
                false,
                '- 123 must be a string'
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
        foreach (PreviewImageOptionsType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                    '    - crop must be in { "fit", "fill", "cut", "pad" }',
                    '  - format must be in { "jpeg", "jpg", "png", "webp", "gif" }',
                    '  - overlay must be in { "3dp", "3dp@2x", "3dp@3x" }',
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

        foreach (InfoGetType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                    '  - userAlias must be a string',
                    '  - viewId must be a string',
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

        foreach (ListGetType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

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
                    '- At least one of these rules must pass for filter',
                    '  - filter must be null',
                    '  - filter must be a string',
                    '    - At least one of these rules must pass for { "unknown-filter-modifier": "1" }',
                    '      - { "unknown-filter-modifier": "1" } must be a string',
                    '        - Must have keys { "fields", "eq", "ne", "match", "gte", "lte" }'
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

        foreach (RenderType::getRequiredRuleNamespaces() as $namespace) {
            v::with($namespace);
        }

        $validator = RenderType::configureValidator();

        $this->assertValidator($validator, $params, $shouldBeValid, $expectedError);
    }

    public function provideRenderData()
    {
        return [
            [
                [],
                false,
                '- Key viewId must be present'
            ],
            [
                ['viewId' => 'i am not uuid'],
                false,
                '- viewId must be a valid UUID and therefore match pattern /^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-4[0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/'
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
                    '  - viewId must be a valid UUID and therefore match pattern /^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-4[0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/',
                    '  - height must be defined in pixels or in % of the containing element. The percentage must be between 0 and 100. Examples of valid dimension size values: \'210\', \'80%\'',
                    '  - autoRun must be a boolean',
                    '  - closeButton must be a boolean',
                    '  - logo must be a boolean',
                    '  - analytics must be a boolean',
                    '  - autorotate must be a boolean',
                    '  - autorotateTime must be less than or equal to 60',
                    '  - autorotateDelay must be less than or equal to 10',
                    '  - autorotateDir must be in { 1, -1 }',
                    '  - hideFullScreen must be a boolean',
                    '  - hideAutorotateOpt must be a boolean',
                    '  - hideSettingsBtn must be a boolean',
                    '  - enableImageZoom must be a boolean',
                    '  - zoomQuality must be in { 1, 2 }',
                    '  - hideZoomOpt must be a boolean',
                    '  - uiPadX must be of the type integer',
                    '  - uiPadY must be of the type integer',
                    '  - enableStoreUrl must be a boolean',
                    '  - storeUrl must be a string',
                    '  - hideHints must be a boolean',
                    '  - startHint must be a boolean',
                    '  - arButton must be a boolean',
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
