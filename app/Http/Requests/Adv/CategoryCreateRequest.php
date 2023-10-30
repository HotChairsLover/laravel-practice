<?php

namespace App\Http\Requests\Adv;

class CategoryCreateRequest extends AdvBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'description' => 'string|max:500|min:3',
            'parent_id' => 'required|integer|exists:adv_categories,id',
        ];
    }
}
