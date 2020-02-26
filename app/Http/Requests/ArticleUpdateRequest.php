<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArticleUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'title' => 'required|unique:articles,title,' . $request->get('id') . '|max:127',
            'category_id' => 'required|numeric',
            'author' => 'required|max:31',
            'original' => 'required|numeric|between:0,1',
            'description' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
