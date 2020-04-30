<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AppController extends Controller
{
    public function version(): JsonResponse
    {
        return response()->json([
            'name' => 'podpoint',
            'version' => '1.0'
        ]);
    }

    public function web() : RedirectResponse
    {
        return redirect('api');
    }
}
