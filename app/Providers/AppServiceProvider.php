<?php

namespace App\Providers;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }


    public function boot()
{
    View::composer('*', function ($view) {
        if (Auth::check()) {
            $friendRequests = FriendRequest::where('to_user_id', Auth::id())
                ->where('status', 'pending')
                ->with('sender') // eager load sender
                ->get();

            $view->with('friendRequests', $friendRequests);
        }
    });
}


}
