<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $fillable = [
        'id',
        'user_id',
        'postid',
        'post',
        'img',
        'likes',
        'comment',
        'shares',
        'post_shared',
        'date',
        'has_image',
        
    ];


    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }
}
