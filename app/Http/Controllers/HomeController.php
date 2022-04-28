<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $emp = Employee::findOrFail(auth()->user()->id);
        if($emp->status == 'block' || !is_null($emp->deleted_at)){
            return abort(403,'You have been blocked by your line manager !');
        }else{
            $users = User::all();
            $usersOnline = User::where('is_online',true)->count();
            $usersOffline = User::where('is_online',false)->count();
            return view('index');
        }
    }
}
