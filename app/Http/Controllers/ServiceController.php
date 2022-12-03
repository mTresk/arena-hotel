<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($slug, Service $service)
    {
        $service = $service->where('slug', $slug)->firstOrFail();

        return view('service', compact('service'));
    }
}
