# Migration to Sentry 2.x

Currently we use Sentry PHP SDK version 1.10. A new major version has been released, which is a complete rewrite of the SDK based on a new [Unifined API](https://docs.sentry.io/development/sdk-dev/unified-api/) concept.


The [Migration guide](https://github.com/getsentry/sentry-php/blob/master/UPGRADE-2.0.md) strongly recommends Static API usage over the dynamic one, but since Cappasity SDK is a third-party library we need to keep its instance from being volatile and dependent from the consuming code. That's why we favor its dynamic API.

The central point of the Sentry SDK is the `Hub`, it is an object that manages the state and is being  used to route events to Sentry. The `Hub` holds the `Scope` stack. The `Scope` should hold useful information that should be sent along with the event. The `Client` should be bound to the `Hub` so that it could become discoverable through the Hub and transfer requests to Sentry. 

The scope of changes is limited to the `ReportableClient` and the `ClientFactory` classes, which optionally decorates instantiated `Client` with `ReportableClient` decorator.

## `ReportableClient`

### __construct(ClientInterface $client, \Sentry\HubInterface $sentryHub)

ReportableClient now requires to be instantiated with an object that implements the `HubInterface`. The `\Sentry\Hub` is a final class so it could not be extended, while the `\Sentry\HubInterface` provides all necessary method interfaces and still allows some flexibility.

### `private $sentryHub` property
New property that will hold the `Hub`.

### `captureException()` method usage
The Raven_Client::captureException method has changed its signature. No changes required in our case, because currently we pass only the first argument -- an `$exception` instance -- which has not changed.

The `Hub` interface provides the `captureException` method, which is supposed to proxy the capturing to the Client while providing current `Scope`. 

Before:
```php
// inside the `catch` block
$this->sentryClient->captureException($e);
```

After:
```php
// same `catch` block
$this->sentryHub->captureException($e);
``` 

## `ClientFactory`
These changes affect how the Cappasity SDK `Client` is being created. Now, the `ClientFactory` is required to create:
 * a `\Sentry\State\Scope` instance, in order to hold some general SDK-level information like SDK version
 * a `\Sentry\Client`, instantiated using `\Sentry\ClientBuilder` class
 * a `\Sentry\State\Hub` instance with `Scope` and `Client` passed to it as arguments
 
 The `ClientFactory` default options used to reflect constructors structure so that the options management could be as thin as possible, so it should be changed like this:
Before:
```php
private static $defaultOptions = [
    // ... other options
    'ravenClient' => [
        'optionsOrDSN' => ReportableClient::CAPPASITY_DSN,
        'options' => [
            'timeout' => 2,
        ],
    ],
    // ... other options
];
```

After:
```php
private static $defaultOptions = [
    // ... other options
    'reportableClient' => [
        'sentryHub' => [
            'dsn' => ReportableClient::CAPPASITY_DSN,
        ]
    ],
    // ... other options
];
```

You may notice that the option `timeout` has disappeared. There is no direct and obvious way to set up the request timeout now. But in case we really need it, I believe we could manually patch the HTTP transport which is created as an extension with the `\Sentry\Client`, but it implies some further research.
