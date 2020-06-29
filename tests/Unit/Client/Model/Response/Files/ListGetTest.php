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

namespace CappasitySDK\Tests\Client\Model\Response\Files;

use CappasitySDK\Client;

class ListGetTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideResponseData
     *
     * @param $response
     */
    public function testFromResponse($response)
    {
        $responseModel = Client\Model\Response\Files\ListGet::fromResponse($response);

        $this->assertInstanceOf(Client\Model\Response\Files\ListGet::class, $responseModel);
        $file = $responseModel->getData()[0];
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File::class, $file);
        $attributes = $file->getAttributes();
        $this->assertInstanceOf(Client\Model\Response\Files\Common\File\Attributes::class, $attributes);
        $files = $attributes->getFiles();
        $this->assertCount(count($response['data'][0]['attributes']['files']), $files);
        if (array_key_exists('cursor', $response['meta'])) {
            $this->assertEquals($response['meta']['cursor'], $responseModel->getMeta()->getCursor());
        } else {
            $this->assertNull($responseModel->getMeta()->getCursor());
            $this->assertNull($responseModel->getLinks()->getNext());
        }
    }

    public function provideResponseData()
    {
        return [
            // with next page
            [
                [
                    'meta' => [
                        'id' => '698c86d4-e68e-4bc0-80b0-a58e57e59a5b',
                        'page' => 1,
                        'pages' => 2,
                        'cursor' => 1,
                        'timers' =>
                            [
                                'list:pre-parse' => 0.144045,
                                'list:validate' => 0.082124,
                                'list:ms-files' => 60.096107,
                                'list:qs' => 0.13568,
                                'list:serialized' => 0.19285,
                                'list:$' => '60.66',
                            ],
                    ],
                    'links' => [
                        'self' => 'https://api.cappasity3d.com/api/files?order=DESC&limit=1&filter=%257B%257D&pub=1&owner=cappasity',
                        'next' => 'https://api.cappasity3d.com/api/files?order=DESC&limit=1&filter=%257B%257D&pub=1&owner=cappasity&offset=1',
                    ],
                    'data' => [
                        [
                            'type' => 'file',
                            'id' => '698c86d4-e68e-4bc0-80b0-a58e57e59a5b',
                            'attributes' =>
                                [
                                    'public' => '1',
                                    'contentLength' => 28010036,
                                    'name' => 'danya_08',
                                    'files' => [
                                        [
                                            'contentLength' => 31347,
                                            'contentType' => 'image/jpeg',
                                            'md5Hash' => 'BdqzIQNCTuqnrJWncVJRLg==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-preview',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/7f0fdc79-9ef1-45fb-ac3f-6cabe6e0385c.jpeg',
                                        ],
                                        [
                                            'contentLength' => 42696,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'gmgAupRdc8kk5NllyHpWqA==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/a6681d99-e2cf-4042-9094-7a9416a7c2c4.pack',
                                        ],
                                        [
                                            'contentLength' => 6832050,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => '2SuRRCzCqmZI17/qhSVyHg==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/e65f1bd1-2676-4b4a-9209-c6bd158c57b1.pack',
                                        ],
                                        [
                                            'contentLength' => 10411179,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'c+YlOMWuKAF+PNgfzzpBew==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/84b0abc8-2545-4ee9-a734-4053cdea7438.pack',
                                        ],
                                        [
                                            'contentLength' => 10408574,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => '5kkFhtQKTnswGd9DrP3azA==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/1832375c-9427-4e7a-807e-acb3ecc95b05.pack',
                                        ],
                                        [
                                            'contentLength' => 284190,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'Btn5eFYLUZoTJo5X6dIpaw==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/f0e5d3a3-aeba-4744-ab79-26d56cca0f7f.pack',
                                        ],
                                    ],
                                    'parts' => 6,
                                    'tags' =>
                                        [
                                            0 => 'Clothing',
                                            1 => 'Undergarment',
                                            2 => 'Briefs',
                                            3 => 'Photo shoot',
                                            4 => 'Fashion model',
                                            5 => 'Lingerie top',
                                            6 => 'Swimwear',
                                        ],
                                    'type' => 'object',
                                    'uploadedAt' => 1551090243029,
                                    'embed' => [
                                        'code' => '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="{{ width }}" height="{{ height }}" frameborder="0" style="border:0;" src="https://api.cappasity.com/api/player/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/embedded?autorun={{ autorun }}&closebutton={{ closebutton }}&logo={{ logo }}&analytics={{ analytics }}&uipadx={{ uipadx }}&uipady={{ uipady }}&autorotate={{ autorotate }}&autorotatetime={{ autorotatetime }}&autorotatedelay={{ autorotatedelay }}&autorotatedir={{ autorotatedir }}&hidefullscreen={{ hidefullscreen }}&hideautorotateopt={{ hideautorotateopt }}&hidesettingsbtn={{ hidesettingsbtn }}&enableimagezoom={{ enableimagezoom }}&zoomquality={{ zoomquality }}&hidezoomopt={{ hidezoomopt }}&arbutton={{ arbutton }}"></iframe>',
                                        'params' => [
                                            'autorun' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Auto-start player',
                                            ],
                                            'closebutton' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Close button',
                                            ],
                                            'logo' => [
                                                'type' => 'boolean',
                                                'own' => 0,
                                                'default' => 1,
                                                'description' => 'Show logo',
                                                'paid' => true,
                                                'reqPlanLevel' => 20,
                                            ],
                                            'analytics' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Enable analytics',
                                            ],
                                            'uipadx' => [
                                                'type' => 'integer',
                                                'default' => 0,
                                                'description' => 'Horizontal (left, right) UI padding in pixels',
                                            ],
                                            'uipady' => [
                                                'type' => 'integer',
                                                'default' => 0,
                                                'description' => 'Vertical (top, bottom) UI padding in pixels',
                                            ],
                                            'autorotate' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Autorotate',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatetime' => [
                                                'type' => 'float',
                                                'default' => 10,
                                                'description' => 'Autorotate time, seconds',
                                                'min' => 2,
                                                'max' => 60,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatedelay' => [
                                                'type' => 'float',
                                                'default' => 2,
                                                'description' => 'Autorotate delay, seconds',
                                                'min' => 1,
                                                'max' => 10,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatedir' => [
                                                'type' => 'integer',
                                                'default' => 1,
                                                'description' => 'Autorotate direction',
                                                'enum' =>
                                                    [
                                                        'clockwise' => 1,
                                                        'counter-clockwise' => -1,
                                                    ],
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidefullscreen' => [
                                                'type' => 'boolean',
                                                'description' => 'Hide fullscreen',
                                                'default' => 1,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hideautorotateopt' => [
                                                'type' => 'boolean',
                                                'own' => 0,
                                                'default' => 1,
                                                'invert' => true,
                                                'description' => 'Autorotate button',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidesettingsbtn' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Settings button',
                                                'invert' => true,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'enableimagezoom' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Enable zoom',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'zoomquality' => [
                                                'type' => 'integer',
                                                'default' => 1,
                                                'enum' => [
                                                    'SD' => 1,
                                                    'HD' => 2,
                                                ],
                                                'description' => 'Zoom quality',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidezoomopt' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Zoom button',
                                                'paid' => true,
                                                'invert' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'arbutton' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'AR button',
                                                'paid' => false,
                                            ],
                                            'width' => [
                                                'type' => 'string',
                                                'default' => '100%',
                                                'description' => 'Width of embedded window (px or %)',
                                            ],
                                            'height' => [
                                                'type' => 'string',
                                                'default' => '600px',
                                                'description' => 'Height of embedded window (px or %)',
                                            ],
                                        ],
                                    ],
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'uploadType' => 'simple',
                                    'backgroundColor' => '#FFFFFF',
                                    'packed' => '1',
                                    'c_ver' => '4.1.0',
                                    'owner' => 'cappasity',
                                ],
                            'links' => [
                                'self' => 'https://api.cappasity.com/api/files/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                                'owner' => 'https://api.cappasity.com/api/users/cappasity',
                                'player' => 'https://3d.cappasity.com/u/cappasity/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                                'user' => 'https://3d.cappasity.com/u/cappasity',
                            ],
                        ],
                    ],
                ]
            ],
            // without next page
            [
                [
                    'meta' => [
                        'id' => '698c86d4-e68e-4bc0-80b0-a58e57e59a5b',
                        'page' => 1,
                        'pages' => 1,
                        'timers' =>
                            [
                                'list:pre-parse' => 0.144045,
                                'list:validate' => 0.082124,
                                'list:ms-files' => 60.096107,
                                'list:qs' => 0.13568,
                                'list:serialized' => 0.19285,
                                'list:$' => '60.66',
                            ],
                    ],
                    'links' => [
                        'self' => 'https://api.cappasity3d.com/api/files?order=DESC&limit=1&filter=%257B%257D&pub=1&owner=cappasity',
                    ],
                    'data' => [
                        [
                            'type' => 'file',
                            'id' => '698c86d4-e68e-4bc0-80b0-a58e57e59a5b',
                            'attributes' =>
                                [
                                    'public' => '1',
                                    'contentLength' => 28010036,
                                    'name' => 'danya_08',
                                    'files' => [
                                        [
                                            'contentLength' => 31347,
                                            'contentType' => 'image/jpeg',
                                            'md5Hash' => 'BdqzIQNCTuqnrJWncVJRLg==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-preview',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/7f0fdc79-9ef1-45fb-ac3f-6cabe6e0385c.jpeg',
                                        ],
                                        [
                                            'contentLength' => 42696,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'gmgAupRdc8kk5NllyHpWqA==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/a6681d99-e2cf-4042-9094-7a9416a7c2c4.pack',
                                        ],
                                        [
                                            'contentLength' => 6832050,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => '2SuRRCzCqmZI17/qhSVyHg==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/e65f1bd1-2676-4b4a-9209-c6bd158c57b1.pack',
                                        ],
                                        [
                                            'contentLength' => 10411179,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'c+YlOMWuKAF+PNgfzzpBew==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/84b0abc8-2545-4ee9-a734-4053cdea7438.pack',
                                        ],
                                        [
                                            'contentLength' => 10408574,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => '5kkFhtQKTnswGd9DrP3azA==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/1832375c-9427-4e7a-807e-acb3ecc95b05.pack',
                                        ],
                                        [
                                            'contentLength' => 284190,
                                            'contentType' => 'image/vnd.cappasity',
                                            'md5Hash' => 'Btn5eFYLUZoTJo5X6dIpaw==',
                                            'bucket' => 'cdn.cappasity3d.com',
                                            'type' => 'c-pack',
                                            'filename' => 'c8b9c4579fc2c11a795785393c9aaf65/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/f0e5d3a3-aeba-4744-ab79-26d56cca0f7f.pack',
                                        ],
                                    ],
                                    'parts' => 6,
                                    'tags' =>
                                        [
                                            0 => 'Clothing',
                                            1 => 'Undergarment',
                                            2 => 'Briefs',
                                            3 => 'Photo shoot',
                                            4 => 'Fashion model',
                                            5 => 'Lingerie top',
                                            6 => 'Swimwear',
                                        ],
                                    'type' => 'object',
                                    'uploadedAt' => 1551090243029,
                                    'embed' => [
                                        'code' => '<iframe allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="{{ width }}" height="{{ height }}" frameborder="0" style="border:0;" src="https://api.cappasity.com/api/player/ffd3edb7-cfbc-4880-8287-a6dc7ca84579/embedded?autorun={{ autorun }}&closebutton={{ closebutton }}&logo={{ logo }}&analytics={{ analytics }}&uipadx={{ uipadx }}&uipady={{ uipady }}&autorotate={{ autorotate }}&autorotatetime={{ autorotatetime }}&autorotatedelay={{ autorotatedelay }}&autorotatedir={{ autorotatedir }}&hidefullscreen={{ hidefullscreen }}&hideautorotateopt={{ hideautorotateopt }}&hidesettingsbtn={{ hidesettingsbtn }}&enableimagezoom={{ enableimagezoom }}&zoomquality={{ zoomquality }}&hidezoomopt={{ hidezoomopt }}"></iframe>',
                                        'params' => [
                                            'autorun' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Auto-start player',
                                            ],
                                            'closebutton' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Close button',
                                            ],
                                            'logo' => [
                                                'type' => 'boolean',
                                                'own' => 0,
                                                'default' => 1,
                                                'description' => 'Show logo',
                                                'paid' => true,
                                                'reqPlanLevel' => 20,
                                            ],
                                            'analytics' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Enable analytics',
                                            ],
                                            'uipadx' => [
                                                'type' => 'integer',
                                                'default' => 0,
                                                'description' => 'Horizontal (left, right) UI padding in pixels',
                                            ],
                                            'uipady' => [
                                                'type' => 'integer',
                                                'default' => 0,
                                                'description' => 'Vertical (top, bottom) UI padding in pixels',
                                            ],
                                            'autorotate' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Autorotate',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatetime' => [
                                                'type' => 'float',
                                                'default' => 10,
                                                'description' => 'Autorotate time, seconds',
                                                'min' => 2,
                                                'max' => 60,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatedelay' => [
                                                'type' => 'float',
                                                'default' => 2,
                                                'description' => 'Autorotate delay, seconds',
                                                'min' => 1,
                                                'max' => 10,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'autorotatedir' => [
                                                'type' => 'integer',
                                                'default' => 1,
                                                'description' => 'Autorotate direction',
                                                'enum' =>
                                                    [
                                                        'clockwise' => 1,
                                                        'counter-clockwise' => -1,
                                                    ],
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidefullscreen' => [
                                                'type' => 'boolean',
                                                'description' => 'Hide fullscreen',
                                                'default' => 1,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hideautorotateopt' => [
                                                'type' => 'boolean',
                                                'own' => 0,
                                                'default' => 1,
                                                'invert' => true,
                                                'description' => 'Autorotate button',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidesettingsbtn' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Settings button',
                                                'invert' => true,
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'enableimagezoom' => [
                                                'type' => 'boolean',
                                                'default' => 1,
                                                'description' => 'Enable zoom',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'zoomquality' => [
                                                'type' => 'integer',
                                                'default' => 1,
                                                'enum' => [
                                                    'SD' => 1,
                                                    'HD' => 2,
                                                ],
                                                'description' => 'Zoom quality',
                                                'paid' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'hidezoomopt' => [
                                                'type' => 'boolean',
                                                'default' => 0,
                                                'description' => 'Zoom button',
                                                'paid' => true,
                                                'invert' => true,
                                                'reqPlanLevel' => 30,
                                            ],
                                            'width' => [
                                                'type' => 'string',
                                                'default' => '100%',
                                                'description' => 'Width of embedded window (px or %)',
                                            ],
                                            'height' => [
                                                'type' => 'string',
                                                'default' => '600px',
                                                'description' => 'Height of embedded window (px or %)',
                                            ],
                                        ],
                                    ],
                                    'bucket' => 'cdn.cappasity3d.com',
                                    'uploadType' => 'simple',
                                    'backgroundColor' => '#FFFFFF',
                                    'packed' => '1',
                                    'c_ver' => '4.1.0',
                                    'owner' => 'cappasity',
                                ],
                            'links' => [
                                'self' => 'https://api.cappasity.com/api/files/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                                'owner' => 'https://api.cappasity.com/api/users/cappasity',
                                'player' => 'https://3d.cappasity.com/u/cappasity/ffd3edb7-cfbc-4880-8287-a6dc7ca84579',
                                'user' => 'https://3d.cappasity.com/u/cappasity',
                            ],
                        ],
                    ],
                ]
            ]
        ];
    }
}
