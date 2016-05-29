<?php

namespace Bing\Builders;

use Bing\Services\BingImageServiceInterface;


interface BingBuilder
{

    public function build();

    /**
     * @return BingImageServiceInterface
     */
    public function getService();

}