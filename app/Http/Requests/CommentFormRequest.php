<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:55'],
            'review' => ['required', 'string', 'min:10'],
            'rating' => ['required', 'integer'],
            'room_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Введите имя',
            'review.required' => 'Введите отзыв',
            'review.min' => 'Сообщение должно быть не менее 10 знаков',
        ];
    }
}
