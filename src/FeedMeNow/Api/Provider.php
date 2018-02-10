<?php
namespace FeedMeNow\Api;

use Webmozart\Assert\Assert;
use FeedMeNow\Model\Provider\Mapper;
use Psr\Http\Message\ResponseInterface;

class Provider extends HttpApi
{
    public function get($address)
    {
        Assert::stringNotEmpty($address);
        $params = [
            'address' => $address
        ];
        $response = $this->httpGet('providers', $params);
        return $this->hydrateResponse($response, Mapper::class);
    }
}
