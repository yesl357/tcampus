<?php

namespace Yesl357\Apidoc\Drivers;

interface ServiceInterface {

    public function boot();

    public function locate($ip);
    
}