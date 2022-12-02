<?php

namespace App\Http\Controllers;

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

        return view('home', compact('standardRooms', 'luxuryRooms'));
    }

}
