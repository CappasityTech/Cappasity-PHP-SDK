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

namespace CappasitySDK\Client\ResponseModelAdapter;

use CappasitySDK\Client\Model\Response\Files\Common\File as FileModel;
use CappasitySDK\Client\ResponseModelAdapter\Exception\AdapterException;

class File
{
    public static function transformFile(array $item): FileModel
    {
        try {
            $attributesData = $item['attributes'];
            $linksData = $item['links'];

            $embedParamsData = $attributesData['embed']['params'];
            $normalizedKeys = array_map(
                function ($key) {
                    $keysToTransform = [
                        'c_ver' => 'cVer',
                        'autorun' => 'autoRun',
                        'closebutton' => 'closeButton',
                        'autorotate' => 'autorotate',
                        'autorotatetime' => 'autorotateTime',
                        'autorotatedelay' => 'autorotateDelay',
                        'autorotatedir' => 'autorotateDir',
                        'hidefullscreen' => 'hideFullScreen',
                        'hideautorotateopt' => 'hideAutorotateOpt',
                        'hidesettingsbtn' => 'hideSettingsBtn',
                        'enableimagezoom' => 'enableImageZoom',
                        'zoomquality' => 'zoomQuality',
                        'hidezoomopt' => 'hideZoomOpt',
                        'uipadx' => 'uiPadX',
                        'uipady' => 'uiPadY',
                    ];

                    return array_key_exists($key, $keysToTransform) ? $keysToTransform[$key] : $key;
                },
                array_keys($embedParamsData)
            );

            $normalizedEmbedParamsData = array_combine($normalizedKeys, $embedParamsData);

            $embedParams = new FileModel\Attributes\Embed\Params();
            foreach ($normalizedEmbedParamsData as $paramTitle => $paramData) {
                $value = (new FileModel\Attributes\Embed\Param())
                    ->setType($paramData['type'])
                    ->setDefault($paramData['default'])
                    ->setDescription($paramData['description'])
                    ->setEnum($paramData['enum'])
                    ->setMin($paramData['min'])
                    ->setMax($paramData['max'])
                    ->setPaid($paramData['paid'])
                    ->setReqPlanLevel($paramData['reqPlanLevel'])
                    ->setInvert($paramData['invert'])
                    ->setOwn($paramData['own']);

                $capitalizedParamTitle = ucfirst($paramTitle);
                $setter = "set{$capitalizedParamTitle}";
                $embedParams->{$setter}($value);
            }

            $embed = (new FileModel\Attributes\Embed())
                ->setCode($attributesData['embed']['code'])
                ->setParams($embedParams);

            $attributes = (new FileModel\Attributes())
                ->setType($attributesData['type'])
                ->setAlias($attributesData['alias'])
                ->setName($attributesData['name'])
                ->setBackgroundColor($attributesData['backgroundColor'])
                ->setBucket($attributesData['bucket'])
                ->setContentLength($attributesData['contentLength'])
                ->setCVer($attributesData['c_ver'])
                ->setOwner($attributesData['owner'])
                ->setPacked($attributesData['packed'])
                ->setParts($attributesData['parts'])
                ->setPublic($attributesData['public'])
                ->setStatus($attributesData['status'] ?? null)
                ->setSimple($attributesData['simple'] ?? null)
                ->setPreview($attributesData['preview'] ?? null)
                ->setStartedAt($attributesData['startedAt'] ?? null)
                ->setUploaded($attributesData['uploaded'] ?? null)
                ->setUploadId($attributesData['uploadId'] ?? null)
                ->setUploadedAt($attributesData['uploadedAt'] ?? null)
                ->setUploadType($attributesData['uploadType'] ?? null)
                ->setEmbed($embed)
            ;

            if (array_key_exists('files', $attributesData)) {
                $files = array_map(
                    function (array $file) {
                        return (new FileModel\Attributes\File())
                            ->setType($file['type'])
                            ->setFilename($file['filename'])
                            ->setContentLength($file['contentLength'])
                            ->setContentType($file['contentType'])
                            ->setBucket($file['bucket'])
                            ->setMd5Hash($file['md5Hash']);
                    },
                    $attributesData['files']
                );
                $attributes->setFiles($files);
            }

            $links = (new FileModel\Links())
                ->setSelf($linksData['self'])
                ->setOwner($linksData['owner'])
                ->setPlayer($linksData['player'])
                ->setUser($linksData['user']);

            return new FileModel(
                $item['id'],
                $item['type'],
                $attributes,
                $links
            );
        } catch (\Exception $e) {
            throw new AdapterException('Can not transform response. Please contact developers.', 0, $e);
        }
    }
}
