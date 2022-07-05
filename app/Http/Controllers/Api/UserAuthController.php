<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends Controller
{
    //

    /**
     * Function to login a user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
        $validator = Validator($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:12',
        ]);
        if(!$validator->fails()){
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],true)){
                $user = User::where('email',$request->email)->first();
                $token = $user->createToken('beinmatchapp');
                // Set Token To User Resource
                $user['token'] = $token->plainTextToken;
                return response()->json([
                    'message' => 'تم التسجيل بنجاح',
                    'data' => $user,
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'message' => 'كلمة المرور غير صحيحة'
                ], Response::HTTP_BAD_REQUEST);
            }
        }else{
            return response()->json(['status'=>false,'message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }

        // $user = User::where('email', $request->email)->first();
        // if(!is_null($user)){
        //     if(Hash::check($request->password, $user->password)){
        //         $token = $user->createToken('beinmatchapp');
        //         // Set Token To User Resource
        //         $user['token'] = $token->plainTextToken;
        //         return response()->json([
        //             'message' => 'Login Successful',
        //             'data' => $user,
        //         ], Response::HTTP_OK);
        //         // return new MainResource((new UserResource($user))->token = ,Response::HTTP_OK,'Login is success');
        //     }else{
        //         return response()->json([
        //             'message' => 'Invalid Password'
        //         ], Response::HTTP_BAD_REQUEST);
        //     }
        // }else{
        //     return response()->json([
        //         'message' => 'Invalid Email'
        //     ], Response::HTTP_BAD_REQUEST);
        // }
    }


    public function signup(Request $request){
        $validator = Validator($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12',
        ]);

        if(! $validator->fails()) {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->username =  'bein_user'. '_' . rand(1,100);
            $user->password = Hash::make($request->password);
            $user->avater = "assets/img/upload/media/login.png";
            $user->ip_address = $request->ip();
            $isSaved = $user->save();

            $token = $user->createToken('beinmatchapp');
            $user['token'] = $token->plainTextToken;
            return response()->json([
                'message' => $isSaved  ? 'تم التسجيل بنجاح' : 'حدث خطأ أثناء التسحيل حاول مجدداً',
                'data' => $user,
                // 'token' => $token->plainTextToken
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json(['status'=>false,'message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }


    }


    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Function to logout user
     */

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Successful'
        ], Response::HTTP_OK);
    }

}

