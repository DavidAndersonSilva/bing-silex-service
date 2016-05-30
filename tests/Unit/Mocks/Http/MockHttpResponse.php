<?php

namespace Bing\Tests\Unit\Mocks\Http;

use GuzzleHttp\Psr7\Response;


abstract class MockHttpResponse
{

    public static function getMockHttpSuccess()
    {
        $resultSet = ["d" =>
            [
                "resultSet" => [
                    "__metadata" =>
                    [
                        "uri" => "https://api.datamarket.azure.com/Data.ashx/Bing/Search/v1/Image?Query='Symfony'&\$skip=49&\$top=1",
                        "type" => "ImageResult"
                    ],
                    "ID" => "6722076d-c169-4fb8-ba1a-5a0dfb7ab7be",
                    "Title" => "Symfony with Bootstrap",
                    "MediaUrl" => "http://www.w3programmers.com/wp-content/uploads/2014/12/symfony-bootstrap.png",
                    "SourceUrl" => "http://www.w3programmers.com/symfony-bootstrap/",
                    "DisplayUrl" => "www.w3programmers.com/symfony-bootstrap",
                    "Width" => "1024",
                    "Height" => "236",
                    "FileSize" => "39362",
                    "ContentType" => "image/png",
                    "Thumbnail" =>
                    [
                        "__metadata" => ["type" => "Bing.Thumbnail"],
                        "MediaUrl" => "http://ts4.mm.bing.net/th?id=OIP.M30b692324f35a0eab89f1fba1023c752o0&pid=15.1",
                        "ContentType" => "image/jpg",
                        "Width" => "300",
                        "Height" => "69",
                        "FileSize" => "4445"
                    ]
                ]
            ]
        ];

        return new Response(200, [], json_encode($resultSet));
    }

}