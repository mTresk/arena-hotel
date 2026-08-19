<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Policy;

final class PolicyController
{
    public function index()
    {
        $content = Policy::firstOrFail();

        return view('policy', compact('content'));
    }
}
