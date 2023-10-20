<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
}
