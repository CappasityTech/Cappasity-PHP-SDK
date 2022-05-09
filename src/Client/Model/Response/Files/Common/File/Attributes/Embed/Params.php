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

namespace CappasitySDK\Client\Model\Response\Files\Common\File\Attributes\Embed;

class Params
{
    /**
     * @var Param
     */
    private $autoRun;

    /**
     * @var Param
     */
    private $closeButton;

    /**
     * @var Param
     */
    private $logo;

    /**
     * @var Param
     */
    private $autorotate;

    /**
     * @var Param
     */
    private $autorotateTime;

    /**
     * @var Param
     */
    private $autorotateDelay;

    /**
     * @var Param
     */
    private $autorotateDir;

    /**
     * @var Param
     */
    private $hideFullScreen;

    /**
     * @var Param
     */
    private $hideAutorotateOpt;

    /**
     * @var Param
     */
    private $hideSettingsBtn;

    /**
     * @var Param
     */
    private $enableImageZoom;

    /**
     * @var Param
     */
    private $zoomQuality;

    /**
     * @var Param
     */
    private $hideZoomOpt;

    /**
     * @var Param
     */
    private $width;

    /**
     * @var Param
     */
    private $height;

    /**
     * @var Param
     */
    private $analytics;

    /**
     * @var Param
     */
    private $uiPadX;

    /**
     * @var Param
     */
    private $uiPadY;

    /**
     * @var Param
     */
    private $enableStoreUrl;

    /**
     * @var Param
     */
    private $storeUrl;

    /**
     * @var Param
     */
    private $hideHints;

    /**
     * @var Param
     */
    private $startHint;

    /**
     * @var Param
     */
    private $arButton;

    /**
     * @return Param
     */
    public function getAutoRun()
    {
        return $this->autoRun;
    }

    /**
     * @param Param $autoRun
     * @return $this
     */
    public function setAutorun($autoRun)
    {
        $this->autoRun = $autoRun;

        return $this;
    }

    /**
     * @return Param
     */
    public function getCloseButton()
    {
        return $this->closeButton;
    }

    /**
     * @param Param $closeButton
     * @return $this
     */
    public function setCloseButton(Param $closeButton): Params
    {
        $this->closeButton = $closeButton;

        return $this;
    }

    /**
     * @return Param
     */
    public function getLogo(): Param
    {
        return $this->logo;
    }

    /**
     * @param Param $logo
     * @return $this
     */
    public function setLogo(Param $logo): Params
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Param
     */
    public function getAutorotate(): Param
    {
        return $this->autorotate;
    }

    /**
     * @param Param $autorotate
     * @return $this
     */
    public function setAutorotate(Param $autorotate): Params
    {
        $this->autorotate = $autorotate;

        return $this;
    }

    /**
     * @return Param
     */
    public function getAutorotateTime(): Param
    {
        return $this->autorotateTime;
    }

    /**
     * @param Param $autorotateTime
     * @return $this
     */
    public function setAutorotateTime(Param $autorotateTime): Params
    {
        $this->autorotateTime = $autorotateTime;

        return $this;
    }

    /**
     * @return Param
     */
    public function getAutorotateDelay(): Param
    {
        return $this->autorotateDelay;
    }

    /**
     * @param Param $autorotateDelay
     * @return $this
     */
    public function setAutorotateDelay(Param $autorotateDelay): Params
    {
        $this->autorotateDelay = $autorotateDelay;

        return $this;
    }

    /**
     * @return Param
     */
    public function getAutorotateDir(): Param
    {
        return $this->autorotateDir;
    }

