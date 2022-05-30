<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory,SoftDeletes;

    public function mobara(){
        return $this->hasMany(Mobara::class,'employee_id','id');
    }
    public function posts(){
        return $this->hasMany(Post::class , 'employee_id','id');
    }

    public function getFullNameAttribute(){
        return $this->fname . " ". $this->lname;
    }
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];
}
