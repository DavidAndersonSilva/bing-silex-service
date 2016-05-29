<?php

namespace Tests\Unit;

use Bing\Auth\BingAuth;
use Bing\Auth\AuthInterface;


class AuthTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateAuthCredential()
    {
        $key = "123456789";
        $authCredential = new BingAuth($key);

        $this->assertInstanceOf(AuthInterface::class, $authCredential);
    }

}