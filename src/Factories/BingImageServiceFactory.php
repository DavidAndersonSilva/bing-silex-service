<?php

namespace Bing\Factories;

use GuzzleHttp\Client as HttpClient;
use Bing\Services\BingImageService;


abstract class BingImageServiceFactory
{

    const API_URI = "https://api.datamarket.azure.com/Bing/Search/v1/Image";

    /**
     * 
     * @param string $appID
     * @return BingImageService
     */
    public static function create($appID)
    {
        $auth = base64_encode("{$appID}:{$appID}");

        $config = [
            "base_uri" => self::API_URI,
            "verify" => false,
            "headers" => [
                "Authorization" => "Basic {$auth}"
            ]
        ];

        $httpClient = new HttpClient($config);

        $service = new BingImageService($httpClient);

        return $service;
    }

}