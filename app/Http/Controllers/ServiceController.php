<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;

final class ServiceController
{
    public function show($slug, Service $service)
    {
        $service = $service->where('slug', $slug)->firstOrFail();

        return view('service', compact('service'));
    }
}
