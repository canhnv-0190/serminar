<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Http\Controllers\DemoController;

class DemoControllerTest extends TestCase
{
    public function setUp() :void
    {
        parent::setUp();
    }

    public function test_index_function()
    {
        $controller = new DemoController();
        $result = $controller->index();
        $expectedResult = 'This is demo function';
        $this->assertEquals($result, $expectedResult);
    }

}
