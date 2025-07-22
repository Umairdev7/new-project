<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }

        if (!auth()->user()->follows->contains($user->id)) {
            auth()->user()->follows()->attach($user->id);
        }

        return back();
    }

    public function destroy(User $user)
    {
        auth()->user()->follows()->detach($user->id);

        return back();
    }
}
