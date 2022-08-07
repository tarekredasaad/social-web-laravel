<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend_Request extends Model
{
    use HasFactory;

    protected $table = "friend_request";
    protected $fillable = [
        'owner_request',
        'owner_target',
        'request_status',
        'date'

    ];

    protected $hidden = [

        // 'created_at',
        'updated_at'
    ];
}
