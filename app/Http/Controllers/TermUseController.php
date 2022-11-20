<?php

namespace App\Http\Controllers;

use App\Models\Privacy;
use App\Models\TermUse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TermUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function show(TermUse $termUse)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $termUse
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $termUse = TermUse::find($id);
        return view('app.term',['data' => $termUse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator($request->all(),[
            'title'=>'required|string',
            'body'=>'required|string',
        ]);
        if(!$validator->fails()){
            $termUse = TermUse::find($id);
            $termUse->update([
                "title"=>$request->title,
                "body"=>$request->body,
            ]);
            return response()->json([
                'msg'=>'Success Edit'
            ],Response::HTTP_OK );
        }else{
             return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermUse  $termUse
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermUse $termUse)
    {
        //
    }
}
