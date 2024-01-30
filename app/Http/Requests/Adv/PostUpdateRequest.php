<?php

namespace App\Http\Requests\Adv;

class PostUpdateRequest extends AdvBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'min:3|max:200',
            'slug' => 'max:200',
            'price' => 'integer|max:999999999',
            'description' => 'string|min:5|max:10000',
            'category_id' => 'integer|exists:adv_categories,id',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
