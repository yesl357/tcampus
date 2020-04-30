<?php

namespace Yesl357\Apidoc;


//简易的curl请求
class Curl {

    public function get($url, $headers = []) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_HEADER => $headers
        ]);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');

        $response = curl_exec($curl);

        return $response;
    }
}