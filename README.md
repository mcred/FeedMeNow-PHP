# PHP Client for feedmenow.io APIs
[![Build Status](https://travis-ci.org/mcred/FeedMeNow-PHP.svg?branch=master)](https://travis-ci.org/mcred/FeedMeNow-PHP)
[![Maintainability](https://api.codeclimate.com/v1/badges/6e486d9f3cdb92aa7aab/maintainability)](https://codeclimate.com/github/mcred/FeedMeNow-PHP/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/6e486d9f3cdb92aa7aab/test_coverage)](https://codeclimate.com/github/mcred/FeedMeNow-PHP/test_coverage)

### Installation
```bash
composer require mcred/feed-me-now-api
```

### Example Usage
```php
require "./vendor/autoload.php";

$feedMeNow = new FeedMeNow\FeedMeNow();
$response = $feedMeNow->providers()->get("Atlanta, GA");
$providers = $response->getData();
foreach($providers as $provider)
{
    echo $provider->getName();
}

```

### Available Methods
```php
$feedMeNow->providers()->get("Atlanta,GA");
$feedMeNow->search()->get("Pizza", "Atlanta,GA");
```

### Acknowledgements
I wanted to build a library with PSR-7 HTTP Message Interfaces and took a lot of inspiration from the [Mailgun PHP Client](https://github.com/mailgun/mailgun-php). They did a great job building a SDK and you should check it out if you want to see some really great code. 
