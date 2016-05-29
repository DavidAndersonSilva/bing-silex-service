<?php

namespace Tests\Unit;

use Bing\Proxy\BingProxy;
use Bing\Proxy\ProxyInterface;
use Bing\Auth\AuthInterface;


class ProxyTest extends \PHPUnit_Framework_TestCase
{

    public function testProxyServiceCreate()
    {
        $auth = $this->getMockBuilder(AuthInterface::class)->getMock();
        $proxy = BingProxy::create($auth);

        $this->assertInstanceOf(ProxyInterface::class, $proxy);

        return $proxy;
    }

}