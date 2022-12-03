<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Post;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $standardRooms = Room::query()
            ->where('category_id', 1)->get();

        $luxuryRooms = Room::query()
            ->where('category_id', 2)
            ->orWhere('category_id', 3)
            ->get();

        $news = Post::published()->paginate(4);

        $homeData = Home::first();

        return view('home', compact('standardRooms', 'luxuryRooms', 'news', 'homeData'));
    }

}
