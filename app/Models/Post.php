<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $with = [
        'userLike',
        'userComment',
        'userView'
    ];


    public function employee(){
        return $this->belongsTo(Employee::class , 'employee_id','id');
    }
    public function dawry(){
        return $this->belongsTo(Dawry::class,'dawry_id','id');
    }
    public function userComment(){
        return $this->belongsToMany(User::class,'comments','post_id','user_id');
    }

    public function userLike(){
        return $this->belongsToMany(User::class,'likes','post_id','user_id');
    }

    public function userView(){
        return $this->belongsToMany(User::class,'views','post_id','user_id');
    }



    public function getPostStatusAttribute()
    {
        //enum('done', 'wite', 'cancel')
        if(is_null($this->publish_at)){
            return "تحت التعديل";
        }elseif($this->status == 'wite'){
            return "تحت المراجعة";
        }elseif($this->status == 'done'){
            return "تم النشر";
        }elseif($this->status == 'cancel'){
            return "تم الرفض";
        }
    }

protected $casts = [
    'created_at'=>'datetime:Y/m/d'
];

}
