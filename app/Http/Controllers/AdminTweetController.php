<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class AdminTweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);
        return view('admin.tweets.index', compact('tweets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'body' => 'required|string|max:280'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()->route('admin.tweets.index')->with('success', 'Tweet created successfully');
    }

    public function update(Request $request, Tweet $tweet)
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'body' => 'required|string|max:280'
        ]);

        $tweet->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()->route('admin.tweets.index')->with('success', 'Tweet updated successfully');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect()->route('admin.tweets.index')->with('success', 'Tweet deleted successfully');
    }
}



// 2

// class AdminTweetController extends Controller
// {
//     public function index()
//     {
//         $tweets = Tweet::with('user')->latest()->paginate(10);
//         return view('admin.tweets.index', compact('tweets'));
//     }

//     public function save(Request $request, $id = null)
//     {
//         $request->validate([
//             'title' => 'nullable|string|max:255',
//             'body' => 'required|string'
//         ]);

//         $data = [
//             'user_id' => auth()->id(),
//             'title' => $request->title,
//             'body' => $request->body
//         ];

//         if ($id) {
//             $post = Tweet::findOrFail($id);
//             $post->update($data);
//             $message = 'Post updated successfully';
//         } else {
//             Tweet::create($data);
//             $message = 'Post created successfully';
//         }

//         return redirect()->route('posts.index')->with('success', $message);
//     }

//     public function destroy(Tweet $post)
//     {
//         $post->delete();
//         return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
//     }
// }


// 3

// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $tweets = Tweet::latest()->get();
//         return view('admin.tweets.index', compact('tweets'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('admin.tweets.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'title' => 'required|string|max:255',
//             'body' => 'required',
//         ]);

//         $validated['user_id'] = auth()->id();

//         Tweet::create($validated);

//         return redirect()->route('admin.tweets.index')
//                          ->with('success', 'Tweet created successfully.');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Tweet $tweet)
//     {
//         return view('admin.tweets.show', compact('tweet'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Tweet $tweet)
//     {
//         return view('admin.tweets.edit', compact('tweet'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Tweet $tweet)
//     {
//         $validated = $request->validate([
//             'title' => 'required|string|max:255',
//             'body' => 'required',
//         ]);

//         $tweet->update($validated);

//         return redirect()->route('admin.tweets.index')
//                          ->with('success', 'Tweet updated successfully.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Tweet $tweet)
//     {
//         $tweet->delete();

//         return redirect()->route('admin.tweets.index')
//                          ->with('success', 'Tweet deleted successfully.');
//     }
// }
