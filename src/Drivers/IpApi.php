<?php

namespace Yesl357\Apidoc\Drivers;

use Yesl357\Apidoc\Curl;

class IpApi extends AbstractService {

    public $url = '';

    public function boot()
    {
        $baseUrl = 'http://ip-api.com';
        $this->url = $baseUrl;
    }


    public function locate($ip)
    {
        $url = $this->url.'/json/'.$ip.'?lang=zh-CN';
        $data = (new Curl())->get($url);

        return json_decode($data, true);
    }
}