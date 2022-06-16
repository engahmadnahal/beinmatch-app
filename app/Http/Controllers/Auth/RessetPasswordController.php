<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class RessetPasswordController extends Controller
{
    //
    public function showForgot(){
        return view('auth.forgot');
    }

    public function sendLinkReset(Request $request){
        $validator = Validator($request->all(),[
            'email'=>'required|email',
        ]);

        if(!$validator->fails()){
            $status = Password::sendResetLink(['email'=>$request->email]);

            return response()->json([
                'msg'=>__($status)
            ],$status === Password::RESET_LINK_SENT ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    public function showResetPassword(Request $request,$token){
        return view('auth.reset',[
            'token'=>$token,
            'email'=>$request->input('email')
        ]);
    }

    public function resetPassword(Request $request){
        $validator = Validator($request->all(),[
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'token'=>'required|string',
        ]);

        if(!$validator->fails()){
            $status = Password::reset(
                $request->only('email','password','password_confirmation','token'),
                function($user, $password){
                    $user->password = Hash::make($password);
                    $user->save();
                }
            );
            return response()->json([
                'msg'=>__($status)
            ],$status === Password::PASSWORD_RESET ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
