<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory,SoftDeletes;

    public function mobara(){
        return $this->belongsTo(Mobara::class,'mobara_id','id');
    }

    protected $hidden = [
        "deleted_at",
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        "club_one"=>"boolean",
        "darw"=>"boolean",
        "club_two"=>"boolean"
    ];
}
