<?php
namespace FeedMeNow\Hydrator;

use Psr\Http\Message\ResponseInterface;

class Hydrator
{
    public function hydrate(ResponseInterface $response, $class)
    {
        $body = $response->getBody()->__toString();
        $data = json_decode($body, true);
        $object = call_user_func($class.'::create', $data);
        return $object;
    }
}
