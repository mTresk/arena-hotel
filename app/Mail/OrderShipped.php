<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Сообщение из формы контактов с сайта Гостиница «Арена»',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-form',
            with: ['formData' => $this->formData]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
