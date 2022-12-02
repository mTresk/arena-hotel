<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

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
        }

        return response()->json('Спасибо за отзыв!', 200, array());
    }
}
