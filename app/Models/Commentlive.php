<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commentlive extends Model
{
    use HasFactory,SoftDeletes;

    protected $with = [
        'commentUserForMatch',
    ];

    protected $hidden = [
        "deleted_at",
        "created_at",
        "updated_at",
    ];

    protected $fillable = [
        "mobara_id",
        "comment",
        "user_id"
    ];
    public function commentMatch(){
        return $this->belongsTo(Mobara::class,'mobara_id','id');
    }

    public function commentUserForMatch(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
