# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\ReportableClient
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
---
### Constants
* [ CAPPASITY_DSN](../classes/CappasitySDK.ReportableClient.md#constant_CAPPASITY_DSN)
---
### Properties
* [private $client](../classes/CappasitySDK.ReportableClient.md#property_client)
* [private $ravenClient](../classes/CappasitySDK.ReportableClient.md#property_ravenClient)
---
### Methods
* [public __construct()](../classes/CappasitySDK.ReportableClient.md#method___construct)
* [public registerSyncJob()](../classes/CappasitySDK.ReportableClient.md#method_registerSyncJob)
* [public getPullJobList()](../classes/CappasitySDK.ReportableClient.md#method_getPullJobList)
* [public ackPullJobList()](../classes/CappasitySDK.ReportableClient.md#method_ackPullJobList)
* [public getPullJobResult()](../classes/CappasitySDK.ReportableClient.md#method_getPullJobResult)
* [public getUser()](../classes/CappasitySDK.ReportableClient.md#method_getUser)
* [public getViewList()](../classes/CappasitySDK.ReportableClient.md#method_getViewList)
* [public getViewListIterator()](../classes/CappasitySDK.ReportableClient.md#method_getViewListIterator)
* [public getViewInfo()](../classes/CappasitySDK.ReportableClient.md#method_getViewInfo)
* [public getPaymentsPlan()](../classes/CappasitySDK.ReportableClient.md#method_getPaymentsPlan)
---
### Details
* File: [ReportableClient.php](../files/ReportableClient.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\ReportableClient
* Implements:
  * [\CappasitySDK\ClientInterface](../classes/CappasitySDK.ClientInterface.md)
---
## Constants
<a name="constant_CAPPASITY_DSN" class="anchor"></a>
###### CAPPASITY_DSN
```
CAPPASITY_DSN = 'https://6d68c26b33a34f008359c8647f02a110@sentry.io/1282472'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

---
## Properties
<a name="property_client"></a>
#### private $client : \CappasitySDK\ClientInterface
---
**Type:** <a href="../classes/CappasitySDK.ClientInterface.html">\CappasitySDK\ClientInterface</a>

**Details:**


<a name="property_ravenClient"></a>
#### private $ravenClient : \Raven_Client
---
**Type:** \Raven_Client

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() 

```
public __construct(\CappasitySDK\ClientInterface  $client, \Raven_Client  $ravenClient) 
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.ClientInterface.html">\CappasitySDK\ClientInterface</a></code> | $client  |  |
| <code>\Raven_Client</code> | $ravenClient  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_registerSyncJob" class="anchor"></a>
#### public registerSyncJob() : \CappasitySDK\Client\Model\Response\Container

```
public registerSyncJob(\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPullJobList" class="anchor"></a>
#### public getPullJobList() : \CappasitySDK\Client\Model\Response\Container

```
public getPullJobList(\CappasitySDK\Client\Model\Request\Process\JobsPullListGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullListGet.html">\CappasitySDK\Client\Model\Request\Process\JobsPullListGet</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_ackPullJobList" class="anchor"></a>
#### public ackPullJobList() : \CappasitySDK\Client\Model\Response\Container

```
public ackPullJobList(\CappasitySDK\Client\Model\Request\Process\JobsPullAckPost  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullAckPost.html">\CappasitySDK\Client\Model\Request\Process\JobsPullAckPost</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPullJobResult" class="anchor"></a>
#### public getPullJobResult() : \CappasitySDK\Client\Model\Response\Container

```
public getPullJobResult(\CappasitySDK\Client\Model\Request\Process\JobsPullResultGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullResultGet.html">\CappasitySDK\Client\Model\Request\Process\JobsPullResultGet</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getUser" class="anchor"></a>
#### public getUser() : \CappasitySDK\Client\Model\Response\Container

```
public getUser(\CappasitySDK\Client\Model\Request\Users\MeGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Users.MeGet.html">\CappasitySDK\Client\Model\Request\Users\MeGet</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getViewList" class="anchor"></a>
#### public getViewList() : \CappasitySDK\Client\Model\Response\Container

```
public getViewList(\CappasitySDK\Client\Model\Request\Files\ListGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\CappasitySDK\Client\Model\Request\Files\ListGet</code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getViewListIterator" class="anchor"></a>
#### public getViewListIterator() : \Generator

```
public getViewListIterator(\CappasitySDK\Client\Model\Request\Files\ListGet  $params) : \Generator
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\CappasitySDK\Client\Model\Request\Files\ListGet</code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** \Generator


<a name="method_getViewInfo" class="anchor"></a>
#### public getViewInfo() : \CappasitySDK\Client\Model\Response\Container

```
public getViewInfo(\CappasitySDK\Client\Model\Request\Files\InfoGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Files.InfoGet.html">\CappasitySDK\Client\Model\Request\Files\InfoGet</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPaymentsPlan" class="anchor"></a>
#### public getPaymentsPlan() : \CappasitySDK\Client\Model\Response\Container

```
public getPaymentsPlan(\CappasitySDK\Client\Model\Request\Payments\Plans\PlanGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableClient](../classes/CappasitySDK.ReportableClient.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Payments.Plans.PlanGet.html">\CappasitySDK\Client\Model\Request\Payments\Plans\PlanGet</a></code> | $params  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>



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
