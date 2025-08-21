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

    // Show all posts
    $tweets = $user->tweets()->with('user')->latest()->paginate(10);



    return view('profile.show', compact(
        'user',
        'isFollowing',
        'friendRequest',
        'incomingRequest',
        'isFriend',
        'tweets'
    ));
}

    public function friends(User $user){
        // $friends = $user->friends()->paginate(12);
        $friends = $user->friends();
        return view('users.friends', compact('user', 'friends'));
    }


    // public function show(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('profile.show', compact('user'));
    // }

    // public function updateHeaderPhoto(Request $request){
    //     $user = auth()->user();

    //     // If uploading a new file
    //     if ($request->hasFile('header_photo')) {
    //         $path = $request->file('header_photo')->store('headers', 'public');
    //         $user->header_photo = $path;
    //     }
    //     // If choosing from existing photo
    //     elseif ($request->photo_url) {
    //         // Remove domain/public path if needed
    //         $relativePath = str_replace(asset('storage/'), '', $request->photo_url);
    //         $user->header_photo = $relativePath;
    //     }

    //     $user->save();

    //     return response()->json(['status' => 'success']);
    // }


}
