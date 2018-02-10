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
```