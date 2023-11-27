<?php

namespace App\Http\Requests\Post;

use Illuminate\Validation\Rule;

class StorePostRequest extends PostRequest
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
        $rules = parent::rules();

        $rules['slug'][] = Rule::unique('posts', 'slug');
        $rules['thumbnail'][]='required';

        return $rules;
    }
}
