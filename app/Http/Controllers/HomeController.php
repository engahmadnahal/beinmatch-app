<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Mobara;
use App\Models\Post;
use App\Models\Search;
use App\Models\User;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $emp = Employee::findOrFail(auth()->user()->id);
        if($emp->status == 'block' || !is_null($emp->deleted_at)){
            return abort(403,'You have been blocked by your line manager !');
        }else{
            $users = User::where('status','active')->orderBy('created_at','desc')->get();
            $views = View::whereDate('created_at',Carbon::today())->count();
            $mobara = Mobara::where('publish_at','<>',null)->whereDate('created_at',Carbon::today())->get();
            $employees = Employee::where('status','active')->get();
            $search = Search::take(5)->orderBy('created_at','desc')->get();
            $postUser = Post::where('employee_id',auth()->user()->id)->count();
            return view('index',[
                'users'=>$users,
                'views'=>$views,
                'employees'=>$employees,
                'mobara'=>$mobara,
                'search'=>$search,
                'postUser' => $postUser
            ]);
        }
    }
}
