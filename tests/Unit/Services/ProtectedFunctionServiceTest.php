<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Services\ProtectedFunctionService;
use Mockery as m;

class ProtectedFunctionServiceTest extends TestCase
{
    protected $service;

    public function setUp() :void
    {
        parent::setUp();        
    }

    // 
    // public function test_by_normal_way()
    // {
    //     $this->service = new ProtectedFunctionService();
    //     $a = 5;
    //     $b = 5;
    //     $result = $this->service->getInfomation($a, $b);
    // }

    public function test_protected_method_correct_way()
    {
        $this->service = m::mock(ProtectedFunctionService::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $a = 5;
        $b = 5;
        $result = $this->service->getInfomation($a, $b);
        $this->assertEquals($result, 25);
    }

    public function test_get_info_from_protected_method()
    {
        $this->service = m::mock(ProtectedFunctionService::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $a = 5;
        $b = 5;
        $this->service->shouldReceive('getInfomation')->andReturn(20);
        $result = $this->service->getInfoFromProtectedMethod($a, $b);
        $this->assertEquals($result, 'Result is:20');
    }
}
