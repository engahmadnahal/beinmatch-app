<?php

namespace App\Http\Controllers;

use App\Http\Helper\CustomTrait;
use App\Jobs\SendUserFcmJob;
use App\Jobs\SendUserNotifyJob;
use App\Models\MobileToken;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    use CustomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Notification::distinct()->get(['data','created_at']));
        return view('notification.index',[
            // return all notifications withot duplicates
            'notifications' =>   Notification::distinct()->get(['data','created_at','id']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notification.craete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'title'=>'required|string|min:15:max:40',
            'content'=>'required|string|min:15:max:40',
            // 'img'=>'required|image|mimes:png,jpg,jpeg',
            'typeNofty'=>'required|string'
        ]);
        if(!$validator->fails()){
            // if($request->hasFile('img')){
            //     $fileName = $this->uploadFile($request->file('img'));
            // }
            $data = [
                "title"=>$request->title,
                "content"=>$request->content,
                "img"=>$fileName??null,
            ];
            if($request->typeNofty == "fcm"){
                // Hear is code send notification using FCM Api
                // $this->sendFCM($data);
                SendUserFcmJob::dispatch($data);
            }else if($request->typeNofty == "box"){
                // Send Notification for all users using Job
                SendUserNotifyJob::dispatch($data);
            }else{
                return response()->json([
                'msg'=>"Invalid Type Notification",
            ],Response::HTTP_BAD_REQUEST);
            }
            return response()->json([
                'msg'=>'Send this notification is success'
            ],Response::HTTP_OK );
        }else{
             return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }

    }

public function destroy(Notification $notification){
    $notification->delete();

    return response()->json(['msg' => 'تم الحذف']);
}



    //************** For test after than change place to job class *********************/

    public function sendFCM($data){
        $mobileToken = MobileToken::all('token');
        $arrayToken = [];
        foreach($mobileToken as $token){
            array_push($arrayToken,$token->token);
        }
        $SERVER_API_KEY = 'AAAAtbcGYVE:APA91bEi0dFC9gea1bH-AIPkOpaBKoeskckmTnA2R1OlIiy59nw1loM9s95Y-4THK2x8PihDlOZNh6MdIx76zi1zpJcFs8BbRhMuJmIKOWgwlMZnl6EbKl8195YfoiSXsUJ83lOvC5xZ';

        // $token_1 = 'Test Token';

        $data = [

            // "registration_ids" => [
            //     $token_1
            // ],

            "registration_ids" => $arrayToken,

            // Image Notification is not ready using now
            "notification" => [

                "title" => $data['title'],

                "body" => $data['content'],

                "sound"=> "default" // required for sound on ios

            ],

        ];

        $dataString = json_encode($data);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

    }
}
