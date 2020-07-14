## Guzzle factory for https://github.com/involta-design/universe

### Configure PSR-11 DI container

For example https://github.com/fkeloks/simple-container

```php
<?php

require_once 'vendor/autoload.php';

use Involta\Universe\RequestFactory;
use Psr\Http\Client\ClientInterface;
use SimpleContainer\ContainerBuilder;
use Universe\Api\GuzzleRequestFactory;

$configuration = [
    RequestFactory::class => [
        'class' => GuzzleRequestFactory::class,
        'params' => []
    ],
    ClientInterface::class => [
        'class' => \GuzzleHttp\Client::class,
        'params' => [
            'config' => [
                'verify' => false,
                'decode_content' => false
            ]
        ]
    ]
];

ContainerBuilder::build($configuration);


$container = ContainerBuilder::getContainer();

```


### Create api instance

```php

$api = (new Api($container))
    ->setUrl('https://api.url/api/v1')
    ->setTokenFile('/path/to/token.txt')
    ->setUsername('api_username')
    ->setPassword('api_password')
    ->setHttpAuthorisation('Basic base64_encoded_string');

```

### Api

```php
// User list
$limit = 100;
$offset = 0;

$api->clientsList($offset, $limit);

// user detail info
$userId = 1000;
$api->getClient($userId);

```