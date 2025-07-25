<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;

class FriendRequestController extends Controller
{


    public function index(){
        $friendRequests  = FriendRequest::where('to_user_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        return view('friend_requests.index', compact('friendRequests'));
    }


    public function send(Request $request, $toUserId){
        $fromUserId = auth()->id();

        // Prevent duplicate requests
        $exists = FriendRequest::where('from_user_id', $fromUserId)
            ->where('to_user_id', $toUserId)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', 'Friend request already sent.');
        }

    // Prevent sending request to self
    if ($fromUserId == $toUserId) {
        return back()->with('error', 'You cannot send a friend request to yourself.');
    }

    FriendRequest::create([
        'from_user_id' => $fromUserId,
        'to_user_id' => $toUserId,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Friend request sent.');
}

    // public function accept(Request $request, $requestId){
    //     $friendRequest = FriendRequest::findOrFail($requestId);

    //     if ($friendRequest->to_user_id !== auth()->id()) {
    //         return back()->with('error', 'Unauthorized action.');
    //     }

    //     $friendRequest->update([
    //     'status' => 'accepted',
    //     ]);

    // // Optionally: Create reciprocal relationship
    // // $user = auth()->user();
    // // $user->friends()->attach($friendRequest->from_user_id);

    //     return back()->with('success', 'Friend request accepted.');
    // }

    // FriendRequestController.php
    public function accept($id){
        $request = FriendRequest::findOrFail($id);

        // Only allow the receiver to accept
        if ($request->to_user_id !== auth()->id()) {
            abort(403);
        }

        $request->status = 'accepted';
        $request->save();

        return redirect()->back()->with('success', 'Friend request accepted.');
    }


    public function decline(Request $request, $requestId){
        $friendRequest = FriendRequest::findOrFail($requestId);

        if ($friendRequest->to_user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $friendRequest->update([
            'status' => 'declined',
        ]);

        return back()->with('success', 'Friend request declined.');
    }
}
