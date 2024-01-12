<?php

namespace App\Http\Requests;

class ProfileRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
        ];
    }
}
