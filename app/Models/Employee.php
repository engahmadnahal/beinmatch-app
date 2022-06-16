<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory,SoftDeletes,HasRoles,Notifiable;

    public function mobara(){
        return $this->hasMany(Mobara::class,'employee_id','id');
    }
    public function posts(){
        return $this->hasMany(Post::class , 'employee_id','id');
    }

    public function getFullNameAttribute(){
        return $this->fname . " ". $this->lname;
    }
    public function getStatusEmpAttribute(){
        return $this->status == 'active' ? 'مفعل' : 'محظور';
    }
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'salary',
        'address',
    ];
}
