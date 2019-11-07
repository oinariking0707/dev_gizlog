<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'tag_category_id' => 'required',
            'title'           => 'required|max:30',
            'comment'         => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'required'           => '入力必須の項目です',
            'title.max'          => '30文字以内で入力して下さい',
            'comment.max'          => '1000文字以内で入力して下さい',
        ];
    }
}

