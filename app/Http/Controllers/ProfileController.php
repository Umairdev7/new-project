<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function show(User $user){
    //     return view('profile.show', compact('user'));
    // }
    public function show(User $user){
        $isFollowing = auth()->check() && auth()->user()->follows->contains($user->id);
        return view('profile.show', compact('user', 'isFollowing'));
    }
}
