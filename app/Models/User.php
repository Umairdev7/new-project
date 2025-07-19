<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Tweet;
use Laravel\Sanctum\HasApiTokens;
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
        // include all of the user's tweets
        // as well as the tweets of everyone
        // they follow... descending order by date.

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
                ->orWhere('user_id', $this->id)
                ->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user){
        return $this->follow()->save($user);
    }

    public function follows(){
        // return $this->belongsToMany(User::class, 'follows');
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id', 'following_user_id');
    }
}
