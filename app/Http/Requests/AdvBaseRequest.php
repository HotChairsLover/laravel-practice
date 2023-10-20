<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvBaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !is_null(Auth::user());
    }
}
