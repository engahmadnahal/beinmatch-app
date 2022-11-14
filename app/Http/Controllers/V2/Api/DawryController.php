<?php

namespace App\Http\Controllers\V2\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DawryResource;
use App\Http\Resources\MainResource;
use App\Models\Club;
use App\Models\Dawry;
use App\Models\Mobara;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DawryController extends Controller
{
    //
    public function index()
    {
        $dawry = Dawry::without('clubs')->paginate(10);
        return new MainResource(DawryResource::collection($dawry),Response::HTTP_OK,'Success Get Dawry Data');
    }

    public function show($id)
    {

        $dawry = Dawry::where('id',$id)->without('clubs')->first();
        $dawry['club'] = Club::where('playing','<>',null)
        ->where('dawry_id',$dawry->id)->orderBy('points','desc')->get();
        $dawry['matches'] = Mobara::where('botola',$dawry->id)->get();
        $dawry['post'] = Post::where('title','like','%'.$dawry->name.'%')
        ->orWhere('content','like','%'.$dawry->name.'%')->get();
        return new MainResource(new DawryResource($dawry),Response::HTTP_OK,'Success Get Dawry Data');
    }


}
