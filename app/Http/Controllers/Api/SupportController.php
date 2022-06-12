<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{
    //

    public function sendSupport(Request $request)
    {
        $validator = Validator($request->all(),[
            'message'=>'required|string|max:255',
        ]);
        if(!$validator->fails()){
            // id	user_id	content	created_at	updated_at
            $support = new Support();
            $support->user_id = auth()->user()->id;
            $support->content = $request->message;
            $isSaved = $support->save();
            return response()->json([
                'message'=> $isSaved ? 'Success Send Support' : 'Failed Send Support',
            ],$isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);

        }
    }
}
