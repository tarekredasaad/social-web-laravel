<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = [
        'user_id',
        'post_id',
        'comments',
        'comment_author',
        'likes'
        
    ];

    protected $hidden = [
        
        // 'created_at',
        'updated_at'
    ];
}
