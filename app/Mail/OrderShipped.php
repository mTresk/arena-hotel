<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $formData) {}

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
