<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\PostCommentResource;
use App\Http\Resources\PostLikeResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('status', 'done')->orderBy('created_at','desc')->paginate(10);
        return PostResource::collection($posts);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::where('id',$id)->where('status','done')->first();
        return new MainResource(new PostResource($post),Response::HTTP_OK,"Success Get Post");
    }


    // Get All Comments
    public function getAllComments($id)
    {
        // Get All Comments for Api
        $comments = Comment::where('post_id',$id)->get();
        return new MainResource(PostCommentResource::collection($comments),Response::HTTP_OK,'Success Get Comments');
    }
    // Create Comment for Post
    public function createComment(Request $request,$id)
    {
        // Validate data from request
        $validator = Validator($request->all(),[
            // 'user_id' => 'required',
            'comment' => 'required',
        ]);
        if (!$validator->fails()) {
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $id;
            $comment->content = $request->comment;
            $isSaved = $comment->save();
            $dataOfPost = Comment::where('post_id',$id)->get();
            return $isSaved
            ? new MainResource(PostCommentResource::collection($dataOfPost),Response::HTTP_OK,'Success Create Comment')
            : response()->json(['error' => 'Error Create Comment'], Response::HTTP_BAD_REQUEST);
        }
    }

    // Updata Comment For Mobara
    public function updateComment(Request $request,$id,Comment $comment){

        $validator = Validator($request->all(),[

            'comment' => 'required',
        ]);
        if (!$validator->fails()) {

            $comment->user_id = auth()->user()->id;
            $comment->post_id = $id;
            $comment->content = $request->comment;
            $isSaved = $comment->save();
            $dataOfPost = Comment::where('post_id',$id)->get();
            return $isSaved
            ? new MainResource(PostCommentResource::collection($dataOfPost),Response::HTTP_OK,'Success Create Comment')
            : response()->json(['error' => 'Error Create Comment'], Response::HTTP_BAD_REQUEST);
        }
    }

    // Delete Comment For Mobara
    public function deleteComment(Comment $comment){
        $isSaved = $comment->delete();
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
            $isSaved = Like::updateOrCreate([
                'user_id' => auth()->user()->id,
                'post_id' => $id,
            ],[
                'is_like' => $request->is_like == "true" ? 1 : 0,
            ]);
            $dataOfPost['post_id'] = $id;
            $dataOfPost['likes'] = Like::where('post_id',$id)->where('is_like',1)->count();
            $dataOfPost['dislikes'] = Like::where('post_id',$id)->where('is_like',0)->count();
            return $isSaved
            ? new MainResource(new PostLikeResource($dataOfPost),Response::HTTP_OK,'Success Like')
            : response()->json(['error' => 'Error Sent Like'], Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    // Register View For Post
    public function registerView(Request $request,$id)
    {
        $validator = Validator($request->all(),[
            'user_id' => 'required',
        ]);
        if(!$validator->fails()){
            $view = new View();
            $view->user_id = $request->user_id;
            $view->post_id = $id;
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
