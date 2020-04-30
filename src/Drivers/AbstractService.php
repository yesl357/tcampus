<?php

namespace Yesl357\Apidoc\Drivers;

abstract class AbstractService  implements ServiceInterface {

    protected $config;


    public function __construct($config = [])
    {
        $this->config = $config;

        $this->boot();
    }

    public function boot() {

    }
}