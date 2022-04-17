<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;



    public function getFullNameAttribute(){
        return $this->fname . " ". $this->lname;
    }
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
    ];
}
