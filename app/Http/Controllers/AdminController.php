<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function users(){
    //     // $users = User::latest()->get();
    //     // $users = User::get();
    //     $users = User::latest()->paginate(20);

    //     return view('admin.users.dashboard', compact('users'));
    // }


    // public function dashboard(){
    // $totalUsers = User::count();
    // $totalAdmins = User::where('is_admin', 1)->count();

    // return view('admin.dashboard', compact('totalUsers', 'totalAdmins'));
    // }


    public function index(){
        $users = User::all();

        $totalAdmins = User::where('is_admin', true)->count();
        $totalUsers  = User::where('is_admin', false)->count();

        $totalPosts = Tweet::count();

        $adminPercentage = $totalUsers > 0 ? ($totalAdmins / $totalUsers) * 100 : 0;

        $totalNonAdmins = $totalUsers - $totalAdmins;
        $userPercentage = $totalUsers > 0 ? ($totalNonAdmins / $totalUsers) * 100 : 0;

        // For Posts Chart
            // Get post counts per month for the current year
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('M');
        });

        $postCounts = collect(range(1, 12))->map(function ($month) {
            return Tweet::whereYear('created_at', now()->year)
                    ->whereMonth('created_at', $month)
                    ->count();
        });



        return view('admin.dashboard', compact(
            'users',
            'totalAdmins',
            'totalUsers',
            'totalPosts',
            'adminPercentage',
            'totalNonAdmins',
            'userPercentage',
            'months',
            'postCounts'));
    }

}

