<?php
namespace FeedMeNow\Api;

use Http\Client\HttpClient;
use FeedMeNow\Hydrator\Hydrator;
use FeedMeNow\RequestBuilder;
use Psr\Http\Message\ResponseInterface;

class HttpApi
{
    private $httpClient;
    private $urlRoot = 'https://feedmenow.io/api/';
    protected $hydrator;
    protected $requestBuilder;

    public function __construct(HttpClient $httpClient, RequestBuilder $requestBuilder, Hydrator $hydrator)
    {
        $this->httpClient = $httpClient;
        $this->requestBuilder = $requestBuilder;
        $this->hydrator = $hydrator;
    }

    protected function hydrateResponse(ResponseInterface $response, $class)
    {
        return $this->hydrator->hydrate($response, $class);
    }

    protected function httpGet($url, array $params = [], array $requestHeaders = [])
    {
        $url = $this->urlRoot . $url;
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        $response = $this->httpClient->sendRequest(
            $this->requestBuilder->create('GET', $url, $requestHeaders)
        );
        return $response;
    }
}
