<?php

namespace Bing\Services;

use Bing\Proxy\ProxyInterface;


class BingImageService implements BingImageServiceInterface
{

    private $api = "https://api.datamarket.azure.com/Bing/Search/v1/Image";

    /**
     *
     * @var ProxyInterface
     */
    private $proxy;

    public function __construct(ProxyInterface $proxy)
    {
        $this->setProxy($proxy);
    }

    public function getResponse($query)
    {
        $context = $this->getProxy()->connect();

        $query = urlencode("'{$query}'");
        $requestUrl = "{$this->api}?\$format=json&Query={$query}";
        $response = file_get_contents($requestUrl, 0, $context);

        return $response;
    }

    private function getProxy()
    {
        return $this->proxy;
    }

    private function setProxy(ProxyInterface $proxy)
    {
        $this->proxy = $proxy;
    }

}