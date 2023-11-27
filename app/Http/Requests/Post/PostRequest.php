<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required'],
            'title' => ['required', 'min:6'],
            'slug' => ['required', 'min:6'],
            'excerpt' => ['required', 'min:6'],
            'thumbnail' => ['image'],
            'body' => ['required', 'min:6'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ];
    }
}
