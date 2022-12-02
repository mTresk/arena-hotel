<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Mail\CommentForm;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
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
                'rating' => $formData['rating']
            ];

            foreach (['djtresk@gmail.com', 'tresk@icloud.com'] as $recipient) {
                Mail::to($recipient)->send(new CommentForm($mailData));
            }
        }


        return response()->json('Спасибо за отзыв!', 200, array());
    }
}
