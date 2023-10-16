<?php

namespace App\Http\Controllers\Adv\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Adv\BaseController as GuestBaseController;

abstract class BaseController extends GuestBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
}
