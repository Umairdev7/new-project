<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FriendRequest;

class ProfileController extends Controller
{
    // public function show(User $user){
    //     return view('profile.show', compact('user'));
    // }

    // 2

    // public function show(User $user){
    //     $isFollowing = auth()->check() && auth()->user()->follows->contains($user->id);
    //     return view('profile.show', compact('user', 'isFollowing'));
    // }

    // 3

    // public function show(User $user){
    //     $currentUser = auth()->user();

    //     $isFollowing = $currentUser->follows()
    //         ->where('following_user_id', $user->id)
    //         ->exists();

    //     // Friend request sent by logged-in user
    //     $friendRequest = FriendRequest::where('from_user_id', $currentUser->id)
    //         ->where('to_user_id', $user->id)
    //         ->where('status', 'pending')
    //         ->first();

    //     // Friend request received by logged-in user
    //     $incomingRequest = FriendRequest::where('from_user_id', $user->id)
    //         ->where('to_user_id', $currentUser->id)
    //         ->where('status', 'pending')
    //         ->first();

    //     return view('profile.show', compact('user', 'isFollowing', 'friendRequest', 'incomingRequest'));
    // }

    // 4

public function show(User $user)
{
    $currentUser = auth()->user();
    $isFollowing = $currentUser && $currentUser->follows->contains($user->id);

    // Check if current user sent a request to this profile
    $friendRequest = FriendRequest::where('from_user_id', $currentUser->id)
        ->where('to_user_id', $user->id)
        ->where('status', 'pending')
        ->first();

    // Check if current user received a request from this profile
    $incomingRequest = FriendRequest::where('from_user_id', $user->id)
        ->where('to_user_id', $currentUser->id)
        ->where('status', 'pending')
        ->first();

    // $friends = $user->friends(); // returns a query builder
    // $friends = $user->friends()->get(); // fetch actual results
    $isFriend = $currentUser->friends()->contains($user->id);


    return view('profile.show', compact(
        'user',
        'isFollowing',
        'friendRequest',
        'incomingRequest',
        'isFriend'
    ));
}

}
