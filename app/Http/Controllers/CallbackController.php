<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallbackFormRequest;
use App\Mail\CallbackForm;
use App\Models\Callback;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller
{
    public function callback(CallbackFormRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Callback::create($formData);
        }

        foreach (['djtresk@gmail.com', 'tresk@icloud.com'] as $recipient) {
            Mail::to($recipient)->send(new CallbackForm($formData));
        }

        return response()->json('Спасибо за сообщение!', 200, array());
    }
}
