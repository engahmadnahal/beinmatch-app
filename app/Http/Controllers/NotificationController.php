<?php

namespace App\Http\Controllers;

use App\Http\Helper\CustomTrait;
use App\Jobs\SendUserFcmJob;
use App\Jobs\SendUserNotifyJob;
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
            'notifications' =>   Notification::distinct()->get(['data','created_at']),
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
            'img'=>'required|image|mimes:png,jpg,jpeg',
            'typeNofty'=>'required|string'
        ]);
        if(!$validator->fails()){
            if($request->hasFile('img')){
                $fileName = $this->uploadFile($request->file('img'));
            }
            $data = [
                "title"=>$request->title,
                "content"=>$request->content,
                "img"=>$fileName??null,
            ];
            if($request->typeNofty == "fcm"){
                // Hear is code send notification using FCM Api
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
