<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }


    public function messages(): array
{
    return [
        'email.required'    => 'メールアドレスは必須です。',
        'email.email'       => '正しいメールアドレスの形式で入力してください。',
        'email.exists'      => 'このメールアドレスは登録されていません。',
        'password.required' => 'パスワードは必須です。',
        'password.min'      => 'パスワードは8文字以上で入力してください。',
    ];
}

  public function authenticate(): void
    {
        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('認証に失敗しました。メールアドレスまたはパスワードが間違っています。'),
            ]);
        }
    }
}