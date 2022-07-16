<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\SearchResource;
use App\Models\Club;
use App\Models\Post;
use App\Models\Search;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    //

    public function getData(Request $request){
        $validator = Validator($request->all(),[
            'search'=>'required|string|max:255',
            // 'user_id'=>'required|exists:users,id',
            'status'=>'required|string|max:50',
        ]);

        if(!$validator->fails()){

            // Get Post same name search

            $data = [
                'posts' => PostResource::collection(Post::where('title','like','%'.$request->search.'%')
                            ->orWhere('content','like','%'.$request->search.'%')->get()),
                'clubs' => Club::where('name', 'like', '%' . $request->search . '%')->get(),
            ];
            $search = new Search();
            $search->content = $request->search;
            $search->status = $request->status??'error';
            $search->user_id = auth()->user()->id;
            $search->save();
            return new MainResource(new SearchResource($data),Response::HTTP_OK,'تم جلب البحث بنجاح');
        }else{
            return response()->json([
                'status' => 'false',
                'message' => $validator->getMessageBag()->first(),
            ],Response::HTTP_BAD_REQUEST);
        }
    }
}
