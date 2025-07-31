<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id(); // 自分のIDを取得して、uniqueバリデーションで除外

        return [
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => [
                'required',
                'string',
                'email',
                'min:5',
                'max:40',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'max:20',
                'regex:/^[a-zA-Z0-9]+$/',
                'confirmed',
            ],
            'bio' => ['nullable', 'string', 'max:150'],
            'icon_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,bmp,gif,svg',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'ユーザー名は必須です。',
            'username.min' => 'ユーザー名は2文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以内で入力してください。',

            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '正しい形式で入力してください。',
            'email.min' => 'メールアドレスは5文字以上で入力してください。',
            'email.max' => 'メールアドレスは40文字以内で入力してください。',
            'email.unique' => 'このメールアドレスは既に使用されています。',

            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以内で入力してください。',
            'password.regex' => 'パスワードは半角英数字のみ使用できます。',
            'password.confirmed' => '確認用パスワードが一致しません。',

            'bio.max' => '自己紹介は150文字以内で入力してください。',

            'icon_image.image' => '画像ファイルをアップロードしてください。',
            'icon_image.mimes' => '画像は jpg, jpeg, png, bmp, gif, svg のいずれかにしてください。',
            'icon_image.max' => '画像サイズは2MB以内にしてください。',
        ];
    }
}