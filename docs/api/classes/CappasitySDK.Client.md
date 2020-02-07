# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\Client
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
**Summary:**

Client provides wrappers for all necessary Cappasity API methods

---
### Constants
* [ ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST](../classes/CappasitySDK.Client.md#constant_ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST)
* [ ENDPOINT_PROCESS_JOBS_PULL_LIST_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_PROCESS_JOBS_PULL_LIST_GET)
* [ ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET)
* [ ENDPOINT_PROCESS_JOBS_PULL_ACK_POST](../classes/CappasitySDK.Client.md#constant_ENDPOINT_PROCESS_JOBS_PULL_ACK_POST)
* [ ENDPOINT_USERS_ME_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_USERS_ME_GET)
* [ ENDPOINT_FILES_INFO_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_FILES_INFO_GET)
* [ ENDPOINT_FILES_LIST_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_FILES_LIST_GET)
* [ ENDPOINT_PAYMENTS_PLANS_PLAN_GET](../classes/CappasitySDK.Client.md#constant_ENDPOINT_PAYMENTS_PLANS_PLAN_GET)
* [ BASE_URL_API_CAPPASITY](../classes/CappasitySDK.Client.md#constant_BASE_URL_API_CAPPASITY)
---
### Properties
* [public $defaultConfig](../classes/CappasitySDK.Client.md#property_defaultConfig)
* [private $apiToken](../classes/CappasitySDK.Client.md#property_apiToken)
* [private $transport](../classes/CappasitySDK.Client.md#property_transport)
* [private $validator](../classes/CappasitySDK.Client.md#property_validator)
* [private $responseAdapter](../classes/CappasitySDK.Client.md#property_responseAdapter)
* [private $config](../classes/CappasitySDK.Client.md#property_config)
* [private $allowedEndpoints](../classes/CappasitySDK.Client.md#property_allowedEndpoints)
* [private $allowedBaseUrls](../classes/CappasitySDK.Client.md#property_allowedBaseUrls)
---
### Methods
* [public __construct()](../classes/CappasitySDK.Client.md#method___construct)
* [public registerSyncJob()](../classes/CappasitySDK.Client.md#method_registerSyncJob)
* [public getPullJobList()](../classes/CappasitySDK.Client.md#method_getPullJobList)
* [public ackPullJobList()](../classes/CappasitySDK.Client.md#method_ackPullJobList)
* [public getPullJobResult()](../classes/CappasitySDK.Client.md#method_getPullJobResult)
* [public getUser()](../classes/CappasitySDK.Client.md#method_getUser)
* [public getViewList()](../classes/CappasitySDK.Client.md#method_getViewList)
* [public getViewListIterator()](../classes/CappasitySDK.Client.md#method_getViewListIterator)
* [public getViewInfo()](../classes/CappasitySDK.Client.md#method_getViewInfo)
* [public getPaymentsPlan()](../classes/CappasitySDK.Client.md#method_getPaymentsPlan)
* [public getConfig()](../classes/CappasitySDK.Client.md#method_getConfig)
* [public getApiToken()](../classes/CappasitySDK.Client.md#method_getApiToken)
* [private getResponseAdapter()](../classes/CappasitySDK.Client.md#method_getResponseAdapter)
* [private makeRequest()](../classes/CappasitySDK.Client.md#method_makeRequest)
* [private makeOptions()](../classes/CappasitySDK.Client.md#method_makeOptions)
* [private assertAPITokenIsSet()](../classes/CappasitySDK.Client.md#method_assertAPITokenIsSet)
* [private assertParams()](../classes/CappasitySDK.Client.md#method_assertParams)
* [private validateConfig()](../classes/CappasitySDK.Client.md#method_validateConfig)
* [private getUrl()](../classes/CappasitySDK.Client.md#method_getUrl)
* [private getTimeout()](../classes/CappasitySDK.Client.md#method_getTimeout)
---
### Details
* File: [Client.php](../files/Client.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\Client
* Implements:
  * [\CappasitySDK\ClientInterface](../classes/CappasitySDK.ClientInterface.md)
---
## Constants
<a name="constant_ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST" class="anchor"></a>
###### ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST
```
ENDPOINT_PROCESS_JOBS_REGISTER_SYNC_POST = '/api/cp/jobs/register/sync'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_PROCESS_JOBS_PULL_LIST_GET" class="anchor"></a>
###### ENDPOINT_PROCESS_JOBS_PULL_LIST_GET
```
ENDPOINT_PROCESS_JOBS_PULL_LIST_GET = '/api/cp/jobs/pull/list'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET" class="anchor"></a>
###### ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET
```
ENDPOINT_PROCESS_JOBS_PULL_RESULT_GET = '/api/cp/jobs/pull/result'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_PROCESS_JOBS_PULL_ACK_POST" class="anchor"></a>
###### ENDPOINT_PROCESS_JOBS_PULL_ACK_POST
```
ENDPOINT_PROCESS_JOBS_PULL_ACK_POST = '/api/cp/jobs/pull/ack'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_USERS_ME_GET" class="anchor"></a>
###### ENDPOINT_USERS_ME_GET
```
ENDPOINT_USERS_ME_GET = '/api/users/me'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_FILES_INFO_GET" class="anchor"></a>
###### ENDPOINT_FILES_INFO_GET
```
ENDPOINT_FILES_INFO_GET = '/api/files/info/%s/%s'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_FILES_LIST_GET" class="anchor"></a>
###### ENDPOINT_FILES_LIST_GET
```
ENDPOINT_FILES_LIST_GET = '/api/files'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_ENDPOINT_PAYMENTS_PLANS_PLAN_GET" class="anchor"></a>
###### ENDPOINT_PAYMENTS_PLANS_PLAN_GET
```
ENDPOINT_PAYMENTS_PLANS_PLAN_GET = '/api/payments/plans/%s'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

<a name="constant_BASE_URL_API_CAPPASITY" class="anchor"></a>
###### BASE_URL_API_CAPPASITY
```
BASE_URL_API_CAPPASITY = 'https://api.cappasity.com'
```

| Tag | Version | Desc |
| --- | ------- | ---- |

---
## Properties
<a name="property_defaultConfig"></a>
#### public $defaultConfig : array
---
**Type:** array

**Details:**


<a name="property_apiToken"></a>
#### private $apiToken : string
---
**Type:** string

**Details:**


<a name="property_transport"></a>
#### private $transport : \CappasitySDK\TransportInterface
---
**Type:** <a href="../classes/CappasitySDK.TransportInterface.html">\CappasitySDK\TransportInterface</a>

**Details:**


<a name="property_validator"></a>
#### private $validator : \CappasitySDK\ValidatorWrapper
---
**Type:** <a href="../classes/CappasitySDK.ValidatorWrapper.html">\CappasitySDK\ValidatorWrapper</a>

**Details:**


<a name="property_responseAdapter"></a>
#### private $responseAdapter : \CappasitySDK\ResponseAdapter
---
**Type:** <a href="../classes/CappasitySDK.ResponseAdapter.html">\CappasitySDK\ResponseAdapter</a>

**Details:**


<a name="property_config"></a>
#### private $config : array
---
**Type:** array

**Details:**


<a name="property_allowedEndpoints"></a>
#### private $allowedEndpoints : array
---
**Type:** array

**Details:**


<a name="property_allowedBaseUrls"></a>
#### private $allowedBaseUrls : array
---
**Type:** array

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() 

```
public __construct(\CappasitySDK\TransportInterface  $transport,   $apiToken, \CappasitySDK\ValidatorWrapper  $validator, \CappasitySDK\ResponseAdapter  $responseAdapter, array  $config = array()) 
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.TransportInterface.html">\CappasitySDK\TransportInterface</a></code> | $transport  |  |
| <code></code> | $apiToken  |  |
| <code><a href="../classes/CappasitySDK.ValidatorWrapper.html">\CappasitySDK\ValidatorWrapper</a></code> | $validator  |  |
| <code><a href="../classes/CappasitySDK.ResponseAdapter.html">\CappasitySDK\ResponseAdapter</a></code> | $responseAdapter  |  |
| <code>array</code> | $config  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_registerSyncJob" class="anchor"></a>
#### public registerSyncJob() : \CappasitySDK\Client\Model\Response\Container

```
public registerSyncJob(\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsRegisterSyncPost.html">\CappasitySDK\Client\Model\Request\Process\JobsRegisterSyncPost</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPullJobList" class="anchor"></a>
#### public getPullJobList() : \CappasitySDK\Client\Model\Response\Container

```
public getPullJobList(\CappasitySDK\Client\Model\Request\Process\JobsPullListGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullListGet.html">\CappasitySDK\Client\Model\Request\Process\JobsPullListGet</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_ackPullJobList" class="anchor"></a>
#### public ackPullJobList() : \CappasitySDK\Client\Model\Response\Container

```
public ackPullJobList(\CappasitySDK\Client\Model\Request\Process\JobsPullAckPost  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullAckPost.html">\CappasitySDK\Client\Model\Request\Process\JobsPullAckPost</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPullJobResult" class="anchor"></a>
#### public getPullJobResult() : \CappasitySDK\Client\Model\Response\Container

```
public getPullJobResult(\CappasitySDK\Client\Model\Request\Process\JobsPullResultGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Process.JobsPullResultGet.html">\CappasitySDK\Client\Model\Request\Process\JobsPullResultGet</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getUser" class="anchor"></a>
#### public getUser() : \CappasitySDK\Client\Model\Response\Container

```
public getUser(\CappasitySDK\Client\Model\Request\Users\MeGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Users.MeGet.html">\CappasitySDK\Client\Model\Request\Users\MeGet</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getViewList" class="anchor"></a>
#### public getViewList() : \CappasitySDK\Client\Model\Response\Container

```
public getViewList(\CappasitySDK\Client\Model\Request\Files\ListGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\CappasitySDK\Client\Model\Request\Files\ListGet</code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getViewListIterator" class="anchor"></a>
#### public getViewListIterator() : \Generator&amp;#124;\CappasitySDK\Client\Model\Response\Container

```
public getViewListIterator(\CappasitySDK\Client\Model\Request\Files\ListGet  $params) : \Generator&amp;#124;\CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
* See Also:
 * [\CappasitySDK\Response\Files\ListGet]()
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\CappasitySDK\Client\Model\Request\Files\ListGet</code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** \Generator&#124;<a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a> - Yielded value is Response\Container instance which holds
Response\Files\ListGet object as body data


<a name="method_getViewInfo" class="anchor"></a>
#### public getViewInfo() : \CappasitySDK\Client\Model\Response\Container

```
public getViewInfo(\CappasitySDK\Client\Model\Request\Files\InfoGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Files.InfoGet.html">\CappasitySDK\Client\Model\Request\Files\InfoGet</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getPaymentsPlan" class="anchor"></a>
#### public getPaymentsPlan() : \CappasitySDK\Client\Model\Response\Container

```
public getPaymentsPlan(\CappasitySDK\Client\Model\Request\Payments\Plans\PlanGet  $params) : \CappasitySDK\Client\Model\Response\Container
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.Payments.Plans.PlanGet.html">\CappasitySDK\Client\Model\Request\Payments\Plans\PlanGet</a></code> | $params  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Client.Model.Response.Container.html">\CappasitySDK\Client\Model\Response\Container</a>


<a name="method_getConfig" class="anchor"></a>
#### public getConfig() : array

```
public getConfig() : array
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** array


<a name="method_getApiToken" class="anchor"></a>
#### public getApiToken() : string

```
public getApiToken() : string
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** string


<a name="method_getResponseAdapter" class="anchor"></a>
#### private getResponseAdapter() : \CappasitySDK\ResponseAdapter

```
private getResponseAdapter() : \CappasitySDK\ResponseAdapter
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.ResponseAdapter.html">\CappasitySDK\ResponseAdapter</a>


<a name="method_makeRequest" class="anchor"></a>
#### private makeRequest() : \CappasitySDK\Transport\ResponseContainer

```
private makeRequest(string  $method, string  $endpoint, array  $urlParams = array(), array  $options = array()) : \CappasitySDK\Transport\ResponseContainer
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $method  |  |
| <code>string</code> | $endpoint  |  |
| <code>array</code> | $urlParams  |  |
| <code>array</code> | $options  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Client\Exception\RequestException |  |

**Returns:** <a href="../classes/CappasitySDK.Transport.ResponseContainer.html">\CappasitySDK\Transport\ResponseContainer</a>


<a name="method_makeOptions" class="anchor"></a>
#### private makeOptions() : array

```
private makeOptions(string  $endpoint, array  $options) : array
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $endpoint  |  |
| <code>array</code> | $options  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** array


<a name="method_assertAPITokenIsSet" class="anchor"></a>
#### private assertAPITokenIsSet() 

```
private assertAPITokenIsSet() 
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Client\Exception\AuthorizationAssertionException |  |




<a name="method_assertParams" class="anchor"></a>
#### private assertParams() 

```
private assertParams(\CappasitySDK\Client\Model\Request\RequestParamsInterface  $params, string  $validatorType) 
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.Client.Model.Request.RequestParamsInterface.html">\CappasitySDK\Client\Model\Request\RequestParamsInterface</a></code> | $params  |  |
| <code>string</code> | $validatorType  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Client\Exception\ValidationException |  |




<a name="method_validateConfig" class="anchor"></a>
#### private validateConfig() 

```
private validateConfig() 
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_getUrl" class="anchor"></a>
#### private getUrl() : string

```
private getUrl(string  $endpoint, array&lt;mixed,string&gt;  $urlParams = array()) : string
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $endpoint  |  |
| <code>array&lt;mixed,string&gt;</code> | $urlParams  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** string


<a name="method_getTimeout" class="anchor"></a>
#### private getTimeout() : integer

```
private getTimeout(string  $endpoint) : integer
```

**Details:**
* Inherited From: [\CappasitySDK\Client](../classes/CappasitySDK.Client.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $endpoint  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** integer



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
