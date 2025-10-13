<?php

use App\Models\User;
use App\Models\Tweet;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\AdminTweetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HeaderPhotoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/calculator', [CalculatorController::class, 'index']);
    Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculate');

Route::get('/calnew', function () {
    return view('calculator.calculatornew');
});
    Route::post('/calculatenew', [CalculatorController::class, 'calculateNew'])->name('calculatenew');

Route::get('/lists', [TweetsController::class, 'lists'])->middleware('auth')->name('lists');

Route::get('/explore', [TweetsController::class, 'explore'])->name('explore');

// Route::get('/profile', [TweetsController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/profile/{id}', [TweetsController::class, 'profile'])->name('profile');


Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/users/{user}', [ProfileController::class, 'show'])->name('show');
Route::get('/users/{user}/friends', [ProfileController::class, 'friends'])->name('users.friends');
Route::get('/users/{user}/photos', [ProfileController::class, 'photos'])->name('users.photos');
// Route::get('/users', [ProfileController::class, 'show'])->name('show');
// Route::get('/users/{id}', [ProfileController::class, 'show'])->name('show');


Route::middleware(['auth'])->group(function () {
    Route::post('/follow/{user}', [FollowController::class, 'store'])->name('follow');
    Route::delete('/unfollow/{user}', [FollowController::class, 'destroy'])->name('unfollow');
});

Route::get('/followers', [UserController::class, 'followers'])->name('user.followers');

// Friends
Route::post('/friend-request/send/{toUserId}', [FriendRequestController::class, 'send'])->name('friend-request.send');
Route::post('/friend-request/accept/{id}', [FriendRequestController::class, 'accept'])->name('friend-request.accept');
Route::post('/friend-request/decline/{id}', [FriendRequestController::class, 'decline'])->name('friend-request.decline');
// Route::get('/friend-requests', [FriendRequestController::class, 'index'])->name('friend-requests.index');
Route::get('/friend-requests', [FriendRequestController::class, 'index'])
    ->middleware('auth')
    ->name('friend-requests.index');
// Route::get('/friends', [FriendController::class, 'index'])->name('friends');
Route::get('/friends', [FriendController::class, 'index'])->name('friends');


// Bookmark

Route::middleware('auth')->group(function() {
    Route::get('/bookmarked', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{tweet}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
});




// Route::get('/profile/updatepage/{id}', [TweetsController::class, 'updatePage'])->name('updatepage');
// Route::put('/update/{id}', [TweetsController::class, 'update'])->name('update.user');

Route::resource('user', UserController::class);

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::get('/newsfeed', [UserController::class, 'newsFeed'])->name('newsfeed');
Route::get('/photos', [UserController::class, 'photos'])->name('photos');


//Route::get('/calculator', function () {
//    return view('calculator.calculator')->name('calculator');
//});

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login_register');
    // return view('admin.dashboard');
});

Route::middleware('auth')->group(function(){
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::get('/tweet/{tweet}', [TweetsController::class, 'show'])->name('viewtweet');
    Route::post('/tweets', [TweetsController::class, 'store'])->name('posts.store');
});
// Route::middleware('auth')->group(function(){
//     Route::get('/tweets', 'TweetsController@index')->name('home');
//     Route::post('/tweets', 'TweetsController@store');
// });

//Rough
// Route::get('test', [TweetsController::class, 'test']);
// Auth::routes();



// Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserController::class, 'store']);


// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// });

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');





Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


                //    For Admin
    // Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    //     Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
    //     // Route::get('/users', fn () => view('admin.users'))->name('admin.users');
    //     // Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    //     Route::get('/settings', fn () => view('admin.settings'))->name('admin.settings');
    //     Route::resource('users', AdminUserController::class);
    // });



Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->name('admin.') // <-- add this
    ->group(function () {

        // Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/settings', fn () => view('admin.settings'))->name('settings');

        Route::resource('users', AdminUserController::class);

        Route::resource('tweets', AdminTweetController::class);
        // Route::post('/tweets/save', [AdminTweetController::class, 'save'])->name('tweets.save');


    });

    // routes/web.php
// Route::post('/update-header-photo', [ProfileController::class, 'updateHeaderPhoto'])->name('update.header');




