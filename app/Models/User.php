<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public function views(){
        return $this->hasMany(View::class,'user_id','id');
    }

    public function clubs(){
        return $this->belongsToMany(Club::class,'club_follower','user_id','club_id');
    }
    public function dawry(){
        return $this->belongsToMany(Dawry::class,'dawry_follower','user_id','dawry_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'=>'datetime:Y/m/d'
    ];


    public function getFullNameAttribute(){
        return $this->fname . " ".$this->fname;
    }

    public function getStatusEmailAttribute(){
        return !is_null($this->email_verified_at) ? 'مفعل' : 'غير مفعل';
    }

    public function getOnlineAttribute(){
        return $this->is_online ? 'نشط' : 'غير نشط';
    }

    public function getStatusUserAttribute(){
        if($this->status == 'active'){
            return 'متاح';
        }elseif($this->status == 'block'){
            return 'محظور';
        }else{
            return 'محذوف';
        }
    }

}
