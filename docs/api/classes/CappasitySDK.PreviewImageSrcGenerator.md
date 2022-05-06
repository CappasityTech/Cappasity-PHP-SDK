# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\PreviewImageSrcGenerator
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
---
### Constants
* [ BASE_URL_API_CAPPASITY](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_BASE_URL_API_CAPPASITY)
* [ PATH_API_FILES_PREVIEW](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_PATH_API_FILES_PREVIEW)
* [ OPTION_MODIFIERS](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIERS)
* [ OPTION_FORMAT](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_FORMAT)
* [ OPTION_OVERLAY](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_OVERLAY)
* [ OPTION_MODIFIER_HEIGHT](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_HEIGHT)
* [ OPTION_MODIFIER_WIDTH](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_WIDTH)
* [ OPTION_MODIFIER_SQUARE](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_SQUARE)
* [ OPTION_MODIFIER_TOP](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_TOP)
* [ OPTION_MODIFIER_LEFT](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_LEFT)
* [ OPTION_MODIFIER_GRAVITY](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_GRAVITY)
* [ OPTION_MODIFIER_CROP](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_CROP)
* [ OPTION_MODIFIER_QUALITY](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_QUALITY)
* [ OPTION_MODIFIER_BACKGROUND](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OPTION_MODIFIER_BACKGROUND)
* [ OVERLAY_3DP](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OVERLAY_3DP)
* [ OVERLAY_3DP_2X](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OVERLAY_3DP_2X)
* [ OVERLAY_3DP_3X](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_OVERLAY_3DP_3X)
* [ FORMAT_JPEG](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_FORMAT_JPEG)
* [ FORMAT_JPG](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_FORMAT_JPG)
* [ FORMAT_PNG](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_FORMAT_PNG)
* [ FORMAT_WEBP](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_FORMAT_WEBP)
* [ FORMAT_GIF](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_FORMAT_GIF)
* [ CROP_FIT](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_CROP_FIT)
* [ CROP_FILL](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_CROP_FILL)
* [ CROP_CUT](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_CROP_CUT)
* [ CROP_PAD](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_CROP_PAD)
* [ GRAVITY_CENTER](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_CENTER)
* [ GRAVITY_NORTH](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_NORTH)
* [ GRAVITY_SOUTH](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_SOUTH)
* [ GRAVITY_EAST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_EAST)
* [ GRAVITY_WEST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_WEST)
* [ GRAVITY_NORTH_EAST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_NORTH_EAST)
* [ GRAVITY_NORTH_WEST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_NORTH_WEST)
* [ GRAVITY_SOUTH_EAST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_SOUTH_EAST)
* [ GRAVITY_SOUTH_WEST](../classes/CappasitySDK.PreviewImageSrcGenerator.md#constant_GRAVITY_SOUTH_WEST)
---
### Properties
* [public $supportedOverlays](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_supportedOverlays)
* [public $supportedFormats](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_supportedFormats)
* [public $supportedCrops](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_supportedCrops)
* [public $supportedGravities](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_supportedGravities)
* [public $modifiers](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_modifiers)
* [public $queryOptionsToKeys](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_queryOptionsToKeys)
* [public $modifiersTitlesToKeys](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_modifiersTitlesToKeys)
* [private $validator](../classes/CappasitySDK.PreviewImageSrcGenerator.md#property_validator)
---
### Methods
* [public __construct()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method___construct)
* [public generatePreviewImageSrc()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_generatePreviewImageSrc)
* [private getBaseUrl()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_getBaseUrl)
* [private prepareModifiersString()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_prepareModifiersString)
* [private validateOptions()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_validateOptions)
* [private prepareOptions()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_prepareOptions)
* [private prepareBackgroundModifier()](../classes/CappasitySDK.PreviewImageSrcGenerator.md#method_prepareBackgroundModifier)
---
### Details
* File: [PreviewImageSrcGenerator.php](../files/PreviewImageSrcGenerator.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\PreviewImageSrcGenerator
---
## Constants
<a name="constant_BASE_URL_API_CAPPASITY" class="anchor"></a>
###### BASE_URL_API_CAPPASITY
```
BASE_URL_API_CAPPASITY = 'https://api.cappasity.com'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_PATH_API_FILES_PREVIEW" class="anchor"></a>
###### PATH_API_FILES_PREVIEW
```
PATH_API_FILES_PREVIEW = '/api/files/preview'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIERS" class="anchor"></a>
###### OPTION_MODIFIERS
```
OPTION_MODIFIERS = 'modifiers'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_FORMAT" class="anchor"></a>
###### OPTION_FORMAT
```
OPTION_FORMAT = 'format'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_OVERLAY" class="anchor"></a>
###### OPTION_OVERLAY
```
OPTION_OVERLAY = 'overlay'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_HEIGHT" class="anchor"></a>
###### OPTION_MODIFIER_HEIGHT
```
OPTION_MODIFIER_HEIGHT = 'height'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_WIDTH" class="anchor"></a>
###### OPTION_MODIFIER_WIDTH
```
OPTION_MODIFIER_WIDTH = 'width'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_SQUARE" class="anchor"></a>
###### OPTION_MODIFIER_SQUARE
```
OPTION_MODIFIER_SQUARE = 'square'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_TOP" class="anchor"></a>
###### OPTION_MODIFIER_TOP
```
OPTION_MODIFIER_TOP = 'top'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_LEFT" class="anchor"></a>
###### OPTION_MODIFIER_LEFT
```
OPTION_MODIFIER_LEFT = 'left'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_GRAVITY" class="anchor"></a>
###### OPTION_MODIFIER_GRAVITY
```
OPTION_MODIFIER_GRAVITY = 'gravity'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_CROP" class="anchor"></a>
###### OPTION_MODIFIER_CROP
```
OPTION_MODIFIER_CROP = 'crop'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_QUALITY" class="anchor"></a>
###### OPTION_MODIFIER_QUALITY
```
OPTION_MODIFIER_QUALITY = 'quality'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OPTION_MODIFIER_BACKGROUND" class="anchor"></a>
###### OPTION_MODIFIER_BACKGROUND
```
OPTION_MODIFIER_BACKGROUND = 'background'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OVERLAY_3DP" class="anchor"></a>
###### OVERLAY_3DP
```
OVERLAY_3DP = '3dp'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OVERLAY_3DP_2X" class="anchor"></a>
###### OVERLAY_3DP_2X
```
OVERLAY_3DP_2X = '3dp@2x'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_OVERLAY_3DP_3X" class="anchor"></a>
###### OVERLAY_3DP_3X
```
OVERLAY_3DP_3X = '3dp@3x'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_FORMAT_JPEG" class="anchor"></a>
###### FORMAT_JPEG
```
FORMAT_JPEG = 'jpeg'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_FORMAT_JPG" class="anchor"></a>
###### FORMAT_JPG
```
FORMAT_JPG = 'jpg'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_FORMAT_PNG" class="anchor"></a>
###### FORMAT_PNG
```
FORMAT_PNG = 'png'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_FORMAT_WEBP" class="anchor"></a>
###### FORMAT_WEBP
```
FORMAT_WEBP = 'webp'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_FORMAT_GIF" class="anchor"></a>
###### FORMAT_GIF
```
FORMAT_GIF = 'gif'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_CROP_FIT" class="anchor"></a>
###### CROP_FIT
```
CROP_FIT = 'fit'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_CROP_FILL" class="anchor"></a>
###### CROP_FILL
```
CROP_FILL = 'fill'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_CROP_CUT" class="anchor"></a>
###### CROP_CUT
```
CROP_CUT = 'cut'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_CROP_PAD" class="anchor"></a>
###### CROP_PAD
```
CROP_PAD = 'pad'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_CENTER" class="anchor"></a>
###### GRAVITY_CENTER
```
GRAVITY_CENTER = 'c'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_NORTH" class="anchor"></a>
###### GRAVITY_NORTH
```
GRAVITY_NORTH = 'n'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_SOUTH" class="anchor"></a>
###### GRAVITY_SOUTH
```
GRAVITY_SOUTH = 's'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_EAST" class="anchor"></a>
###### GRAVITY_EAST
```
GRAVITY_EAST = 'e'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_WEST" class="anchor"></a>
###### GRAVITY_WEST
```
GRAVITY_WEST = 'w'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_NORTH_EAST" class="anchor"></a>
###### GRAVITY_NORTH_EAST
```
GRAVITY_NORTH_EAST = 'ne'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_NORTH_WEST" class="anchor"></a>
###### GRAVITY_NORTH_WEST
```
GRAVITY_NORTH_WEST = 'nw'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_SOUTH_EAST" class="anchor"></a>
###### GRAVITY_SOUTH_EAST
```
GRAVITY_SOUTH_EAST = 'se'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_GRAVITY_SOUTH_WEST" class="anchor"></a>
###### GRAVITY_SOUTH_WEST
```
GRAVITY_SOUTH_WEST = 'sw'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

---
## Properties
<a name="property_supportedOverlays"></a>
#### public $supportedOverlays : 
---
**Type:** 

**Details:**


<a name="property_supportedFormats"></a>
#### public $supportedFormats : 
---
**Type:** 

**Details:**


<a name="property_supportedCrops"></a>
#### public $supportedCrops : 
---
**Type:** 

**Details:**


<a name="property_supportedGravities"></a>
#### public $supportedGravities : 
---
**Type:** 

**Details:**


<a name="property_modifiers"></a>
#### public $modifiers : 
---
**Type:** 

**Details:**


<a name="property_queryOptionsToKeys"></a>
#### public $queryOptionsToKeys : 
---
**Type:** 

**Details:**


<a name="property_modifiersTitlesToKeys"></a>
#### public $modifiersTitlesToKeys : 
---
**Type:** 

**Details:**


<a name="property_validator"></a>
#### private $validator : \CappasitySDK\ValidatorWrapper
---
**Type:** <a href="../classes/CappasitySDK.ValidatorWrapper.html">\CappasitySDK\ValidatorWrapper</a>

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() 

```
public __construct(\CappasitySDK\ValidatorWrapper  $validator) 
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.ValidatorWrapper.html">\CappasitySDK\ValidatorWrapper</a></code> | $validator  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_generatePreviewImageSrc" class="anchor"></a>
#### public generatePreviewImageSrc() : string

```
public generatePreviewImageSrc(  $userAlias,   $viewId, array  $options = array()) : string
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code></code> | $userAlias  |  |
| <code></code> | $viewId  |  |
| <code>array</code> | $options  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\PreviewImageSrcGenerator\Exception\ValidationException |  |

**Returns:** string


<a name="method_getBaseUrl" class="anchor"></a>
#### private getBaseUrl() : string

```
Static private getBaseUrl() : string
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** string


<a name="method_prepareModifiersString" class="anchor"></a>
#### private prepareModifiersString() : string

```
private prepareModifiersString(array  $modifiers) : string
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $modifiers  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** string


<a name="method_validateOptions" class="anchor"></a>
#### private validateOptions() 

```
private validateOptions(array  $options) 
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $options  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\PreviewImageSrcGenerator\Exception\ValidationException |  |




<a name="method_prepareOptions" class="anchor"></a>
#### private prepareOptions() : array

```
private prepareOptions(array  $options) : array
```

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $options  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** array


<a name="method_prepareBackgroundModifier" class="anchor"></a>
#### private prepareBackgroundModifier() : boolean&amp;#124;string

```
private prepareBackgroundModifier(string  $background) : boolean&amp;#124;string
```

**Summary**

Strips hash char

**Details:**
* Inherited From: [\CappasitySDK\PreviewImageSrcGenerator](../classes/CappasitySDK.PreviewImageSrcGenerator.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $background  | hash prefixed hex value |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** boolean&#124;string



---

### Top Namespaces

* [\CappasitySDK](../namespaces/CappasitySDK.html.md)

---

### Reports
* [Errors - 797](../reports/errors.md)
* [Markers - 0](../reports/markers.md)
* [Deprecated - 0](../reports/deprecated.md)

---

This document was automatically generated from source code comments on 2020-01-30 using [phpDocumentor](http://www.phpdoc.org/) and [fr3nch13/phpdoc-markdown](https://github.com/fr3nch13/phpdoc-markdown)
