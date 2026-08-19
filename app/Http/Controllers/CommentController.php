<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Mail\CommentForm;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

final class CommentController
{
    public function comment(CommentFormRequest $request)
    {
        $formData = $request->validated();

        if ($formData) {
            Comment::query()
                ->create([
                    'username' => $formData['username'],
                    'review' => $formData['review'],
                    'room_id' => $formData['room_id'],
                ]);
            $comment = Comment::latest()->first();
            $comment->rate($formData['rating']);

            $mailData = [
                'username' => $formData['username'],
                'review' => $formData['review'],
                'rating' => $formData['rating'],
            ];

            foreach ([config('mail.admin_email'), config('mail.manager_email')] as $recipient) {
                Mail::to($recipient)->send(new CommentForm($mailData));
            }
        }

        return response()->json('Спасибо за отзыв!', 200, []);
    }
}
