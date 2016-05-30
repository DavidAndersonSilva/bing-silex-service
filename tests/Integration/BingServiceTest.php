<?php

namespace Bing\Tests\Integration;

use Bing\Factories\BingImageServiceFactory;
use Bing\Services\BingImageServiceInterface;
use Psr\Http\Message\ResponseInterface;


class BingServiceTest extends \PHPUnit_Framework_TestCase
{

    private $appID;

    protected function setUp()
    {
        $configs = parse_ini_file(__DIR__ . "/config/bing_config.ini", true);
        $this->appID = $configs["bing_images"]["app_id"];
    }

    public function testCreateBingService()
    {
        $service = BingImageServiceFactory::create($this->appID);

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