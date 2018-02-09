<?php
namespace FeedMeNow;

use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Http\Message\RequestFactory;
use Psr\Http\Message\RequestInterface;

class RequestBuilder
{
    private $requestFactory;
    private $multipartStreamBuilder;

    public function create($method, $uri, array $headers = [], $body = null)
    {
        return $this->getRequestFactory()->createRequest($method, $uri, $headers, $body);
    }

    private function getRequestFactory()
    {
        if (null === $this->requestFactory) {
            $this->requestFactory = MessageFactoryDiscovery::find();
        }
        return $this->requestFactory;
    }
}
