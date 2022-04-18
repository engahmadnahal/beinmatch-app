<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $emp = Employee::findOrFail(auth()->user()->id);
        if($emp->status == 'block' || !is_null($emp->deleted_at)){
            return abort(403,'You have been blocked by your line manager !');
        }else{

            return view('index');
        }
    }
}
