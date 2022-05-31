<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\MobaraResource;
use App\Models\Mobara;
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
}
