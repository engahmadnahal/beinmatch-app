<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model
{
    use HasFactory;
     public function viewPost(){
        return $this->belongsTo(Post::class,'post_id','id');
    }

     public function viewUsers(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
