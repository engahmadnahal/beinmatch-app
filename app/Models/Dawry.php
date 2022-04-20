<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dawry extends Model
{
    use HasFactory,SoftDeletes;

    protected $with = [
        'clubs'
    ];

    public function clubs(){
        return $this->hasMany(Club::class,'dawry_id','id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'dawry_follower','dawry_id','user_id');
    }
}
