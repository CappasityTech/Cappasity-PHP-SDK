# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\EmbedRendererFactory
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
---
### Constants
* No constants found
---
### Properties
---
### Methods
* [public getRendererInstance()](../classes/CappasitySDK.EmbedRendererFactory.md#method_getRendererInstance)
---
### Details
* File: [EmbedRendererFactory.php](../files/EmbedRendererFactory.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\EmbedRendererFactory

---
## Methods
<a name="method_getRendererInstance" class="anchor"></a>
#### public getRendererInstance() : \CappasitySDK\EmbedRenderer

```
Static public getRendererInstance(array  $engineOptions = array()) : \CappasitySDK\EmbedRenderer
```

**Details:**
* Inherited From: [\CappasitySDK\EmbedRendererFactory](../classes/CappasitySDK.EmbedRendererFactory.md)
* See Also:
 * [https://twig.symfony.com/doc/1.x/api.html](https://twig.symfony.com/doc/1.x/api.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $engineOptions  | You are expected to use `cache` option.
"The cache option is a compilation cache directory, where Twig caches the compiled templates to avoid the parsing
phase for sub-sequent requests. It is very different from the cache you might want to add for the evaluated
templates. For such a need, you can use any available PHP cache library." |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.EmbedRenderer.html">\CappasitySDK\EmbedRenderer</a>



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
