<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentForm extends Mailable
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
            subject: 'Комментарий на сайте Гостиница «Арена»',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.comment-form',
            with: ['formData' => $this->formData]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
