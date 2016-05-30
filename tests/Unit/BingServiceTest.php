<?php

namespace Bing\Tests\Unit;

use Bing\Services\BingImageService;
use Bing\Services\BingImageServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Bing\Tests\Unit\Mocks\Http\MockHttpClient;
use Bing\Tests\Unit\Mocks\Http\MockHttpResponse;


class BingServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateBingService()
    {
        $responses = [MockHttpResponse::getMockHttpSuccess()];
        $httpClient = MockHttpClient::getMock($responses);

        $service = new BingImageService($httpClient);

        $this->assertInstanceOf(BingImageServiceInterface::class, $service);

        return $service;
    }

    /**
     * 
     * @depends testCreateBingService
     */
    public function testBingImageServiceGetResponse(BingImageServiceInterface $service)
    {
        $query = "Symfony";
        $response = $service->getResponse($query);

        $body = $response->getBody() . '';

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($body);
        $this->assertEquals(200, $response->getStatusCode());
    }

}