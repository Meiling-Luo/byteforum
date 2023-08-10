<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Comment extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class); // User手打，waiting for the pop up to include the namespace
    }
}
