<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

final class ContactController
{
    public function index()
    {
        return view('contacts');
    }

    public function contact(ContactFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $formData = $request->validated();

        if ($formData) {
            Contact::create($formData);
        }

        foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
            Mail::to($recipient)->send(new ContactForm($formData));
        }

        return response()->json('Спасибо за сообщение!', 200, []);
    }
}
