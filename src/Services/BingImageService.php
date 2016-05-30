<?php

namespace Bing\Services;

use Bing\Proxy\ProxyInterface;
use GuzzleHttp\Client as HttpClient;


class BingImageService implements BingImageServiceInterface
{

    /**
     *
     * @var ProxyInterface
     */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->setHttpClient($httpClient);
    }

    public function getResponse($query)
    {
        $query = urlencode("'{$query}'");
        $requestUrl = "?\$format=json&Query={$query}";

        $response = $this->getHttpClient()->get($requestUrl);
        return $response;
    }

    /**
     * 
     * @return HttpClient
     */
    private function getHttpClient()
    {
        return $this->httpClient;
    }

    private function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

}