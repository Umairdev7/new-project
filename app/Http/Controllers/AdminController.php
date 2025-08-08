<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        // $users = User::latest()->get();
        // $users = User::get();
        $users = User::latest()->paginate(20);

        return view('admin.users.index', compact('users'));
    }
}

