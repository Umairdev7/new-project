<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    // FriendController.php
    public function index(){
        $user = auth()->user();
        $friends = auth()->user()->friends(); // This is a Collection
        return view('profile.friends', compact('user', 'friends'));
    }

}
