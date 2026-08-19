<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CallbackFormRequest;
use App\Mail\CallbackForm;
use App\Models\Callback;
use Illuminate\Support\Facades\Mail;

final class CallbackController
{
    public function callback(CallbackFormRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Callback::create($formData);
        }

        foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
            Mail::to($recipient)->send(new CallbackForm($formData));
        }

        return response()->json('Спасибо за сообщение!', 200, []);
    }
}
