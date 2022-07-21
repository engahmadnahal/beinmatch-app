<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Resources\MainResource;
use App\Http\Resources\MobaraResource;
use App\Http\Resources\PostResource;
use App\Models\Club;
use App\Models\ClubFollower;
use App\Models\Mobara;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\ClubFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClubController extends Controller
{
    //
    public function index()
    {
        $clubs = Club::where('playing','<>',null)->get();
        return new MainResource(ClubResource::collection($clubs),Response::HTTP_OK,'Success Get Club Data');
    }

    public function show(Club $club)
    {
        // $club = Club::findOrFail($id);

        $club['clubs'] = Club::where('playing','<>',null)
        ->where('dawry_id',$club->dawry_id)->orderBy('points','desc')->get();

        $club['matches'] = MobaraResource::collection(Mobara::whereDate('created_at','>',Carbon::yesterday())->where('club_one_id',$club->id)
        ->orWhere('club_two_id',$club->id)->get());

        $club['post'] = PostResource::collection(Post::where('title','like','%'.$club->name.'%')
        ->where('status', 'done')->orderBy('created_at','desc')->orWhere('content','like','%'.$club->name.'%')->get());
        return new MainResource(new ClubResource($club),Response::HTTP_OK,'تم جلب الفرق بنجاح');
    }

    public function getFavorites()
    {
        $user = User::where('id',auth()->user()->id)->with('clubs')->get();
        return new MainResource(ClubResource::collection($user),Response::HTTP_OK,'تم جلب الفرق المفضلة بنجاح');
    }

    public function createFavorite(Request $request)
    {
        $validator = Validator($request->all(),[
            'club_id' => 'required|exists:clubs,id',
        ]);
        if(!$validator->fails()){
            $follower = ClubFollower::where('club_id',$request->club_id)->where('user_id',auth()->user()->id)->first();
            if($follower != null){
                $follower->delete();
                return response()->json(['message'=>'Success Delete Favorite','favorite'=>false],Response::HTTP_OK);
            }else{
                $follower = new ClubFollower();
                $follower->club_id = $request->club_id;
                $follower->user_id = auth()->user()->id;
                $follower->save();
                return response()->json(['message'=>'Success Add Favorite','favorite'=>true],Response::HTTP_OK);
            }
        }else{
            return response()->json(['message'=>'Error Add Favorite','favorite'=>false],Response::HTTP_BAD_REQUEST);
        }
    }
    public function removeFavorite(Request $request)
    {
        $validator = Validator($request->all(),[
            'club_id' => 'required|exists:clubs,id',
        ]);
        if(!$validator->fails()){
            $follower = ClubFollower::where('club_id',$request->club_id)->where('user_id',auth()->user()->id)->first();
            if($follower != null){
                $follower->delete();
                return response()->json(['message'=>'تم حذف الفرق بنجاح'],Response::HTTP_OK);
            }
        }
    }

    public function removeAllFavorite(Request $request){
        $user = User::where('id',auth()->user()->id)->first();
        $user->clubs()->detach();
        return response()->json(['status'=>true,'message'=>'تم حذف الفرق بنجاح'],Response::HTTP_OK);
    }

    public function checkFavorite($id){
        $follower = Club::where('id',$id)->whereHas('users',function($query){
            $query->where('user_id',auth()->user()->id);
        })->first();

        if(!is_null($follower)){
            return response()->json([
                'message'=>'تم التحقق بنجاح',
                'favorite'=>true
            ],Response::HTTP_OK);
        }else{
            return response()->json(['message'=>'لايوجد اي تطابق',
                'favorite'=>false
        ],Response::HTTP_OK);
        }
    }

}
