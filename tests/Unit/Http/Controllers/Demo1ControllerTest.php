<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Http\Controllers\Demo1Controller;
use App\Services\DemoService;
use Mockery as m;

class Demo1ControllerTest extends TestCase
{
    protected $demoService;

    public function setUp() :void
    {
        parent::setUp();
        $this->demoService = new DemoService();
    }

    public function test_index_function_without_mockery()
    {
        $expectedResult = 15;
        $controller = new Demo1Controller($this->demoService);
        $result = $controller->index();
        $this->assertEquals($result, 15);
    }

    // public function test_index_function_with_mockery()
    // {
    //     $expectedResult = 20;
    //     $serviceMock = m::mock(DemoService::class);
    //     $serviceMock->shouldReceive('calculatorNumber')->andReturn($expectedResult);
    //     $controller = new Demo1Controller($serviceMock);
    //     $result = $controller->index();
    //     $this->assertEquals($result, $expectedResult);
    // }
}
