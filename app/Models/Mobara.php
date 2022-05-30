<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobara extends Model
{
    use HasFactory,SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function getTitleAttribute()
    {
        $club_name_one = Club::find($this->club_one_id)->name;
        $club_name_two = Club::find($this->club_two_id)->name;
        return $club_name_one . ' vs ' . $club_name_two;
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
