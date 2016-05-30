<?php

namespace Bing\Services;

use GuzzleHttp\Psr7\Response;


interface BingImageServiceInterface
{

    /**
     * 
     * @param mixed $query
     * @return Response
     */
    public function getResponse($query);

}