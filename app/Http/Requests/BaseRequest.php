<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; //!is_null(Auth::user());
    }
}
