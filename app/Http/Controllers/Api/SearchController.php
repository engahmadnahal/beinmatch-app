<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
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
            'user_id'=>'required|exists:users,id',
            'status'=>'nullable',
        ]);

        if(!$validator->fails()){

            $data['posts'] = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('content','like','%'. $request->search .'%')->get();
            $data['clubs'] = Club::where('name', 'like', '%' . $request->search . '%')->get();

            //id	content	status	user_id	deleted_at	created_at	updated_at
            $search = new Search();
            $search->content = $request->search;
            $search->status = $request->status??'error';
            $search->user_id = $request->user_id;
            $search->save();
            return new MainResource(SearchResource::collection($data),Response::HTTP_OK,'Success Get Data Seaching');
        }
    }
}
