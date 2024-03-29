<?php

namespace App\Http\Controllers\V2\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\MainResource;
use App\Http\Resources\MatchLikeResource;
use App\Http\Resources\MobaraWebResource;
use App\Http\Resources\PollResource;
use App\Http\Resources\V2\MobaraResource;
use App\Models\Commentlive;
use App\Models\Matchlike;
use App\Models\Mobara;
use App\Models\Poll;
use App\Models\ViewMobara;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // id employee_id club_one_id club_two_id start botola channel_id voice_over publish_at
        // Get All Mobara for Api
        $mobara = Mobara::where('publish_at','<>',null)->get();
        return new MainResource(MobaraResource::collection($mobara),Response::HTTP_OK,'Success Get Mobara');

    }

    public function nextMatch(){
        $mobara = Mobara::where('publish_at','<>',null)->whereDate('date_match',Carbon::today())->orderBy('start')->first();
        return new MainResource(new MobaraResource($mobara),Response::HTTP_OK,'تم جلب مباريات اليوم بنجاح');
    }

    /**
     *
     * Get Match for today
     */
    public function today()
    {
        // check data today equal created_at
        $mobara = Mobara::whereDate('date_match',Carbon::today())->where('publish_at','<>',null)->orderBy('start')->get();
        return new MainResource(MobaraResource::collection($mobara),Response::HTTP_OK,'تم جلب مباريات اليوم بنجاح');

    }

    public function todayWeb()
    {
        // check data today equal created_at
        $mobara = Mobara::whereDate('date_match',Carbon::today())->where('publish_at','<>',null)->orderBy('start')->get();
        return new MainResource(MobaraWebResource::collection($mobara),Response::HTTP_OK,'تم جلب مباريات اليوم بنجاح');

    }

    

    public function todayZone(Request $request)
    {
        // check data today equal created_at
        $mobara = Mobara::where('publish_at','<>',null)->whereDate('date_match',Carbon::today())->get();
        foreach($mobara as $m){
            $m->extra = (object) ['zone' => $request->zone];
        }
        return new MainResource(MobaraResource::collection($mobara),Response::HTTP_OK,'تم جلب مباريات اليوم بنجاح');

    }
    /**
     *
     * Get Match for tomorrow
     */
    public function tomorrow()
    {
        // check data tomorrow equal created_at
        $mobara = Mobara::where('publish_at','<>',null)->whereDate('date_match',Carbon::tomorrow())->get();
        return new MainResource(MobaraResource::collection($mobara),Response::HTTP_OK,'تم جلب مباريات الغد بنجاح');

    }

    /**
     *
     * Get Match for ysetday
     */
    public function ysetday()
    {
        // check data ysetday equal created_at
        $mobara = Mobara::where('publish_at','<>',null)->whereDate('date_match',Carbon::yesterday())->get();
        return new MainResource(MobaraResource::collection($mobara),Response::HTTP_OK,'تم جلب مباريات الامس بنجاح');

    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Single Mobara for Api
        $mobara = Mobara::findOrFail($id);
        return new MainResource(new MobaraResource($mobara),Response::HTTP_OK,'Success Get Mobara');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Create poll for mobara
    public function createPoll(Request $request,$id)
    {
        // Validate data from request
        // id user_id mobara_id club_one darw club_two deleted_at created_at updated_at
        $validator = Validator($request->all(),[
            // 'user_id' => 'required',
            'club_one' => 'nullable',
            'club_two' => 'nullable',
            'darw' => 'nullable',
        ]);
        if (!$validator->fails()) {
            $isSaved = Poll::updateOrCreate([
                'user_id' => auth()->user()->id,
                'mobara_id' => $id,
            ],[
                'club_one' => $request->club_one,
                'club_two' => $request->club_two,
                'darw' => $request->darw,
            ]);
            $dataOfMobara = Mobara::where('publish_at','<>',null)->where('id',$id)->first();
            // return new MainResource(new MobaraResource($dataOfMobara),Response::HTTP_OK,'تم جلب مباريات الغد بنجاح')
            // $dataOfMobara = Poll::where('mobara_id',$id)->get();
            return $isSaved
            ? new MainResource(new PollResource($dataOfMobara),Response::HTTP_OK,'Success Poll')
            : response()->json(['error' => 'Error Poll'], Response::HTTP_BAD_REQUEST);
        }
    }



    // Get All Comments
    public function getAllComments($id)
    {
        // Get All Comments for Api
        $comments = Commentlive::where('mobara_id',$id)->with('commentUserForMatch')->get();
        return new MainResource(CommentResource::collection($comments),Response::HTTP_OK,'Success Get Comments');
    }


    // Create Comment for mobara
    public function createComment(Request $request,$id)
    {
        // Validate data from request
        //  id user_id mobara_id comment deleted_at created_at updated_at
        $validator = Validator($request->all(),[
            // 'user_id' => 'required',
            'comment' => 'required',
        ]);
        if (!$validator->fails()) {
            $comment = new Commentlive();
            $comment->user_id = auth()->user()->id;
            $comment->mobara_id = $id;
            $comment->comment = $request->comment;
            $isSaved = $comment->save();
            $dataOfMobara = Commentlive::where('mobara_id',$id)->with('commentUserForMatch')->get();
            return $isSaved
            ? new MainResource(CommentResource::collection($dataOfMobara),Response::HTTP_OK,'Success Create Comment')
            : response()->json(['error' => 'Error Create Comment'], Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json(['error' => 'Error Create Comment'], Response::HTTP_BAD_REQUEST);
        }
    }

    // Updata Comment For Mobara
    public function updateComment(Request $request,$id,Commentlive $commentlive){

        $validator = Validator($request->all(),[

            'comment' => 'required',
        ]);
        if (!$validator->fails()) {

            $commentlive->user_id = auth()->user()->id;
            $commentlive->mobara_id = $id;
            $commentlive->comment = $request->comment;
            $isSaved = $commentlive->save();
            $dataOfMobara = Commentlive::where('mobara_id',$id)->with('commentUserForMatch')->get();
            return $isSaved
            ? new MainResource(CommentResource::collection($dataOfMobara),Response::HTTP_OK,'Success Create Comment')
            : response()->json(['error' => 'Error Create Comment'], Response::HTTP_BAD_REQUEST);
        }
    }

    // Delete Comment For Mobara
    public function deleteComment(Commentlive $commentlive){
        $isSaved = $commentlive->delete();
        return response()->json([
            'status' => $isSaved,
            'message' => $isSaved ? 'Success Delete Comment' : 'Error Delete Comment'
        ]);
    }


    // Create and Update Like For Mobara
    public function createLike(Request $request,$id)
    {
        // Validate data from request
        $validator = Validator($request->all(),[
            'is_like' => 'nullable',
        ]);
        if (!$validator->fails()) {
            $isSaved = Matchlike::updateOrCreate([
                'user_id' => auth()->user()->id,
                'mobara_id' => $id,
            ],[
                'is_like' => $request->is_like,
            ]);
            $dataOfMobara = Matchlike::where('mobara_id',$id)->get();
            return $isSaved
            ? new MainResource(MatchLikeResource::collection($dataOfMobara),Response::HTTP_OK,'Success Like')
            : response()->json(['error' => 'Error Sent Like'], Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }


    public function registerView(Request $request,$id)
    {
        $validator = Validator($request->all(),[
            'user_id' => 'required',
        ]);
        if(!$validator->fails()){
            $view = new ViewMobara();
            $view->user_id = $request->user_id;
            $view->mobara_id = $id;
            $isSave = $view->save();
            return response()->json([
                'status' => $isSave ? true : false,
                'message' => $isSave ? 'Success Register View' : 'Error Register View'
            ],$isSave ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'message'=> $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }

    }


}
