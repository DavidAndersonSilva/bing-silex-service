<?php

namespace Tests\Unit;

use Bing\Services\BingImageService;
use Bing\Services\BingImageServiceInterface;
use Bing\Auth\BingAuth;
use Bing\Proxy\BingProxy;


class BingServiceTest extends \PHPUnit_Framework_TestCase
{

    private $appID;

    protected function setUp()
    {
        $this->appID = "";
    }

    public function testCreateBingService()
    {
        $auth = new BingAuth($this->appID);
        $proxy = BingProxy::create($auth);

        $service = new BingImageService($proxy);

        $this->assertInstanceOf(BingImageService::class, $service);

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

        $this->assertNotEmpty($response);
    }

}