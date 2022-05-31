<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use HasFactory,SoftDeletes;

    // Create Relation With Mobara
    public function mobara()
    {
        return $this->hasMany(Mobara::class,'channel_id','id');
    }
}
