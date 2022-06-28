<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!is_null($user)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('beinmatchapp');
                // Set Token To User Resource
                $user['token'] = $token->plainTextToken;
                return response()->json([
                    'message' => 'Login Successful',
                    'data' => $user,
                ], Response::HTTP_OK);
                // return new MainResource((new UserResource($user))->token = ,Response::HTTP_OK,'Login is success');
            }else{
                return response()->json([
                    'message' => 'Invalid Password'
                ], Response::HTTP_BAD_REQUEST);
            }
        }else{
            return response()->json([
                'message' => 'Invalid Email'
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function signup(Request $request){
        $validator = Validator($request->all(), [
                    'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        // $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'password' => 'required',
        // ]);

        if(! $validator->fails()) {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->username = $request->fname . '' . $request->lname . '_' . rand(1,100);
            $user->password = Hash::make($request->password);
            $isSaved = $user->save();

            $token = $user->createToken('beinmatchapp');
            $user['token'] = $token->plainTextToken;
            return response()->json([
                'message' => $isSaved  ? 'User created successfully' : 'User creation failed',
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

