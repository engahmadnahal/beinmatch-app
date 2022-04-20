<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory,SoftDeletes;
    public function dawry(){
        return $this->belongsTo(Dawry::class,'dawry_id','id');
    }
    public function users(){
        return $this->belongsToMany(User::class,'club_follower','club_id','user_id');
    }
}
