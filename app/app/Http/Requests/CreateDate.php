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
        return true; // false 403エラー
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // 各入力フォームへのルールを記述
    {
        return [
            'comment' => 'required',
        ];
    }
}
