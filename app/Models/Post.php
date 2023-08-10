<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //table Add user method to note table, grab a note, we point it to the user and we can get the user data for that note
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {

        return $this->hasMany(Comment::class);
    }

    public function upvote()
    {

        return $this->hasMany(Upvote::class);
    }
}
