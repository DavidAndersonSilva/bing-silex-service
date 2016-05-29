<?php

namespace Bing\Proxy;

use Bing\Auth\AuthInterface;


class BingProxy implements ProxyInterface
{

    private $auth;

    /**
     * 
     * @param AuthInterface $auth
     * @return ProxyInterface
     */
    public static function create(AuthInterface $auth)
    {
        return new BingProxy($auth);
    }

    private function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function connect()
    {
        $context = stream_context_create($this->auth->getCredencial());
        return $context;
    }

}