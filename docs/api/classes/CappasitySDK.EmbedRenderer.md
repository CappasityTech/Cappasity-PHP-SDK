# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\EmbedRenderer
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
---
### Constants
* No constants found
---
### Properties
* [private $twig](../classes/CappasitySDK.EmbedRenderer.md#property_twig)
* [private $validator](../classes/CappasitySDK.EmbedRenderer.md#property_validator)
---
### Methods
* [public __construct()](../classes/CappasitySDK.EmbedRenderer.md#method___construct)
* [public render()](../classes/CappasitySDK.EmbedRenderer.md#method_render)
* [private validateParams()](../classes/CappasitySDK.EmbedRenderer.md#method_validateParams)
---
### Details
* File: [EmbedRenderer.php](../files/EmbedRenderer.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\EmbedRenderer
---
## Properties
<a name="property_twig"></a>
#### private $twig : \Twig_Environment
---
**Type:** \Twig_Environment

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
public __construct(\Twig_Environment  $twig, \CappasitySDK\ValidatorWrapper  $validator) 
```

**Details:**
* Inherited From: [\CappasitySDK\EmbedRenderer](../classes/CappasitySDK.EmbedRenderer.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\Twig_Environment</code> | $twig  |  |
| <code><a href="../classes/CappasitySDK.ValidatorWrapper.html">\CappasitySDK\ValidatorWrapper</a></code> | $validator  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_render" class="anchor"></a>
#### public render() : string

```
public render(array  $params) : string
```

**Details:**
* Inherited From: [\CappasitySDK\EmbedRenderer](../classes/CappasitySDK.EmbedRenderer.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\EmbedRenderer\Exception\RenderException |  |

**Returns:** string


<a name="method_validateParams" class="anchor"></a>
#### private validateParams() 

```
private validateParams(array  $params) 
```

**Details:**
* Inherited From: [\CappasitySDK\EmbedRenderer](../classes/CappasitySDK.EmbedRenderer.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293





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
