# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost
### Namespace: [\CappasitySDK\Client\Model\Request\Process](../namespaces/CappasitySDK.Client.Model.Request.Process.md)
---
---
### Constants
* [ SYNC_TYPE_PULL](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#constant_SYNC_TYPE_PULL)
* [ SYNC_TYPE_PUSH_HTTP](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#constant_SYNC_TYPE_PUSH_HTTP)
---
### Properties
* [public $syncTypes](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#property_syncTypes)
* [private $items](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#property_items)
* [private $syncType](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#property_syncType)
* [private $callbackUrl](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#property_callbackUrl)
---
### Methods
* [public __construct()](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#method___construct)
* [public fromData()](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#method_fromData)
* [public getItems()](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#method_getItems)
* [public getSyncType()](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#method_getSyncType)
* [public getCallbackUrl()](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md#method_getCallbackUrl)
---
### Details
* File: [Client/Model/Request/Process/JobsRegisterSyncPost.php](../files/Client.Model.Request.Process.JobsRegisterSyncPost.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost
* Implements:
  * [\CappasitySDK\Client\Model\Request\RequestParamsInterface](../classes/CappasitySDK.Client.Model.Request.RequestParamsInterface.md)
---
## Constants
<a name="constant_SYNC_TYPE_PULL" class="anchor"></a>
###### SYNC_TYPE_PULL
```
SYNC_TYPE_PULL = 'pull'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_SYNC_TYPE_PUSH_HTTP" class="anchor"></a>
###### SYNC_TYPE_PUSH_HTTP
```
SYNC_TYPE_PUSH_HTTP = 'push.http'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

---
## Properties
<a name="property_syncTypes"></a>
#### public $syncTypes : 
---
**Type:** 

**Details:**


<a name="property_items"></a>
#### private $items : array&lt;mixed,\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem&gt;
---
**Type:** array&lt;mixed,<a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.SyncItem.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem</a>&gt;

**Details:**


<a name="property_syncType"></a>
#### private $syncType : string
---
**Type:** string

**Details:**


<a name="property_callbackUrl"></a>
#### private $callbackUrl : null|string
---
**Summary**

Required when sync type is push.http

**Type:** null|string

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() 

```
public __construct(array&lt;mixed,\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem&gt;  $items, string  $syncType, null&amp;#124;string  $callbackUrl = null) 
```

**Details:**
* Inherited From: [\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array&lt;mixed,<a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.SyncItem.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem</a>&gt;</code> | $items  |  |
| <code>string</code> | $syncType  |  |
| <code>null&#124;string</code> | $callbackUrl  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_fromData" class="anchor"></a>
#### public fromData() : \CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost

```
Static public fromData(array  $items, string  $syncType, null&amp;#124;string  $callbackUrl = null) : \CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost
```

**Details:**
* Inherited From: [\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $items  |  |
| <code>string</code> | $syncType  |  |
| <code>null&#124;string</code> | $callbackUrl  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost</a>


<a name="method_getItems" class="anchor"></a>
#### public getItems() : array&lt;mixed,\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem&gt;

```
public getItems() : array&lt;mixed,\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem&gt;
```

**Details:**
* Inherited From: [\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** array&lt;mixed,<a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.SyncItem.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost\SyncItem</a>&gt;


<a name="method_getSyncType" class="anchor"></a>
#### public getSyncType() : string

```
public getSyncType() : string
```

**Details:**
* Inherited From: [\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** string


<a name="method_getCallbackUrl" class="anchor"></a>
#### public getCallbackUrl() : null&amp;#124;string

```
public getCallbackUrl() : null&amp;#124;string
```

**Details:**
* Inherited From: [\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost](../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** null&#124;string



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
