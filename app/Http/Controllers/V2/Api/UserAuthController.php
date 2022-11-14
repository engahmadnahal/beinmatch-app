<?php

namespace App\Http\Controllers\V2\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\UserResource;
use App\Models\Employee;
use App\Models\User;
use App\Notifications\AdminDashNotification;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Mockery\Expectation;
use Nette\Utils\Random;
use Symfony\Component\HttpFoundation\Response;

class UserAuthController extends Controller
{

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
                $user = User::where('email',$request->email)->where('status','active')->first();
                if(is_null($user)){
                    return response()->json(['status'=>false,'message'=>"الحساب غير موجود او محظور"],Response::HTTP_BAD_REQUEST);
                }
                return $this->generateToken($request,$user);
                
            
        }else{
            return response()->json(['status'=>false,'message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }

    }

    private function generateToken(Request $request, $user,$type = 'login')
    {
        try {
        $response = Http::asForm()->post(env('API_TOKEN_URL'), [
            'grant_type' => 'password',
            'client_id' => env('USER_CLIENT_ID'),
            'client_secret' => env('USER_CLIENT_SECRET'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'scope' => '*',
        ]);

        
        $user->setAttribute('token', $response->json()['access_token']);
        $user->setAttribute('token_type', $response->json()['token_type']);
        $user->setAttribute('refresh_token', $response->json()['refresh_token']);
        $this->revokePreviousTokens($user);
        try{
            $user->avater = Storage::url($user->avater);
        }catch(Exception $e){
            $user->avater = env('APP_URL') . '/' . $user->avater;
        }
        return response()->json([
            'status' => true,
            'message' => 'تم التسجيل بنجاح',
            'data' => $user,
        ], Response::HTTP_OK);
        } catch (Exception $e) {
            $message = '';
            if ($response->json()['error'] == 'invalid_grant') {
                $message = 'حدث خطأ اثناء التسيجل';
            } else {
                $message = 'جدث حطأ ما !';
            }
            return response()->json([
                'status' => false,
                'message' => $message,
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    
    public function signup(Request $request){
        $validator = Validator($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12',
            'os_mobile'=>'required|string',
        ]);

        if(! $validator->fails()) {
            try{
                $user = new User();
                $user->fname = $request->fname;
                $user->lname = $request->lname;
                $user->email = $request->email;
                $user->username = 'bein_user_'.Random::generate(5);
                $user->password = Hash::make($request->password);
                $user->avater = env('APP_URL')."/assets/img/upload/media/login.png";
                // $user->avater = asset('assets/img/upload/media/login.png');
                $user->ip_address = $request->ip();
                $user->os_mobile = $request->os_mobile;
                $isSaved = $user->save();

                // Send notification For Admin When Register new User
                $admin = Employee::where('jop_title','Admin')->where('email','admin@admin.com')->first();
                $data['title'] = "تم تسجيل مستخدم جديد";
                $data['body'] = "لقد سجل المستخدم " .$request->fname . " ". $request->lname . "من خلال التطبيق ويملك الايميل  ".$request->email;
                $admin->notify(new AdminDashNotification($data));

                $this->generateToken($request,$user,'register');
                
                // return response()->json([
                //     'message' => $isSaved  ? 'تم التسجيل بنجاح' : 'حدث خطأ أثناء التسحيل حاول مجدداً',
                //     'data' => $user,
                // ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }catch(Exception $e){
                return response()->json([
                    'message' => 'حدث خطأ ما',
                    'error' => $e->getMessage()
                ], Response::HTTP_BAD_REQUEST);
            }

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
        $token = auth('user-api')->user()->token();
        $isRevoked = $token->revoke();
        return response()->json([
            'message' => 'Logout Successful'
        ], Response::HTTP_OK);
    }


    /// Update Setting [isOnline User]
    /**
     * @param Request $request
     */

    public function sendOnlineUser(Request $request){
        $validator = Validator($request->all(),[
            'isOnline' => 'required|boolean'
        ]);
        if(!$validator->fails()){
            $user = User::findOrFail(auth()->user()->id);
            $user->is_online = $request->isOnline;
            $isSave = $user->save();
            return response()->json(['status'=>boolval($isSave),'message'=>$isSave ? "تم الارسال بنجاح" : 'حدث خطأ ما'],Response::HTTP_OK);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function statusUser(){
        return response()->json(['status'=>auth()->user()->status],Response::HTTP_OK);
    }

    private function revokePreviousTokens($userId)
    {
        DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->update([
                'revoked' => true
            ]);
    }

}

