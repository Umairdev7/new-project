<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $tweets = auth()->user()->timeline();
        // return view('home', compact('tweets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view("profile.updateuser",compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $user = User::find($id);

        // $user->name = $request->username;
        // $user->email = $request->useremail;
        // $user->age = $request->userage;
        // $user->city = $request->usercity;

        // $user->save();

        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userabout' => 'required',
        ]);

        $user = User::where('id',$id)
                    ->update([
                        'name' => $request->username,
                        'email' => $request->useremail,
                        'about' => $request->userabout,
                    ]);

        return redirect()->route('profile')
        ->with('status', 'User Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
