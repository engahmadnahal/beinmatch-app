<?php

namespace App\Http\Controllers\V2\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\NotificationResource;
use App\Models\User;
use App\Models\MobileToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    //

    public function getNotifications(){
        // $user = User::find(auth()->user()->id);
        return response()->json([
            'status' =>true,
            'message' => 'تم بنجاح',
            'data' => []
        ]);
    }

    public function readAll(){
        $user = User::find(auth()->user()->id);
        $user->unreadNotifications->markAsRead();
        return response()->json([
            'status' => true,
            'message' => 'All notifications read'
        ]);
    }


    public function saveTokenMobile(Request $request){
        $validator = Validator($request->all(),[
            'token'=>'required|string'
        ]);

        if(!$validator->fails()){
            $mobileToken = new MobileToken();
            $mobileToken->user_id = auth()->user()->id;
            $mobileToken->token = $request->token;
            $mobileToken->save();
            return response()->json(['status'=>true,'message'=>"Success send token"]);
        }else{
            return response()->json([
                'message'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
