# [Cappasity PHP SDK](../home.md)

# Class: \CappasitySDK\ReportableTransport
### Namespace: [\CappasitySDK](../namespaces/CappasitySDK.md)
---
---
### Constants
* No constants found
---
### Properties
* [private $transport](../classes/CappasitySDK.ReportableTransport.md#property_transport)
* [private $ravenClient](../classes/CappasitySDK.ReportableTransport.md#property_ravenClient)
---
### Methods
* [public __construct()](../classes/CappasitySDK.ReportableTransport.md#method___construct)
* [public makeRequest()](../classes/CappasitySDK.ReportableTransport.md#method_makeRequest)
---
### Details
* File: [ReportableTransport.php](../files/ReportableTransport.md)
* Package: Default
* Class Hierarchy:
  * \CappasitySDK\ReportableTransport
* Implements:
  * [\CappasitySDK\TransportInterface](../classes/CappasitySDK.TransportInterface.md)
---
## Properties
<a name="property_transport"></a>
#### private $transport : \CappasitySDK\TransportInterface
---
**Type:** <a href="../classes/CappasitySDK.TransportInterface.html">\CappasitySDK\TransportInterface</a>

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
public __construct(\CappasitySDK\TransportInterface  $transport, \Raven_Client  $ravenClient) 
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableTransport](../classes/CappasitySDK.ReportableTransport.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code><a href="../classes/CappasitySDK.TransportInterface.html">\CappasitySDK\TransportInterface</a></code> | $transport  |  |
| <code>\Raven_Client</code> | $ravenClient  |  |

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293

Warning: count(): Parameter must be an array or an object that implements Countable in /usr/local/lib/php/phpDocumentor/vendor/twig/twig/lib/Twig/Extension/Core.php on line 1293




<a name="method_makeRequest" class="anchor"></a>
#### public makeRequest() : \CappasitySDK\Transport\ResponseContainer

```
public makeRequest(string  $method, string  $url, array  $options = array()) : \CappasitySDK\Transport\ResponseContainer
```

**Details:**
* Inherited From: [\CappasitySDK\ReportableTransport](../classes/CappasitySDK.ReportableTransport.md)
##### Parameters:
| Type | Name | Description |
| ---- | ---- | ----------- |
| <code>string</code> | $method  |  |
| <code>string</code> | $url  |  |
| <code>array</code> | $options  |  |
##### Throws:
| Type | Description |
| ---- | ----------- |
| \Exception |  |

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
