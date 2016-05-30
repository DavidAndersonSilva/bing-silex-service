<?php

namespace Bing\Tests\Unit\Mocks\Http;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client as HttpClient;


abstract class MockHttpClient
{

    public static function getMock($responses = [])
    {
        $mock = new MockHandler($responses);
        $handler = HandlerStack::create($mock);
        $httpClient = new HttpClient([
            "handler" => $handler
        ]);

        return $httpClient;
    }

}