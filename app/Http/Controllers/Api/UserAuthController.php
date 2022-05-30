<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
                return response()->json([
                    'message' => 'Login Successful',
                    'data' => $user,
                    'token' => $token->plainTextToken
                ], Response::HTTP_OK);
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
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!is_null($user)){
            return response()->json([
                'message' => 'Email already exists'
            ], Response::HTTP_BAD_REQUEST);
        }else{

            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->username = $request->fname . '' . $request->lname;
            $user->password = Hash::make($request->password);
            $isSaved = $user->save();

            $token = $user->createToken('beinmatchapp');
            return response()->json([
                'message' => $isSaved  ? 'User created successfully' : 'User creation failed',
                'data' => $user,
                'token' => $token->plainTextToken
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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

