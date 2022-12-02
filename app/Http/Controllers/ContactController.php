<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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

        foreach (['djtresk@gmail.com', 'tresk@icloud.com'] as $recipient) {
            Mail::to($recipient)->send(new ContactForm($formData));
        }

        return response()->json('Спасибо за сообщение!', 200, array());
    }
}
