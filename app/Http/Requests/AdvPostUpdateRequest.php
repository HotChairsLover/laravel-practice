<?php

namespace App\Http\Requests;

class AdvPostUpdateRequest extends AdvBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:200',
            'slug' => 'max:200',
            'price' => 'required|integer|max:999999999',
            'description' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:adv_categories,id',
        ];
    }
}
