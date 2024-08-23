<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() // 現ログインユーザーがこのリクエストを実行する権限があるか否か
    {
        return false; // 常に通す
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // 各入力フォームへのルールを記述
    {
        return [
            'episode' => 'required|text',
            'image' => 'verchar',
        ];
    }
}
