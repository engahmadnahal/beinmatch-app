<?php

namespace App\Http\Controllers;

use App\Models\Dawry;
use App\Models\Like;
use App\Models\Post;
use App\Models\View;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class,'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('employee_id',auth()->user()->id)->with('employee')->latest()->paginate(15);
        return view('posts.index',[
            'posts'=>$posts
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
        $dawry = Dawry::all();
        return view('posts.craete',['dawry'=>$dawry]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
        employee_id
        dawry_id
        title
        thumnail
        content
        publish_at
        send_notfi
        status
        deleted_at
        created_at
        updated_at
    */
        $validator = Validator($request->all(),[
            "dawry_id" => "required|numeric|exists:dawries,id",
            "publish_at" => "nullable",
            "send_notfi" => "nullable",
            "post_title" => "required|string|min:15:max:40",
            "post_content" => "required|string",
            "post_img" => "required|image|mimes:png,jpg,jpeg"
        ]);
        if(!$validator->fails()){
            if ($request->hasFile('post_img')) {
                $fileName = time() . ".". $request->file('post_img')->getClientOriginalExtension();
                $request->file("post_img")->storePubliclyAs("upload",$fileName);
            }
            $post = new Post();
            $post->employee_id = auth()->user()->id;
            $post->dawry_id = $request->input('dawry_id');
            $post->title = $request->input('post_title');
            $post->thumnail = 'upload/'.$fileName;
            $post->content = $request->input('post_content');
            $post->send_notfi = $request->input('send_notfi') == "true" ? Carbon::createFromTimestamp(time()) : null;
            $post->publish_at = $request->input('publish_at') == "true" ? Carbon::createFromTimestamp(time()) : null;
            $isSaved = $post->save();
            // $isSaved = true;
            return response()->json([
                'msg'=>$isSaved ? 'Save this post is success' : 'Error saved this post'
            ],$isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::where('id',$post->id)->withCount('userComment')->withCount('userLike')->withCount('userView')->first();
        $likesYesterDay = Like::where('post_id',$post->id)->whereDate('created_at',date('Y-m-d 00:00:00',strtotime('-1 day')))->get();
        $likesToDay = Like::where('post_id',$post->id)->whereDate('created_at',date('Y-m-d 00:00:00'))->get();

        $viewYesterDay = View::where('post_id',$post->id)->whereDate('created_at',date('Y-m-d 00:00:00',strtotime('-1 day')))->get();
        $viewToDay = View::where('post_id',$post->id)->whereDate('created_at',date('Y-m-d 00:00:00'))->get();


        return view('posts.show',[
            'post'=>$post,
            'likesYesterDay' => $this->getAnlysData($likesYesterDay),
            'likesToDay' => $this->getAnlysData($likesToDay),
            'viewToDay'  => $this->getAnlysData($viewToDay),
            'viewYsterDay' => $this->getAnlysData($viewYesterDay),

        ]);
    }

    public function getAnlysData($data){
        $zeroToFiveLike = 0;
        $SixToTwelveLike = 0;
        $TwelveToEightteentLike = 0;
        $EihtteenToTwentyFour = 0;

        foreach ($data as $item ){

            $houreOfLike = substr(explode(' ',$item->created_at)[1],0,2);
            if($houreOfLike < 6){
                $zeroToFiveLike++;
            }
            else if($houreOfLike < 12 && $houreOfLike >= 6){
                $SixToTwelveLike++;
            }else if($houreOfLike < 18 && $houreOfLike >= 12){
                $TwelveToEightteentLike++;
            }else if($houreOfLike <=  24 && $houreOfLike >= 18){
                $EihtteenToTwentyFour++;
            }

        }

        return [
            'zeroFive' => $zeroToFiveLike,
            'SixTwelve' => $SixToTwelveLike,
            'TwelveEightteent' => $TwelveToEightteentLike,
            'EihtteenTwenty' => $EihtteenToTwentyFour
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $dawry = Dawry::all();
        return view('posts.edit',[
            'post'=>$post,
            'dawry'=>$dawry
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if($request->hasFile('post_img')){
            $validator = Validator($request->all(),[
                "dawry_id" => "required|numeric|exists:dawries,id",
                "publish_at" => "nullable",
                "cancel" => "nullable",
                "done" => "nullable",
                "send_notfi" => "nullable",
                "post_title" => "required|string|min:15:max:40",
                "post_content" => "required|string",
                "post_img" => "nullable|image|mimes:png,jpg,jpeg"
            ]);
        }else{
            $validator = Validator($request->all(),[
                "dawry_id" => "required|numeric|exists:dawries,id",
                "publish_at" => "nullable",
                "send_notfi" => "nullable",
                "post_title" => "required|string|min:15:max:40",
                "post_content" => "required|string",
                "cancel" => "nullable",
                "done" => "nullable",
            ]);
        }
        // if no any error
        if(!$validator->fails()){
            // Check Has img or not
            if ($request->hasFile('post_img')) {
                // run only has img
                $fileName = time() . ".". $request->file('post_img')->getClientOriginalExtension();
                $request->file("post_img")->storePubliclyAs("upload",$fileName);
                $post->thumnail = 'upload/'.$fileName;
            }
            // $post->employee_id = auth()->user()->id;
            $post->dawry_id = $request->input('dawry_id');
            $post->title = $request->input('post_title');
            $post->content = $request->input('post_content');
            $post->send_notfi = $request->input('send_notfi') == "true" ? Carbon::createFromTimestamp(time()) : null;
            $post->publish_at = $request->input('publish_at') == "true" ? Carbon::createFromTimestamp(time()) : null;
            if($request->done == "true"){
                $post->status = "done";
            }elseif($request->cancel == "true"){
                $post->status = "cancel";
            }
            $isSaved = $post->save();
            // $isSaved = true;
            return response()->json([
                'msg'=>$isSaved ? 'Save this post is success' : 'Error saved this post'
            ],$isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->back();
    }

    public function deleteAll(Request $request){
        $validator = Validator($request->all(),[
            'items'=>'required|array'
        ]);

        // dd($request->input('items'));

        if(!$validator->fails()){
            $post = new Post();
            $isDelete = $post->destroy($request->input('items'));
            return response()->json([
                'msg'=>$isDelete ? "Deleted all checked postes is Success " : "Some Error in delete checked postes !"
            ],$isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

         /**
     * Show All items is removed.
     *
     * @return \Illuminate\Http\Response
     */
    public function trush(){
        $posts = Post::onlyTrashed()->latest()->paginate(15);

        return view('posts.trash',['posts'=>$posts]);
    }

     /**
     * Method Using restor item is removed softDelete.
     * @return \Illuminate\Http\Response
     */
    public function restor($id){
        Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }



    // Custom function

    /**
     * 	enum('done', 'wite', 'cancel')
     * Get all posts , status is publish
     */
    public function getPublish(){
        $posts = Post::where('status','done')->with('employee')->latest()->paginate(15);
        return response()->json([
            'posts'=>$posts
        ],Response::HTTP_OK);
    }
    /**
     * Get all posts , status is Wai
     */
    public function getWait(){
        $posts = Post::where('status','wite')->with('employee')->latest()->paginate(15);
        return response()->json([
            'posts'=>$posts
        ],Response::HTTP_OK);
    }
    /**
     * Get all posts , status is Cancel
     */
    public function getCancel(){
        $posts = Post::where('status','cancel')->with('employee')->latest()->paginate(15);
        return response()->json([
            'posts'=>$posts
        ],Response::HTTP_OK);
    }
}
