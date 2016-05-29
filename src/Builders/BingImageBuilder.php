<?php

namespace Bing\Builders;

use Bing\Auth\BingAuth;
use Bing\Proxy\BingProxy;
use Bing\Services\BingImageService;


class BingImageBuilder implements BingBuilder
{

    private $appID;

    private $builder;

    public function __construct($appID)
    {
        $this->appID = $appID;
    }

    public function build()
    {
        $auth = new BingAuth($this->appID);
        $proxy = BingProxy::create($auth);
        $service = new BingImageService($proxy);

        $this->builder = $service;
    }

    public function getService()
    {
        return $this->builder;
    }

}