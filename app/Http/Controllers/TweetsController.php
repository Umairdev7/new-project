<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
// use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
        public function index()
    {
        // $tweets = Tweet::get();

        // $tweets = auth()->user()->timeline();
        // $tweets = Tweet::latest()->paginate(5);

        // $friendRequests  = FriendRequest::where('to_user_id', auth()->id())
        //     ->where('status', 'pending')
        //     ->with('sender')
        //     ->get();

        $friends = auth()->user()->friends(); // This is a Collection


        $users = User::all();


        $user = auth()->user();
        $tweets = auth()->user()->timeline();
        return view('home', compact('user' ,'tweets', 'users', 'friends'));
    }
    //     public function index()
    // {
    //     return view('home', [
    //         'tweets' => auth()->user()->timeline()
    //     ]);
    // }

    public function store(){

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'title' => $attributes['title'],
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }

    public function show($tweet){
            $tweets = Tweet::findOrFail($tweet);
            // return $tweets;
            return view("view", compact('tweets'));



//            $tweets = Tweet::all();
//            $tweets = auth()->user()->timeline();
//            return view('view', compact('tweets'));
}

    //Rough
//    public function test(){
//        $john = User::first()->follows->pluck('id');
//        return $john;
//    }

public function lists(){
    $user = Auth()->user();

    $tweets = Tweet::where('user_id', $user->id)->latest()->get();

    return view('profile.lists', compact('user', 'tweets'));
}

public function explore(){
    return view('explore.explore');
}

// public function profile(){
//     $user = Auth()->user();
//     return view('profile.profile', compact('user',));
// }

public function profile($id)
{
    $user = User::findOrFail($id); // or use `where('username', $id)` if using usernames
    return view('profile.profile', compact('user'));
}


public function updatePage(User $user){
    $users = User::findOrFail($user->id);
    return view('profile.updateuser', compact('users'));
}
// public function updatePage(string $id){
//         // $user = DB::table('users')->where('id',$id)->get();
//         $user = DB::table('users')->find($id);
//         // return $user;
//         return view('updateuser', ['data' => $user]);
//     }

    public function update(Request $request, string $id)
    {
        // $user = User::find($id);

        // $user->name = $request->username;
        // $user->email = $request->useremail;
        // $user->about = $request->about;
        // $user->city = $request->usercity;

        // $user->save();

        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userabout' => 'required',
            // 'usercity' => 'required|alpha',
        ]);

        $user = User::where('id',$id)
                    ->update([
                        'name' => $request->username,
                        'email' => $request->useremail,
                        'about' => $request->userabout,
                        // 'city' => $request->usercity,
                    ]);

        return redirect()->route('profile.profile')
        ->with('status', 'User Data Updated Successfully');
    }



    // public function updateUser(Request $req, $id){
    //     // return $req;
    //     $user = DB::table('users')
    //                 ->where('id',$id)
    //                 ->update([

    //                     'name' => $req->username,
    //                     'email' => $req->useremail,
    //                     'age' => $req->userage,
    //                     'city' => $req->usercity,
    //                 ]);



    // //StaticUpdate

    // // public function updateUser(){
    // //     $user = DB::table('users')
    // //                 ->where('id',1)
    // //                 ->update([
    // //                     'city' => 'Karachi',
    // //                     'age' => 22
    // //                 ]);

    //                 //Method 2

    //             //     ->updateOrInsert([
    //             //         'email' => 'mohsin@gmail.com',   //if matches then change otherwise new add
    //             //         'name' => 'Mosin Nawaz',
    //             //         'city' => 'Lahore'
    //             //     ],
    //             //     [
    //             //         'age' => 25
    //             //     ]
    //             // );


    //             //Method 3
    //             // ->where('id',3)
    //             // ->increment('age', 3);
    //             // ->increment('age', 3, ['city' => 'Islamabad']);
    //             // ->decrement('age', 3, ['city' => 'Islamabad']);
    //             // ->incrementEach([
    //             //     'age' => 2,
    //             //     'votes' => 1
    //             // ]);

    //                 if($user){
    //                     return redirect()->route('home');
    //                     // echo "<h1>Data Successfully Update.</h1>";
    //                 }else{
    //                     echo "<h1>Data Not Updated.</h1>";
    //                 }
    // }

}
