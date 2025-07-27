<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function index(){
        return view('profile.bokkmarks');
    }

    public function store(Request $request){

        $request->validate([
        'tweet_id' => 'required|exists:tweets,id'
    ]);

    $bookmark = Bookmark::firstOrCreate([
        'user_id' => auth()->id(),
        'tweet_id' => $request->tweet_id
    ]);

    return back()->with('success', 'Tweet bookmarked!');
}

    public function destroy($tweetId){

        $bookmark = Bookmark::where('user_id', auth()->id())
                        ->where('tweet_id', $tweetId)
                        ->firstOrFail();

        $bookmark->delete();

        return back()->with('success', 'Bookmark removed!');
    }


}
