<?php

namespace App\Services;

use App\Services\BaseService;

class DemoService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calculatorNumber($firstNumber, $seconNumber)
    {
        return $firstNumber + $seconNumber;
    }

    public function getInfoOfProtectedVariable($userId)
    {
        return $userId;
    }
}
