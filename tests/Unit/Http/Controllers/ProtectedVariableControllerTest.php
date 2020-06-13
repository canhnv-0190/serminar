<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Http\Controllers\ProtectedVariableController;
use App\Services\DemoService;
use Mockery as m;
use ReflectionClass;

class ProtectedVariableControllerTest extends TestCase
{
	protected $demoService;

    public function setUp() :void
    {
        parent::setUp();
        $this->demoService = m::mock(DemoService::class);
    }

    // public function test_index_function_without_mockery()
    // {
    //     $expectedResult = 15;
    //     $this->demoService->shouldReceive('getInfoOfProtectedVariable')->andReturn($expectedResult);
    //     $controller = new ProtectedVariableController($this->demoService);
    //     $result = $controller->index();
    //     $this->assertEquals($result, $expectedResult);
    // }

    // public function test_index_with_reflection_class()
    // {
    // 	$userMock = m::mock(User::class)->makePartial();
    // 	$userMock->id = 1;

    // 	$expectedResult = 20;
    //     $this->demoService->shouldReceive('getInfoOfProtectedVariable')->andReturn($expectedResult);

    // 	$controller = new ProtectedVariableController($this->demoService);

    // 	$controllerReflection = new ReflectionClass(ProtectedVariableController::class);
    // 	$user = $controllerReflection->getProperty('user');
    //     $user->setAccessible(true);
    //     $user->setValue($controller, $userMock);

    //     $result = $controller->index();
    //     $this->assertEquals($result, $expectedResult);
    // }
}
