<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomsPage;

class RoomController extends Controller
{
    public function show(Room $room)
    {
        $comments = $room->comments()->whereIsPublished(1)->with('rating')->orderByDesc('created_at')->get();
        $ratingsCount = $comments->count();
        $ratingValue = 0;
        $averageRating = 0;

        foreach ($comments as $comment) {
            $ratingValue += intval($comment->rating->rating);

        }

        if ($ratingValue > 0) {
            $averageRating = round(($ratingValue / $ratingsCount), 1);
        }

        return view('room', compact('room', 'comments', 'averageRating', 'ratingsCount'));
    }

    public function index()
    {
        $rooms = Room::query()->orderBy('category_id', 'ASC')->get();
        $pageData = RoomsPage::first();

        return view('rooms', compact('rooms', 'pageData'));
    }
}
