<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
            'phone.required' => 'Введите телефон',
            'message.required' => 'Введите сообщение',
            'message.min' => 'Сообщение должно быть не менее 10 знаков',
        ];
    }
}
