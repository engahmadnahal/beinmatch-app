<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;


    protected $with = [
        'user'
    ];
    // Create Relation With Post
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    protected $hidden = [
        // 'created_at',
        'updated_at',
        'deleted_at'
    ];

    // protected $casts = [
    //     'created_at'=>'datetime:Y-m-d H:i:s',
    // ];
}
