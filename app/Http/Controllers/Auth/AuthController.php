<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     *
     *  Show login Page
     * @return view
     */
    public function index(){
        return view('auth.signin');
    }
    /**
     *
     *  Function login user
     * @return view
     */
    public function login(Request $request){
        $request->validate([
            'email'=>'required|exists:employees,email',
            'password'=>'required|min:3'
        ]);
        $guard = 'admin';
        $crednetioal = [
            "email"=>$request->input("email"),
            "password"=>$request->input("password")
        ];
        if(Auth::guard($guard)->attempt($crednetioal)){
            return redirect()->route('home.index');
        }else{
            return redirect()->back();
        }
    }
    /**
     *
     *  Function logout user
     * @return view
     */
    public function logout(Request $request){
        $guard = 'admin';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('home.index');
    }
}
