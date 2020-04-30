<?php

namespace Yesl357\Apidoc;


class IpService {

    protected $config = [];

    protected $driver = '';

    protected $location = null;

    protected $remoteIp = null;

    public function __construct($driver = 'IpApi', $config = [])
    {
        $this->driver = $driver;
        $this->config = $config;

        $this->remoteIp = $this->getClientIp();
    }


    public function getLocation($ip = null)
    {
        $this->location = $this->find($ip);

        return $this->location;
    }

    private function find($ip = null)
    {
        $ip = $ip ? : $this->remoteIp;

        $location = $this->getDriver()->locate($ip);

        return $location;
    }

    public function getDriver() {
        $class = '\\Yesl357\\Apidoc\\Drivers\\'.$this->driver;



        if (class_exists($class, false)) {
            throw new \Exception("the {$this->driver} driver is invalid");
        }

        return new $class($this->config);
    }

    public function getClientIp() {
        $remotesKeys = [
            'HTTP_X_FORWARDED_FOR',
            'HTTP_CLIENT_IP',
            'HTTP_X_REAL_IP',
            'HTTP_X_FORWARD',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR',
            'HTTP_X_CLUSTER_CLIENT_IP',
        ];

        foreach ($remotesKeys as $key) {
            if ($address = getenv($key)) {
                $ips = explode(',', $address);
                foreach ($ips as $ip) {
                    if ($this->isValid($ip)) {
                        return $ip;
                    }
                }
            }
        }

        return '127.0.0.1';
    }

    private function isValid($ip) {
        return true;
    }

}