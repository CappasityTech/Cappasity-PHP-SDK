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
    private static $embedParamsSafeList = [
        'autoRun',
        'closeButton',
        'logo',
        'autorotate',
        'autorotateTime',
        'autorotateDelay',
        'autorotateDir',
        'hideFullScreen',
        'hideAutorotateOpt',
        'hideSettingsBtn',
        'enableImageZoom',
        'zoomQuality',
        'hideZoomOpt',
        'width',
        'height',
        'analytics',
        'uiPadX',
        'uiPadY',
        'enableStoreUrl',
        'storeUrl',
        'hideHints',
        'startHint',
        'arButton',
    ];

    private static $embedParamsToTransform = [
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
        'enablestoreurl' => 'enableStoreUrl',
        'storeurl' => 'storeUrl',
        'hidehints' => 'hideHints',
        'starthint' => 'startHint',
        'arbutton' => 'arButton',
    ];

    public static function transformFile(array $item): FileModel
    {
        try {
            $attributesData = $item['attributes'];
            $linksData = $item['links'];

            $embedParamsData = $attributesData['embed']['params'];
            $embedParams = self::transformEmbedParams($embedParamsData);

            $embed = (new FileModel\Attributes\Embed())
                ->setCode($attributesData['embed']['code'])
                ->setParams($embedParams);

            $attributes = (new FileModel\Attributes())
                ->setType($attributesData['type'])
                ->setName($attributesData['name'])
                ->setBackgroundColor($attributesData['backgroundColor'])
                ->setBucket($attributesData['bucket'])
                ->setContentLength($attributesData['contentLength'])
                ->setCVer($attributesData['c_ver'])
                ->setOwner($attributesData['owner'])
                ->setPacked($attributesData['packed'])
                ->setParts($attributesData['parts'])
                ->setPublic($attributesData['public'])
                ->setAlias($attributesData['alias'] ?? null)
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

    private static function transformEmbedParams(array $embedParamsData)
    {
        $embedParamsToTransform = self::$embedParamsToTransform;
        $normalizedKeys = array_map(
            function ($key) use ($embedParamsToTransform) {
                return array_key_exists($key, $embedParamsToTransform) ? $embedParamsToTransform[$key] : $key;
            },
            array_keys($embedParamsData)
        );

        $normalizedEmbedParamsData = array_combine($normalizedKeys, $embedParamsData);
        $flippedSafeList = array_flip(self::$embedParamsSafeList);
        $safeEmbedParamsData = array_filter(
            $normalizedEmbedParamsData,
            function ($paramName) use ($flippedSafeList) {
                return array_key_exists($paramName, $flippedSafeList);
            },
            ARRAY_FILTER_USE_KEY
        );

        $embedParams = new FileModel\Attributes\Embed\Params();
        foreach ($safeEmbedParamsData as $paramTitle => $paramData) {
            $value = (new FileModel\Attributes\Embed\Param())
                ->setType($paramData['type'])
                ->setDefault($paramData['default'])
                ->setDescription($paramData['description'] ?? null)
                ->setEnum($paramData['enum'] ?? null)
                ->setMin($paramData['min'] ?? null)
                ->setMax($paramData['max'] ?? null)
                ->setPaid($paramData['paid'] ?? null)
                ->setReqPlanLevel($paramData['reqPlanLevel'] ?? null)
                ->setInvert($paramData['invert'] ?? null)
                ->setOwn($paramData['own'] ?? null);

            $capitalizedParamTitle = ucfirst($paramTitle);
            $setter = "set{$capitalizedParamTitle}";
            $embedParams->{$setter}($value);
        }

        return $embedParams;
    }
}
