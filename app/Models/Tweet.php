<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // For Bookmark

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedBy(){
        return $this->belongsToMany(User::class, 'bookmarks', 'tweet_id', 'user_id')
                    ->withTimestamps();
    }


}
