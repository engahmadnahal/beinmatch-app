<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'slide_active',
        'match_active',
        'ads_active',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'slide_active'=>'boolean',
        'match_active'=>'boolean',
        'ads_active'=>'boolean',
    ];
}