    /**
     * @param Param $autorotateDir
     * @return $this
     */
    public function setAutorotateDir(Param $autorotateDir): Params
    {
        $this->autorotateDir = $autorotateDir;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHideFullScreen(): Param
    {
        return $this->hideFullScreen;
    }

    /**
     * @param Param $hideFullScreen
     * @return $this
     */
    public function setHideFullScreen(Param $hideFullScreen): Params
    {
        $this->hideFullScreen = $hideFullScreen;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHideAutorotateOpt(): Param
    {
        return $this->hideAutorotateOpt;
    }

    /**
     * @param Param $hideAutorotateOpt
     * @return $this
     */
    public function setHideAutorotateOpt(Param $hideAutorotateOpt): Params
    {
        $this->hideAutorotateOpt = $hideAutorotateOpt;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHideSettingsBtn(): Param
    {
        return $this->hideSettingsBtn;
    }

    /**
     * @param Param $hideSettingsBtn
     * @return $this
     */
    public function setHideSettingsBtn(Param $hideSettingsBtn): Params
    {
        $this->hideSettingsBtn = $hideSettingsBtn;

        return $this;
    }

    /**
     * @return Param
     */
    public function getEnableImageZoom(): Param
    {
        return $this->enableImageZoom;
    }

    /**
     * @param Param $enableImageZoom
     * @return $this
     */
    public function setEnableImageZoom(Param $enableImageZoom): Params
    {
        $this->enableImageZoom = $enableImageZoom;

        return $this;
    }

    /**
     * @return Param
     */
    public function getZoomQuality(): Param
    {
        return $this->zoomQuality;
    }

    /**
     * @param Param $zoomQuality
     * @return $this
     */
    public function setZoomQuality(Param $zoomQuality): Params
    {
        $this->zoomQuality = $zoomQuality;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHideZoomOpt(): Param
    {
        return $this->hideZoomOpt;
    }

    /**
     * @param Param $hideZoomOpt
     * @return $this
     */
    public function setHideZoomOpt(Param $hideZoomOpt): Params
    {
        $this->hideZoomOpt = $hideZoomOpt;

        return $this;
    }

    /**
     * @return Param
     */
    public function getWidth(): Param
    {
        return $this->width;
    }

    /**
     * @param Param $width
     * @return $this
     */
    public function setWidth(Param $width): Params
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHeight(): Param
    {
        return $this->height;
    }

    /**
     * @param Param $height
     * @return $this
     */
    public function setHeight(Param $height): Params
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return Param
     */
    public function getAnalytics(): Param
    {
        return $this->analytics;
    }

    /**
     * @param Param $analytics
     * @return $this
     */
    public function setAnalytics(Param $analytics): Params
    {
        $this->analytics = $analytics;

        return $this;
    }

    /**
     * @return Param
     */
    public function getUiPadX(): Param
    {
        return $this->uiPadX;
    }

    /**
     * @param Param $uiPadX
     * @return $this
     */
    public function setUiPadX(Param $uiPadX): Params
    {
        $this->uiPadX = $uiPadX;

        return $this;
    }

    /**
     * @return Param
     */
    public function getUiPadY(): Param
    {
        return $this->uiPadY;
    }

    /**
     * @param Param $uiPadY
     * @return $this
     */
    public function setUiPadY(Param $uiPadY): Params
    {
        $this->uiPadY = $uiPadY;

        return $this;
    }

    /**
     * @return Param
     */
    public function getEnableStoreUrl(): Param
    {
        return $this->enableStoreUrl;
    }

    /**
     * @param Param $enableStoreUrl
     * @return $this
     */
    public function setEnableStoreUrl(Param $enableStoreUrl): Params
    {
        $this->enableStoreUrl = $enableStoreUrl;

        return $this;
    }

    /**
     * @return Param
     */
    public function getStoreUrl(): Param
    {
        return $this->storeUrl;
    }

    /**
     * @param Param $storeUrl
     * @return $this
     */
    public function setStoreUrl(Param $storeUrl): Params
    {
        $this->storeUrl = $storeUrl;

        return $this;
    }

    /**
     * @return Param
     */
    public function getHideHints(): Param
    {
        return $this->hideHints;
    }

    /**
     * @param Param $hideHints
     * @return $this
     */
    public function setHideHints(Param $hideHints): Params
    {
        $this->hideHints = $hideHints;

        return $this;
    }

    /**
     * @return Param
     */
    public function getStartHint(): Param
    {
        return $this->startHint;
    }

    /**
     * @param Param $startHint
     * @return $this
     */
    public function setStartHint(Param $startHint): Params
    {
        $this->startHint = $startHint;

        return $this;
    }

    /**
     * @return Param
     */
    public function getArButton(): Param
    {
        return $this->arButton;
    }

    /**
     * @param Param $arButton
     * @return $this
     */
    public function setArButton(Param $arButton): Params
    {
        $this->arButton = $arButton;

        return $this;
    }
}
