<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobara extends Model
{
    use HasFactory,SoftDeletes;

    protected $with = [
        'dawry',
        'channel',
        'userComment',
        'userLike',
        'poll',

    ];

    public function userView(){
        return $this->belongsToMany(User::class,'view_mobaras','mobara_id','user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    // Create Relation With Dawry
    public function dawry()
    {
        return $this->belongsTo(Dawry::class,'botola','id');
    }

    // Create Relation With Channel
    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_id','id');
    }

    public function userComment(){
        return $this->belongsToMany(User::class,'commentlives','mobara_id','user_id');
    }

    public function userLike(){
        return $this->belongsToMany(User::class,'matchlikes','mobara_id','user_id');
    }

    public function like(){
        return $this->hasMany(Matchlike::class,'mobara_id','id');
    }

    public function commentForUserToMatch(){
        return $this->hasMany(Commentlive::class,'mobara_id','id');
    }

    // Create Relation With Poll
    public function poll()
    {
        return $this->hasMany(Poll::class,'mobara_id','id');
    }

    public function getTitleAttribute()
    {
        $club_name_one = Club::find($this->club_one_id)->name;
        $club_name_two = Club::find($this->club_two_id)->name;
        return $club_name_one . ' vs ' . $club_name_two;
    }

    // Get Name club_one
    public function getClubOneAttribute()
    {
        $club_one = Club::find($this->club_one_id);
        return $club_one;
    }

    // Get Name club_one
    public function getClubTwoAttribute()
    {
        $club_two = Club::find($this->club_two_id);
        return $club_two;
    }

    public function getStatusAttribute()
    {
        if(!is_null($this->publish_at)){
            return 'تم النشر';

        }else{
            return 'تحت المراجعة';
        }
        return null;
    }
}
