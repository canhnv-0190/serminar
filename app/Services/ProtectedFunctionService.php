<?php

namespace App\Services;

use App\Services\BaseService;

class ProtectedFunctionService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getInfomation($a, $b)
    {
        return $a * $b;
    }

    public function getInfoFromProtectedMethod($a, $b)
    {
        $result = $this->getInfomation($a, $b);
        return 'Result is:' . $result;
    }
}
