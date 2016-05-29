<?php

namespace Bing\Auth;

class BingAuth implements AuthInterface
{

    private $appID;

    private $credencial;

    public function __construct($appID)
    {
        $this->appID = $appID;
        $this->build();
    }

    public function getCredencial()
    {
        return $this->credencial;
    }

    private function build()
    {
        $auth = base64_encode("{$this->appID}:{$this->appID}");

        $credencial = [
            "http" => [
                "request_fulluri" => true,
                "ignore_errors" => true,
                "header" => "Authorization: Basic {$auth}"
            ]
        ];

        $this->credencial = $credencial;
    }

}