<?php
namespace FeedMeNow\Api;

use Webmozart\Assert\Assert;
use FeedMeNow\Model\Search\Mapper;
use Psr\Http\Message\ResponseInterface;

class Search extends HttpApi
{
    public function get($term, $address)
    {
        Assert::stringNotEmpty($term);
        Assert::stringNotEmpty($address);
        $params = [
            'terms' => $term,
            'address' => $address
        ];
        $response = $this->httpGet('search', $params);
        return $this->hydrateResponse($response, Mapper::class);
    }
}
