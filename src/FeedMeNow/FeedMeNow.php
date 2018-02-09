<?php
namespace FeedMeNow;

use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use FeedMeNow\Hydrator\Hydrator;

class FeedMeNow
{
    public function __construct(
        HttpClient $httpClient = null,
        Hydrator $hydrator = null,
        RequestBuilder $requestBuilder = null
    ) {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestBuilder = $requestBuilder ?: new RequestBuilder();
        $this->hydrator = $hydrator ?: new Hydrator();
    }

    public function providers()
    {
        return new Api\Provider($this->httpClient, $this->requestBuilder, $this->hydrator);
    }
}
