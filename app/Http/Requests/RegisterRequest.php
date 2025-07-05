<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
      public function rules(): array
    {
        return [
    'username' => ['required', 'string', 'min:2', 'max:12'],//入力必須、２文字以上、１２字以内
    'email'    => ['required',//入力必須、 
                    'string',
                    'email', //メールアドレスの形式
                    'min:5', 'max:40',//５文字以上４０文字以内、 
                    'unique:users,email'//登録済メールアドレス使用不可
                ],
    'password' => [
                'required',//入力必須
                'string',
                'min:8',//8文字衣装
                'max:20',//２０字以内
                'regex:/^[a-zA-Z0-9]+$/', // 英数字のみ
                'confirmed' // password_confirmation と一致しているか
    ],
  ];
}
    
     public function messages(): array
    {
        return [
            'username.required' => 'ユーザー名は必須です。',
            'email.required'    => 'メールアドレスは必須です。',
            'email.email'       => '正しい形式で入力してください。',
            'email.unique'      => 'このメールアドレスは既に登録されています。',
            'password.required' => 'パスワードは必須です。',
            'password.min'      => 'パスワードは8文字以上で入力してください。',
            'password.confirmed'=> '確認用パスワードが一致しません。',
        ];
    }
}
