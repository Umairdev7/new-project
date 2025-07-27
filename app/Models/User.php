<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Tweet;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatarAttribute(){
        // return "https://i.pravatar.cc/40?u=" . $this->email;
        return "https://i.pravatar.cc/40?u=" . $this->id;
    }

    // public function timeline(){
    //     // return Tweet::latest()->get();
    //     return Tweet::where('user_id', $this->id)
    //             ->latest()
    //             ->get();
    // }

    public function timeline(){
    //     // include all of the user's tweets
    //     // as well as the tweets of everyone
    //     // they follow... descending order by date.

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
                ->orWhere('user_id', $this->id)
                ->latest()->get();
    }
    // public function timeline(){
    //     // include all of the user's tweets
    //     // as well as the tweets of everyone
    //     // they follow... descending order by date.

    //     $friends = $this->follows()->pluck('id');

    //     return Tweet::whereIn('user_id', $friends)
    //             ->orWhere('user_id', $this->id)
    //             ->latest()->paginate(5);
    // }

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user){
        return $this->follow()->save($user);
    }

    public function follows(){
        // return $this->belongsToMany(User::class, 'follows');
        // Users that this user is following
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id', 'following_user_id');
    }

    public function followers()
    {
        // Users that are following this user
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'from_user_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'to_user_id');
    }

    // public function friends(){
    //     return $this->belongsToMany(User::class, 'friend_requests', 'from_user_id', 'to_user_id')
    //         ->wherePivot('status', 'accepted')
    //         ->withPivot('status')
    //         ->withTimestamps()
    //         ->union(
    //             $this->belongsToMany(User::class, 'friend_requests', 'to_user_id', 'from_user_id')
    //                 ->wherePivot('status', 'accepted')
    //                 ->withPivot('status')
    //                 ->withTimestamps()
    //         );
    // }

    // public function friends(){
    //     $from = DB::table('friend_requests')
    //         ->where('from_user_id', $this->id)
    //         ->where('status', 'accepted')
    //         ->pluck('to_user_id');

    //     $to = DB::table('friend_requests')
    //         ->where('to_user_id', $this->id)
    //         ->where('status', 'accepted')
    //         ->pluck('from_user_id');

    //     $friendIds = $from->merge($to);

    //     return User::whereIn('id', $friendIds)->get();
    // }

    // User.php
    public function friends(){
        $from = $this->belongsToMany(User::class, 'friend_requests', 'from_user_id', 'to_user_id')
            ->wherePivot('status', 'accepted');

        $to = $this->belongsToMany(User::class, 'friend_requests', 'to_user_id', 'from_user_id')
            ->wherePivot('status', 'accepted');

        return $from->get()->merge($to->get());
    }

    // Friends I sent requests to and were accepted
    public function friendsFrom(){
        return $this->belongsToMany(User::class, 'friend_requests', 'from_user_id', 'to_user_id')
            ->wherePivot('status', 'accepted');
    }

    // Friends who sent me requests and I accepted
    public function friendsTo()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'to_user_id', 'from_user_id')
            ->wherePivot('status', 'accepted');
    }

    // Merge both sides into a virtual 'friends' attribute
    public function getFriendsAttribute(){
        return $this->friendsFrom->merge($this->friendsTo);
    }


    // For Bookmark

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedTweets(){
        return $this->belongsToMany(Tweet::class, 'bookmarks', 'user_id', 'tweet_id')
                ->withTimestamps();
    }





}
