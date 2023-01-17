<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusPostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class StatusController extends Controller
{
    public function store(StatusPostRequest $request)
    {
        $user = $request->user();
        $validated = $request->validated();

        $user->status()->create([
            'description' => $validated['description'],
        ]);

        return Redirect::route('dashboard')->with('status', 'status-updated');
    }

    public function redirect(Request $request)
    {
        return Redirect::route('dashboard');
    }
}
