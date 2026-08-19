<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class CommentForm extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $formData) {}

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
