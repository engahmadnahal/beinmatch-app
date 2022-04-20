<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Dawry;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DawryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dawry = Dawry::paginate(15);

        return view('dawry.index',['dawry'=>$dawry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dawry.craete');

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

        $validator = Validator($request->all(),[
            'dawry_name' => 'required|string',
            'dawry_img' => 'required|string'
        ]);
        if(!$validator->fails()){
            $dawry = new Dawry();
            $dawry->name = $request->input('dawry_name');
            $dawry->avater = $request->input('dawry_img');
            $isSaved = $dawry->save();
            return response()->json([
                'msg'=>$isSaved ? 'Save is Success' : 'Error is saved'
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
     * @param  \App\Models\Dawry  $dawry
     * @return \Illuminate\Http\Response
     */
    public function show(Dawry $dawry)
    {
        //
        $data = Dawry::where('id',$dawry->id)->withCount('clubs')->withCount('users')->first();
        // dd($data);
        $club = Club::where('points','>=',0)->where('dawry_id',$dawry->id)->orderBy('points','desc')->orderBy('difference','desc')->get();
        return view('dawry.show',['dawry'=>$data,'clubs'=>$club]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dawry  $dawry
     * @return \Illuminate\Http\Response
     */
    public function edit(Dawry $dawry)
    {
        //
        return view('dawry.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dawry  $dawry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dawry $dawry)
    {
            $validator = Validator($request->all(),[
            'dawry_name' => 'required|string',
            'dawry_img' => 'required|string'
        ]);
        if(!$validator->fails()){
            $dawry->name = $request->input('dawry_name');
            $dawry->avater = $request->input('dawry_img');
            $isSaved = $dawry->save();
            return response()->json([
                'msg'=>$isSaved ? 'Save is Success' : 'Error is saved'
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
     * @param  \App\Models\Dawry  $dawry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dawry $dawry)
    {
        //
        $dawry->delete();
        return redirect()->back();
    }
}
