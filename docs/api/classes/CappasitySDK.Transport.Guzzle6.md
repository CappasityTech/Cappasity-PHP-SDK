# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\Transport\Guzzle6
### Namespace: [\CappasitySDK\Transport](../namespaces/CappasitySDK.Transport.md)
---
---
### Constants
* No constants found
---
### Properties
* [private $httpClient](../classes/CappasitySDK.Transport.Guzzle6.md#property_httpClient)
* [private $config](../classes/CappasitySDK.Transport.Guzzle6.md#property_config)
* [private $defaultConfig](../classes/CappasitySDK.Transport.Guzzle6.md#property_defaultConfig)
---
### Methods
* [public __construct()](../classes/CappasitySDK.Transport.Guzzle6.md#method___construct)
* [public createDefault()](../classes/CappasitySDK.Transport.Guzzle6.md#method_createDefault)
* [public createWithConfig()](../classes/CappasitySDK.Transport.Guzzle6.md#method_createWithConfig)
* [public createExceptionFromErrorResponse()](../classes/CappasitySDK.Transport.Guzzle6.md#method_createExceptionFromErrorResponse)
* [public makeRequest()](../classes/CappasitySDK.Transport.Guzzle6.md#method_makeRequest)
* [private parseResponseBody()](../classes/CappasitySDK.Transport.Guzzle6.md#method_parseResponseBody)
* [private makeErrorMessage()](../classes/CappasitySDK.Transport.Guzzle6.md#method_makeErrorMessage)
* [private createDefaultHttpClient()](../classes/CappasitySDK.Transport.Guzzle6.md#method_createDefaultHttpClient)
* [private createRequest()](../classes/CappasitySDK.Transport.Guzzle6.md#method_createRequest)
* [private resolveRequestOptions()](../classes/CappasitySDK.Transport.Guzzle6.md#method_resolveRequestOptions)
* [private getWrappedException()](../classes/CappasitySDK.Transport.Guzzle6.md#method_getWrappedException)
* [private transformResponse()](../classes/CappasitySDK.Transport.Guzzle6.md#method_transformResponse)
---
### Details
* File: [Transport/Guzzle6.php](../files/Transport.Guzzle6.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\Transport\Guzzle6
* Implements:
  * [\CappasitySDK\TransportInterface](../classes/CappasitySDK.TransportInterface.md)
---
## Properties
<a name="property_httpClient"></a>
#### private $httpClient : \GuzzleHttp\ClientInterface
---
**Type:** \GuzzleHttp\ClientInterface

**Details:**


<a name="property_config"></a>
#### private $config : array
---
**Type:** array

**Details:**


<a name="property_defaultConfig"></a>
#### private $defaultConfig : array
---
**Type:** array

**Details:**



---
## Methods
<a name="method___construct" class="anchor"></a>
#### public __construct() 

```
public __construct(\GuzzleHttp\ClientInterface  $httpClient, array  $config = array()) 
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\GuzzleHttp\ClientInterface</code> | $httpClient  |  |
| <code>array</code> | $config  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_createDefault" class="anchor"></a>
#### public createDefault() : self

```
Static public createDefault() : self
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** self


<a name="method_createWithConfig" class="anchor"></a>
#### public createWithConfig() : self

```
Static public createWithConfig(array  $config) : self
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $config  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** self


<a name="method_createExceptionFromErrorResponse" class="anchor"></a>
#### public createExceptionFromErrorResponse() : \CappasitySDK\Transport\Exception\RequestException

```
Static public createExceptionFromErrorResponse(\Psr\Http\Message\ResponseInterface  $response) : \CappasitySDK\Transport\Exception\RequestException
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\Psr\Http\Message\ResponseInterface</code> | $response  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Transport.Exception.RequestException.html">\CappasitySDK\Transport\Exception\RequestException</a>


<a name="method_makeRequest" class="anchor"></a>
#### public makeRequest() : \CappasitySDK\Transport\ResponseContainer

```
public makeRequest(string  $method, string  $url, array  $options = array()) : \CappasitySDK\Transport\ResponseContainer
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $method  |  |
| <code>string</code> | $url  |  |
| <code>array</code> | $options  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Transport\Exception\RequestException |  |

**Returns:** <a href="../classes/CappasitySDK.Transport.ResponseContainer.html">\CappasitySDK\Transport\ResponseContainer</a>


<a name="method_parseResponseBody" class="anchor"></a>
#### private parseResponseBody() : array

```
Static private parseResponseBody(\Psr\Http\Message\ResponseInterface  $response) : array
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\Psr\Http\Message\ResponseInterface</code> | $response  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Transport\Exception\UnexpectedResponseFormatException |  |

**Returns:** array


<a name="method_makeErrorMessage" class="anchor"></a>
#### private makeErrorMessage() : string

```
Static private makeErrorMessage(\Psr\Http\Message\ResponseInterface  $response) : string
```

**Summary**

TODO move parsing logic to a helper or inject

**Description**

Possible formats are:
I.
{
  "statusCode": 404,
  "error": "Not Found",
  "message": "job data missing",
  "name": "HttpStatusError"
}

II.
{
  "meta": {
    "id": "d715ee2b-aea5-4f78-94ee-c7ec3bfaad40"
  },
  "errors": [
    {
      "status": "HttpStatusError",
      "code": 404,
      "title": "could not find associated data",
      "detail": {}
    }
  ]
}

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\Psr\Http\Message\ResponseInterface</code> | $response  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \CappasitySDK\Transport\Exception\UnexpectedResponseFormatException |  |

**Returns:** string


<a name="method_createDefaultHttpClient" class="anchor"></a>
#### private createDefaultHttpClient() : \GuzzleHttp\Client

```
Static private createDefaultHttpClient() : \GuzzleHttp\Client
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** \GuzzleHttp\Client


<a name="method_createRequest" class="anchor"></a>
#### private createRequest() : \GuzzleHttp\Psr7\Request

```
private createRequest(  $method,   $url, array  $options = array()) : \GuzzleHttp\Psr7\Request
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code></code> | $method  |  |
| <code></code> | $url  |  |
| <code>array</code> | $options  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** \GuzzleHttp\Psr7\Request


<a name="method_resolveRequestOptions" class="anchor"></a>
#### private resolveRequestOptions() : array

```
private resolveRequestOptions(array  $options) : array
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>array</code> | $options  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** array


<a name="method_getWrappedException" class="anchor"></a>
#### private getWrappedException() : \CappasitySDK\Transport\Exception\RequestException

```
private getWrappedException(\GuzzleHttp\Exception\GuzzleException  $original) : \CappasitySDK\Transport\Exception\RequestException
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\GuzzleHttp\Exception\GuzzleException</code> | $original  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Transport.Exception.RequestException.html">\CappasitySDK\Transport\Exception\RequestException</a>


<a name="method_transformResponse" class="anchor"></a>
#### private transformResponse() : \CappasitySDK\Transport\ResponseContainer

```
private transformResponse(\Psr\Http\Message\ResponseInterface  $response) : \CappasitySDK\Transport\ResponseContainer
```

**Details:**
* Inherited From: [\CappasitySDK\Transport\Guzzle6](../classes/CappasitySDK.Transport.Guzzle6.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>\Psr\Http\Message\ResponseInterface</code> | $response  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

**Returns:** <a href="../classes/CappasitySDK.Transport.ResponseContainer.html">\CappasitySDK\Transport\ResponseContainer</a>



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
