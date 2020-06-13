<?php

namespace App\Http\Controllers;

use App\Services\DemoService;

class Demo1Controller extends Controller
{

    protected $service;

    public function __construct(DemoService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        $firstNumber = 5;
        $secondNumber = 10;
        return $this->service->calculatorNumber($firstNumber, $secondNumber);
    }
}
