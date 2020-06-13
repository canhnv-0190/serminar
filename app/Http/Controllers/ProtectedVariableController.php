<?php

namespace App\Http\Controllers;

use App\Services\DemoService;
use App\User;

class ProtectedVariableController extends Controller
{
    protected $user;

    protected $service;

    public function __construct(DemoService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getInfoOfProtectedVariable($this->user->id);
    }
}
