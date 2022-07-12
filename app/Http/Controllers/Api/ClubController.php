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

        $club['matches'] = MobaraResource::collection(Mobara::where('club_one_id',$club->id)
        ->orWhere('club_two_id',$club->id)->get());

        $club['post'] = PostResource::collection(Post::where('title','like','%'.$club->name.'%')
        ->orWhere('content','like','%'.$club->name.'%')->get());
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
                return response()->json(['message'=>'Success Delete Favorite'],Response::HTTP_OK);
            }else{
                $follower = new ClubFollower();
                $follower->club_id = $request->club_id;
                $follower->user_id = auth()->user()->id;
                $follower->save();
                return response()->json(['message'=>'Success Add Favorite'],Response::HTTP_OK);
            }
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

}
