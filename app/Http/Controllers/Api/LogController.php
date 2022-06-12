<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogController extends Controller
{
    //

    public function sendLogs(Request $request)
    {
       $validator = Validator($request->all(),[
           'body'=>'required|string',
       ]);

         if(!$validator->fails()){
              $logs = new Log();
              $logs->body = $request->body;
            $isSaved = $logs->save();
            return response()->json([
                'message'=> $isSaved ? 'Success Send Logs' : 'Failed Send Logs',
            ],$isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
         }else{
            return response()->json([
                'message'=> $validator->getMessageBag()->first(),
            ],Response::HTTP_BAD_REQUEST);
         }
    }
}
