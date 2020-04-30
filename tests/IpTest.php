<?php

namespace Yesl357\Apidoc\Tests;

use PHPUnit\Framework\TestCase;
use Yesl357\Apidoc\IpService;

class IpTest extends TestCase {


    public function testGetLocation() {
        $ipService = new IpService();

        $ip = '59.57.155.190';
        $location = $ipService->getLocation($ip);

        $this->assertEquals($location['status'], 'success');
//        $this->assertSame($location['status'], 'success');
    }
}