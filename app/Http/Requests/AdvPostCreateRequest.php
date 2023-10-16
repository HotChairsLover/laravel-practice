<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        if($user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

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

    public function messages()
    {
        return [
          'title.required' => 'Введите заголовок статьи',
          'description.min' => 'Минимальная длина описания [:min] символов',
        ];
    }

    public function attributes()
    {
        return [
          'title' => 'Заголовок',
        ];
    }

}
