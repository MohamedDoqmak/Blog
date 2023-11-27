<?php

namespace App\Http\Requests\Post;

use Illuminate\Validation\Rule;

class UpdatePostRequest extends PostRequest
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
        $post_id=request()->get('post_id');
        $rules = parent::rules();

        $rules['slug'][]=Rule::unique('posts','slug')->ignore($post_id);

        return $rules;
    }
}
