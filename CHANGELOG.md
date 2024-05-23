# [6.0.0](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v5.0.0...v6.0.0) (2024-05-23)


### Bug Fixes

* consider filtered fields in response model ([#5](https://github.com/CappasityTech/Cappasity-PHP-SDK/issues/5)) ([3e08a5d](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/3e08a5dcac0536b8132e012c0dad88a913e20d1d))


### BREAKING CHANGES

* `CappasitySDK\Client\Model\Response\Files\Common\File`,
`CappasitySDK\Client\Model\Response\Files\Common\File\Attributes` models now consider that fields could be filtered by `filter`
request parameter and therefore are
nullable. Default value for `cVer` (empty `string`) and `packed` (`false`) fields have changed and also became `null`.

# [5.0.0](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v4.1.0...v5.0.0) (2023-02-21)

# [4.1.0](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v4.0.0...v4.1.0) (2023-02-21)


### Features

* major upgrade ([#4](https://github.com/CappasityTech/Cappasity-PHP-SDK/issues/4)) ([a7711f9](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/a7711f9))

# [4.0.0](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v3.11.2...v4.0.0) (2022-05-30)


### major

* 4.0.0 release ([#1](https://github.com/CappasityTech/Cappasity-PHP-SDK/issues/1)) ([c646a2d](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/c646a2d))


### BREAKING CHANGES

* Active support of PHP versions prior to 7.4 has been dropped.
Deprecated EmbedRenderer::render($params) method params autoRotate, autoRotateTime, autoRotateDelay, autoRotateDir, hideAutoRotateOpt are no longer supported. Use autorotate, autorotateTime, autorotateDelay, autorotateDir and hideAutorotateOpt instead.

* fix: md5hash file attribute is optional

## [3.11.2](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v3.11.1...v3.11.2) (2022-05-29)


### Bug Fixes

* public file attribute is optional ([0f3150d](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/0f3150d))

## [3.11.1](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v3.11.0...v3.11.1) (2022-05-24)


### Bug Fixes

* md5hash file attribute is optional ([da8ad32](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/da8ad32))

# [3.11.0](https://github.com/CappasityTech/Cappasity-PHP-SDK/compare/v3.10.3...v3.11.0) (2022-05-09)


### Features

* rename default branch to main ([16c4393](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/16c4393))
* upgrade notice of license ([43c395c](https://github.com/CappasityTech/Cappasity-PHP-SDK/commit/43c395c))
