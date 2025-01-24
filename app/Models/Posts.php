<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
    protected $guarded = [
        'id',

    ];

     /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}