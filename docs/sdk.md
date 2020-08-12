# Cappasity SDK API

(c) Copyright 2019, Cappasity Inc. All rights reserved.

Cappasity SDK includes three components – `Client`, `EmbedRenderer` and `PreviewImageSrcGenerator`.

`Client` is responsible for making HTTP requests to Cappasity API. `EmbedRenderer` allows you to generate iFrame code to 
embed your HTML. In case you want to display Cappasity 3D View preview image `PreviewImageSrcGenerator` component helps you
to get a link to an image that fits desired sizes, format, quality, etc. 

## Table of Contents

* [Installation](#installation)
* [Client](#client)
  * [Basic usage](#basic-usage)
  * [Send error reports](#send-error-reports)
    * [Send reports to Cappasity developers](#send-reports-to-cappasity-developers)
    * [Send reports to your own Sentry account](#send-reports-to-your-own-sentry-account)
  * [Other HTTP clients support](#other-http-clients-support)
  * [Create Client instance manually](#create-client-instance-manually)
  * [API](#api)
    * [Error handling](#error-handling)
      * [AuthorizationAssertionException](#authorizationassertionexception)
      * [ValidationException](#validationexception)
      * [RequestException](#requestexception)
    * [Get user](#get-user)
      * [Errors](#errors)
    * [Get payment plan by ID](#get-payment-plan-by-id)
    * [Get view list](#get-view-list)
      * [Errors](#errors-2)
      * [Get view list with iterator](#get-view-list-with-iterator)
    * [Get view info](#get-view-info)
      * [Errors](#errors-3)    
    * [Register sync job](#register-sync-job)
      * [HTTP Push type](#http-push-type)
      * [HTTP Pull type](#http-pull-type)
      * [Errors](#errors-4)
    * [Get pull job list](#get-pull-job-list)
      * [Errors](#errors-5)
    * [Get pull job result](#get-pull-job-result)
      * [Errors](#errors-6)
    * [Acknowledge pull job list](#acknowledge-pull-job-list)
      * [Errors](#errors-7)
* [EmbedRenderer](#embedrenderer)
  * [Render embed code](#render-embed-code)
    * [Rendered code example](#rendered-code-example)
* [PreviewImageSrcGenerator](#previewimagesrcgenerator)
  * [Generate preview link](#generate-preview-link)
  * [Options list](#options-list)
    * [Modifiers list](#modifiers-list)
    * [Modifiers examples](#modifiers-examples)
    * [Overlays examples](#overlays-examples)   

# Installation
Require the package with Composer:
```sh
composer require cappasity-tech/cappasity-php-sdk
```

# Client

## Basic usage
```php
use CappasitySDK\ClientFactory;
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

// instantiate client with `ClientFactory`
$client = ClientFactory::getClientInstance([
  'apiToken' => 'your.api.token'
]);

// create parameter object
$params = Request\Process\JobsRegisterSyncPost::fromData(
  [
    [
      'id' => 'inner-product-id',
      'aliases' => ['SkuGoesHere'],
      'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
    ]
  ],
  'push.http',
  'http://your-callback-url.com/foo/bar'
);

$response = $client->registerSyncJob($params);

/** @var Response\Process\JobsRegisterSyncPost $data */
$data = $response->getBodyData();
```

Client methods return wrapped and transformed Guzzle response.
If you need more information about the response you can always refer to the original response.
```php
$originalResponse = $response->getOriginalResponse();
```

## Send error reports
We use Raven to capture errors. Raven is a PHP client for Sentry error tracking system. By default, captured errors are 
sent to the private Cappasity error tracking system. It allows us to help you to troubleshoot development issues as soon 
as possible.

### Disable sending reports to Cappasity developers 
Once you are ready to disable error reporting set `sendReports` option to `false`.
```php 
use CappasitySDK\ClientFactory;

$client = ClientFactory::getClientInstance([
    'apiToken' => 'your.api.token',
    'sendReports' => false,
]);
```

### Send reports to your own Sentry account
Our `ClientFactory` allows you to override `Raven_Client` constructor parameters. Explore `\CappasitySDK\ClientFactory`
class code for more details. For example, you may configure your own DSN secret in order to send reports to your Sentry
account:
```php 
use CappasitySDK\ClientFactory;

$client = ClientFactory::getClientInstance([
    'apiToken' => 'your.api.token',
    'reportableClient' => [
        'ravenClient' => [
            'optionsOrDsn' => 'https://3736a7965d59423c867105ee4ba47de2@sentry.io/137605', // Paste your DSN secret
        ]
    ]
]);
```

## Other HTTP clients support
By default, we use Guzzle 5 HTTP client. If you want to use another client instead, you can implement 
`\CappasitySDK\TransportInterface` and [create `\CappasitySDK\Client` instance manually](#create-client-instance-manually).

## Create Client instance manually
Explore `\CappasitySDK\ClientFactory::getClientInstance()` method and implement your own instantiation.

## API

### Error handling
All `Client` exceptions are inherited from `CappasitySDK\Client\Exception\ClientException`.
The ones below you can prevent and handle.

#### AuthorizationAssertionException
Each time you make a request we validate the presence of API token you have instantiated your `Client` with. 
`CappasitySDK\Client\Exception\AuthorizationAssertionException` is thrown in case the token is empty or not a string.
Avoid it by passing valid API token.

#### ValidationException
Request parameters primary validation is implemented on the SDK side. When validation fails,  
`CappasitySDK\Client\Exception\ValidationException` is thrown. Avoid it by providing valid params.

#### RequestException
`CappasitySDK\Client\Exception\RequestException` is generally thrown when an HTTP error occurs.
Possible error codes and their descriptions are listed next to each SDK method example.
RequestException instance also holds the original response object in case you need more info.

```php
use CappasitySDK\Client\Exception\RequestException;

// ... init $params   

try {
  $response = $client->registerSyncJob($params); 
} catch (RequestException $e) {
  $httpErrorCode = $e->getCode();
  $parsedErrorMessage = $e->getMessage();
  $originalRequest = $e->getRequest();
  $originalResponse = $e->getResponse(); // here you can get more details about errors if response was received
}
```

### Get user
This method fetches user data, identified by the API token passed to the Client factory.

```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response; 

/** @var Response\Users\MeGet $response */
$response = $client
    ->getUser(new Request\Users\MeGet())
    ->getBodyData();

$user = $response
    ->getData()
    ->getAttributes();

// get user plan
$plan = $user->getPlan();

// get user alias
$userAlias = $user->getAlias();
```

#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |

### Get payments plan
This method provides payments plan data by plan ID. You can get user's plan ID using [`getUser`](#get-user) method.
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response; 

$userPlanId = 'P-1AS44544Y0488105H5QI6O2I';

/** @var Response\Payments\Plans\PlanGet $response */
$response = $client
    ->getUser(Request\Payments\Plans\PlanGet::fromData($userPlanId))
    ->getBodyData();

$plan = $response
    ->getData()
    ->getAttributes();

// get plan level
$level = $plan->getLevel();
```

#### Errors
There are no expected errors.

### Get view list
This method provides the list of Views.
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

const LIMIT = 10;
$params = Request\Files\ListGet::fromData(self::LIMIT);
/** @var Response\Files\ListGet $response */
$response = $client->getViewList($params)->getBodyData();

/** @var Response\Files\Common\File[] */
$views = $response->getData();
foreach ($views as $view) {
    $viewId = $view->getId();
    $backgroundColor = $view->getAttributes()->getBackgroundColor();     
}
```
You may implement pagination manually, or use `getViewListIterator` helper method.

#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |

#### Filtering, sorting
Filtering and sorting params are nullable. Use them to search for items that match specific SKU (alias):
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

$limit = 10;
$offset = null;
$criteria = 'name'; // sort by name
$order = Client\Model\Request\Files\ListGet::ORDER_ASC; // sort in ascending order
$filter = ['alias' => [Client\Model\Request\Files\ListGet::FILTER_MATCH => 'desired-sku']]; // filter by 'alias' that matches 'desired-sku'
$tags = ['bags']; // filter by tags
$shallow = true; // to omit files parts from serialization, in most cases you don't need them

$requestParams = Client\Model\Request\Files\ListGet::fromData($limit, $offset, $criteria, $order, $filter, $tags, $shallow);
/** @var Response\Files\ListGet $response */
$response = $client->getViewList($requestParams)->getBodyData();
/** @var Response\Files\Common\File[] */
$views = $response->getData();
```

Filtering is quite flexible.
Let's say we have our basic parameter object:
```php
$requestParams = Client\Model\Request\Files\ListGet($limit, $offset);
```

Simple filter example:
```php
$filter = ['alias' => 'desired-sku'];
$requestParams = Client\Model\Request\Files\ListGet();
$requestParams->setFilter($filter);
```

Or you may set it instantly through the factory method:
```php
$requestParams = Client\Model\Request\Files\ListGet::fromData(
     $limit,
     $offset,
     null,
     null, 
     $filter
 );
```

You may user filter modifiers to filter by string type field values: equal, non-equal, matching, and to filter by numeric type field values: less than or equal and greater than or equal items.
```php
$filter = [
    'alias' => [ListGet::FILTER_MATCH => 'filter-me'], // alias should match 'filter-me'
    'status' => [ListGet::FILTER_EQ => 'processed'], // return only processed Views 
    'public' => [ListGet::FILTER_NE => '1'], // return only public Views
    'uploadedAt' => [ListGet::FILTER_LTE => 1551090243029], // uploaded before 1551090243029
    'startedAt' => [ListGet::FILTER_GTE => 1551090243020], // upload started after 1551090243020        
];
$requestParams = Client\Model\Request\Files\ListGet();
$requestParams->setFilter($filter);
```

You may also filter by multiple fields matching values. If you want to filter items which names OR aliases match 'foobar', configure the filter like this:
```php
$filter = [
    ListGet::FILTER_MULTI => [
        ListGet::FILTER_FIELDS => ['name', 'alias'],
        ListGet::FILTER_MATCH => 'foobar',
    ],
    'public' => [ListGet::FILTER_NE => '1'], // return only public Views
];
$requestParams = Client\Model\Request\Files\ListGet();
$requestParams->setFilter($filter);
```

#### Get view list with iterator
This method is implemented as a [generator function](https://www.php.net/manual/en/language.generators.overview.php). This method returns an `Generator` instance so you could iterate over the whole View list using a regular `foreach` loop without worrying about pages count. Or you can use the [Iterator interface](https://www.php.net/manual/en/class.iterator.php) methods to work with it directly. 
Here's an example of how to collect all View IDs using this helper:
:
```
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

const CHUNK_SIZE = 20;

$viewList = $client->getViewListIterator(Request\Files\ListGet::fromData(self::CHUNK_SIZE));
$fileIds = [];
foreach ($viewList as $chunk) {
    $chunkFileIds = array_map(
        function(Client\Model\Response\Files\Common\File $file) {
            return $file->getId();
        },
        $chunk->getBodyData()->getData()
    );
    array_push($fileIds, ...$chunkFileIds);
}
```
This helper method works above `getViewList()` method and supports same filtering and sorting options. 

### Get view info
This method provides full View data, although in terms of synchronization you may need only its background color value.
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response; 

$params = Request\Files\InfoGet::fromData(
    'alice', // user alias
    '38020fdf-5e11-411c-9116-1610339d59cf', // view ID
); 

/** @var Response\Files\InfoGet $response */
$response = $client
    ->getViewInfo($params)
    ->getBodyData();

$viewInfo = $response
    ->getData()
    ->getAttributes();

// get background color
$backgroundColor = $viewInfo->getBackgroundColor();
```

#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |

### Register sync job
#### HTTP Push type
To initialize matches calculation on the first synchronization or resynchronization, register sync job:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
 
/** @var Response\Process\JobsRegisterSyncPost $response */
$response = $client
  ->registerSyncJob(Request\Process\JobsRegisterSyncPost::fromData(
    [
      [
        'id' => 'inner-product-id',
        'aliases' => ['SkuGoesHere'],
      ]
    ],
    'push.http',
    'http://your-callback-url.com/foo/bar
  ))
  ->getBodyData();
  
$jobId = $response->getData()->getId();
```

In case you have already performed the sync, you should know previously matched View ID. Pass it as `capp`:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
 
/** @var Response\Process\JobsRegisterSyncPost $response */
$response = $client
  ->registerSyncJob(Request\Process\JobsRegisterSyncPost::fromData(
    [
      [
        'id' => 'inner-product-id',
        'aliases' => ['ThisOneIsAlreadySynced'],
        'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
      ],
      [
        'id' => 'inner-product-id',
        'aliases' => ['ThisOneIsNew'],
      ],
    ],
    'push.http',
    'http://your-callback-url.com/foo/bar
  ))
  ->getBodyData();
  
$jobId = $response->getData()->getId();
```

#### HTTP Pull type
Similarly, to initialize matches calculation on the first synchronization or resynchronization, register sync job:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

/** @var Response\Process\JobsRegisterSyncPost $response */
$response = $client
  ->registerSyncJob(Request\Process\JobsRegisterSyncPost::fromData(
    [
      [
        'id' => 'inner-product-id',
        'aliases' => ['SkuGoesHere'],
      ]
    ],
    'pull'
  ))
  ->getBodyData();
  
$jobId = $response->getData()->getId();
```

In case you have already performed the sync, you should know previously matched View ID. Pass it as `capp`:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

/** @var Response\Process\JobsRegisterSyncPost $response */
$response = $client
  ->registerSyncJob(Request\Process\JobsRegisterSyncPost::fromData(
    [
      [
        'id' => 'inner-product-id',
        'aliases' => ['ThisOneIsAlreadySynced'],
        'capp' => '38020fdf-5e11-411c-9116-1610339d59cf',
      ],
      [
        'id' => 'inner-product-id',
        'aliases' => ['ThisOneIsNew'],
      ],
    ],
    'pull'
  ))
  ->getBodyData();
  
$jobId = $response->getData()->getId();
```

#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |
| 413  | Sync units limit reached      |
| 429  | Multiple concurrent requests  |

### Get pull job list
To get the list of all registered jobs, its IDs and current status, call this method:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
 
/** @var Response\Process\JobsPullListGet $response */
$response = $client
  ->getPullJobList(Request\Process\JobsPullListGet::fromData($limit, $cursor))
  ->getBodyData();
  
$jobs = $response->getData();
```

#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |

### Get pull job result
Once the job status is `success`, you may get its results:
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;
 
/** @var Response\Process\JobsPullResultGet $response */
$response = $client
    ->getPullJobResult(Request\Process\JobsPullResultGet::fromData($jobId))
    ->getBodyData();
     
foreach ($response->getData() as $jobItemResult) {
    // handle results
}
```
#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |
| 404  | Job data missing              |

### Acknowledge pull job list
When you have already handled pull job result, saved all necessary data, acknowledge the result so the job could be 
treated as completed and removed from the current jobs list.
```php
use CappasitySDK\Client\Model\Request;
use CappasitySDK\Client\Model\Response;

/** @var Response\Process\JobsPullAckPost $response */
$response = $client
  ->ackPullJobList(Request\Process\JobsPullAckPost::fromData($jobIds))
  ->getBodyData();
  
$ackJobCount = $response  
  ->getData()
  ->getAck();
```

When no jobs to acknowledge were found, the result is 0.
#### Errors
| Code | Description                   |
|:----:|-------------------------------|
| 401  | Authorization error           |

# EmbedRenderer

## Render embed code
The only required parameter is `viewId`, which holds Cappasity 3D View ID. If it is not present or empty,  
`CappasitySDK\EmbedRenderer\Exception\InvalidParamsException` is thrown.

```php
use CappasitySDK\EmbedRendererFactory;

$renderer = EmbedRendererFactory::getRenderer();
$embedCode = $renderer->render(['viewId' => '38020fdf-5e11-411c-9116-1610339d59cf']);
```

Full params list:

| Parameter           | Type    | Default | Required | Description                                                                               |
|---------------------|---------|---------|----------|-------------------------------------------------------------------------------------------|
| `viewId`            | string  | -       | true     | Cappasity 3D View ID                                                                      |
| `width`             | string  | '100%'  | false    | iFrame width, px or %                                                                     |
| `height`            | string  | '600px' | false    | iFrame height, px or %                                                                    |
| `autoRun`           | boolean | false   | false    | Whether to start the player (widget) automatically or display the preview and play button |
| `closeButton`       | boolean | true    | false    | Show close button                                                                         |
| `logo`              | boolean | true    | false    | Show Cappasity logo                                                                       |
| `analytics`         | boolean | true    | false    | Enable analytics                                                                          |
| `autorotate`        | boolean | false   | false    | Start automatic rotation                                                                  |
| `autorotateTime`    | float   | 10      | false    | Rotation time of the full turn, seconds                                                   |
| `autorotateDelay`   | float   | 2       | false    | Delay if rotation was interrupted, seconds                                                |
| `autorotateDir`     | integer | 1       | false    | Autorotate direction (clockwise is `1`, counter-clockwise is `-1`)                        |
| `hideFullScreen`    | boolean | true    | false    | Hide fullscreen view button                                                               |
| `hideAutorotateOpt` | boolean | true    | false    | Hide autorotate button                                                                    |
| `hideSettingsBtn`   | boolean | false   | false    | Hide settings button                                                                      |
| `enableImageZoom`   | boolean | true    | false    | Enable zoom                                                                               |
| `zoomQuality`       | integer | 1       | false    | Zoom quality (SD is `1`, HD is `2`)                                                       |
| `hideZoomOpt`       | boolean | false   | false    | Hide zoom button                                                                          |
| `uiPadX`            | integer | 0       | false    | Horizontal (left, right) padding for player UI in pixels                                  |
| `uiPadY`            | integer | 0       | false    | Vertical (top, bottom) padding for player UI in pixels                                    |
| `enableStoreUrl`    | boolean | false   | false    | Whether to enable link to the store page                                                  |
| `storeUrl`          | string  | ''      | false    | Link to the store page                                                                    |
| `hideHints`         | boolean | false   | false    | Hide tutorial hints                                                                       |
| `startHint`         | boolean | false   | false    | Whether to hide 'rotate' hint                                                             |
| `arButton`          | boolean | true    | false    | Show AR button                                                                            |

```php
$embedCode = $renderer->render([
  'viewId' => '38020fdf-5e11-411c-9116-1610339d59cf',
  'width' => '100%',
  'height' => '600',
  'autoRun' => true,
  'closeButton' => false,
  'logo' => true,
  'analytics' => true,
  'autorotate' => false,
  'autorotateTime' => 10,
  'autorotateDelay' => 2,
  'autorotateDir' => 1,
  'hideFullScreen' => true,
  'hideAutorotateOpt' => true,
  'hideSettingsBtn' => false,
  'enableImageZoom' => true,
  'zoomQuality' => 2,
  'hideZoomOpt' => false,
  'uiPadX' => 10,
  'uiPadY' => 20,
  'enableStoreUrl' => true,
  'storeUrl' => 'http://gant.myshopify.com/products/1',
  'hideHints' => true,
  'startHint' => true,
  'arButton' => false,
]);
```

### Rendered code example
```html
<iframe
    allowfullscreen
    mozallowfullscreen="true"
    webkitallowfullscreen="true"
    width="100%"
    height="600"
    frameborder="0"
    style="border:0;"
    onmousewheel=""
    src="https://api.cappasity.com/api/player/38020fdf-5e11-411c-9116-1610339d59cf/embedded?autorun=1&closebutton=0&logo=1&autorotate=0&autorotatetime=10&autorotatedelay=2&autorotatedir=1&hidefullscreen=1&hideautorotateopt=1&hidesettingsbtn=0&enableimagezoom=1&zoomquality=2&hidezoomopt=0&analytics=1&uipadx=10&uipady=20&enablestoreurl=1&storeurl=http%3A%2F%2Fgant.myshopify.com%2Fproducts%2F1&hidehints=1&arbutton=0"
></iframe>
```

# PreviewImageSrcGenerator

## Generate preview link
* Set up `PreviewImageSrcGenerator`
* Provide Cappasity Account user alias and Cappasity 3D View ID (see how to retrieve [user alias](#get-user))
* Optionally, retrieve [the view data](#get-view-info) in order to get background color, in case your View has been set 
up with specific background color. 
* Generate links:
```php
use CappasitySDK\PreviewImageSrcGeneratorFactory as GeneratorFactory;
use CappasitySDK\PreviewImageSrcGenerator as Generator; 

$generator = new GeneratorFactory::getGeneratorInstance();

$originalPreview = $generator->generatePreviewImageSrc('useralias', '38020fdf-5e11-411c-9116-1610339d59cf');

// Explore and use \CappasitySDK\PreviewImageSrcGenerator class constants and static arrays with available options for 
// better code style:
$modifiedPreview = $generator->generatePreviewImageSrc('useralias', '38020fdf-5e11-411c-9116-1610339d59cf', [
    'format' => Generator::FORMAT_PNG, // 'png'
    'overlay' => Generator::OVERLAY_3DP_2X, // '3dp@2x'
    'modifiers' => [
        'background' => '#FFFFFF'
        'square' => 250,
        'quality' => 30, 
    ],
]);  
``` 

## Options list
| Parameter   | Description |
|-------------|-------------|
| `format`    | `jpeg`, `jpg`, `png`, `gif`, `webp` |
| `overlay`   | `3dp`, `3dp@2x`, `3dp@3x`[(see examples)](#overlays-examples) |
| `modifiers` | See the [list of available modifiers](#modifiers-list) and [examples](#modifiers-examples)  |

### Modifiers list

| Modifier     | Description                                                                                                               | Example                                    |
|--------------|---------------------------------------------------------------------------------------------------------------------------|--------------------------------------------|
| `crop`       | Crop type                                                                                                                 | `fit`, `fill`, `cut`, `pad`                |
| `height`     | Height, px                                                                                                                | 300                                        |
| `width`      | Width, px                                                                                                                 | 200                                        |
| `square`     | Width and height, px                                                                                                      | 250                                        |
| `top`        | Crop start from top, px                                                                                                   | 10                                         |
| `left`       | Crop start from left, px                                                                                                  | 10                                         |
| `gravity`    | Image placement within resulting image (center, north, south, west, east, north-east, north-west, south-east, south-west) | `c`, `n`, `s`, `w`, `e`, `ne`, `nw`, `se`, `sw` |
| `quality`    | Quality factor, bpp                                                                                                       | 100                                        |
| `background` | Background color (hash-prefixed 6-char hex value)                                                                         | `#ffffff`                                  |

### Modifiers examples

Full-size original previews links:
[THE RING (1012 x 1024 px)](https://api.cappasity.com/api/files/preview/cappasity/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | [THE WATCH (1024 x 526 px)](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfit/14b8f4f4-6e89-4a6f-8535-651c09d180b3)

By default `fit` crop is applied:

| square=300 | width=200, height=400, crop=`fit` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfit/34ddd305-bb53-4fd7-8dce-8555fc5a269f)
![](https://api.cappasity.com/api/files/preview/cappasity/s300/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfit/14b8f4f4-6e89-4a6f-8535-651c09d180b3)

Cut crop:

| square=300 | width=200, height=400, crop=`cut` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-ccut/34ddd305-bb53-4fd7-8dce-8555fc5a269f)
![](https://api.cappasity.com/api/files/preview/cappasity/s300/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-ccut/14b8f4f4-6e89-4a6f-8535-651c09d180b3)

Pad crop:

| square=300 | width=200, height=400, crop=`pad` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cpad/34ddd305-bb53-4fd7-8dce-8555fc5a269f)
![](https://api.cappasity.com/api/files/preview/cappasity/s300/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cpad/14b8f4f4-6e89-4a6f-8535-651c09d180b3)


Fill crop:

| square=300 | width=200, height=400, crop=`fill` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill/34ddd305-bb53-4fd7-8dce-8555fc5a269f)
![](https://api.cappasity.com/api/files/preview/cappasity/s300/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill/14b8f4f4-6e89-4a6f-8535-651c09d180b3)

You can change the starting coordinates of the crop using `left` and `top` modifiers:

| width=200, height=400, crop=`fill` | width=200, height=400, crop=`fill`, left=120 |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill-x120/34ddd305-bb53-4fd7-8dce-8555fc5a269f)

| width=200, height=400, crop=`fill` | width=200, height=400, crop=`fill`, left=273 |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill-x273/14b8f4f4-6e89-4a6f-8535-651c09d180b3)

Also you can make it with specifying the `gravity`:

| square=300 | width=200, height=400, crop=`fill`, gravity=`e` (east) |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/w200-h400-cfill-ge/34ddd305-bb53-4fd7-8dce-8555fc5a269f)

Choose reasonable preview `quality`:

| square=300 (resulted in ~4.6Kb) | square=300, quality=30 (resulted in ~1.5Kb) | square=300, quality=50 (resulted in ~2Kb) |
:-------------------------:|:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s300/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/s300-q30/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/s300-q50/34ddd305-bb53-4fd7-8dce-8555fc5a269f)

On the 3D Cappasity View upload a person chooses a respective background color. We store it in 3D View metadata.
See how to retrieve [the view data](#get-view-info), particularly background color.
You can use that color as preview background color, otherwise it would be white:

| width=200, height=300, crop=cpad | width=200, height=300, background=000000 |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/h300-w200-cpad/14b8f4f4-6e89-4a6f-8535-651c09d180b3) | ![](https://api.cappasity.com/api/files/preview/cappasity/h300-w200-cpad-b000000/14b8f4f4-6e89-4a6f-8535-651c09d180b3)


### Overlays examples
An overlay is an image that covers the original preview image.
Choose reasonable overlay quality:

##### 3dp
| square=200 | square=200, overlay=`3dp` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f?o=3dp) 

##### 3dp@2x
| square=200 | square=200, overlay=`3dp@2x` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f?o=3dp@2x)

##### 3dp@3x
| square=200 | square=200, overlay=`3dp@3x` |
:-------------------------:|:-------------------------:
![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f) | ![](https://api.cappasity.com/api/files/preview/cappasity/s200/34ddd305-bb53-4fd7-8dce-8555fc5a269f?o=3dp@3x)
