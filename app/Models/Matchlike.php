<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matchlike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','mobara_id','is_like'];
}
