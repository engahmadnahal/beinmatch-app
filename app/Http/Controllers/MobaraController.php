<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Club;
use App\Models\Dawry;
use App\Models\Mobara;
use Carbon\Carbon;
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
        //
        return view('matches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dawrys = Dawry::all();
        $clubs = Club::all();
        $channel = Channel::all();
        return view('matches.craete',[
            'channel'=>$channel,
            'clubs'=>$clubs,
            'dawrys'=>$dawrys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // id	employee_id	club_one_id	club_two_id	start	botola	channel_id	voice_over	publish_at
        $request->validate([
            "publish_match"=>'required',
            "club_one" => "required",
            "club_two" => "required",
            "botola" => "required",
            "timeStart" => "required",
            "voice" => "required",
            "channel" => "required",

        ]);
        $mobara = new Mobara();
        $mobara->employee_id = auth()->user()->id;
        $mobara->club_one_id = $request->input('club_one');
        $mobara->club_two_id = $request->input('club_two');
        $mobara->start = $request->input('timeStart');
        $mobara->botola = $request->input('botola');
        $mobara->channel_id = $request->input('channel');
        $mobara->voice_over = $request->input('voice');
        $mobara->publish_at = $request->input('publish_match') == 'on' ? Carbon::createFromTimestamp(time()) : null;
        $mobara->save();
        return redirect()->route('matches.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Http\Response
     */
    public function show(Mobara $mobara)
    {
        //
         return view('matches.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobara $mobara)
    {
        //
        return view('matches.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobara $mobara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobara  $mobara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobara $mobara)
    {
        //
        $mobara->delete();
        return redirect()->back();
    }

           /**
     * Show All items is removed.
     *
     * @return \Illuminate\Http\Response
     */
    public function trush(){
        $mobara = Mobara::onlyTrashed()->latest()->paginate(15);

        return view('matches.trash',['mobara'=>$mobara]);
    }

     /**
     * Method Using restor item is removed softDelete.
     * @return \Illuminate\Http\Response
     */
    public function restor($id){
        Mobara::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }



    // Custom function

    /**
     * 	enum('done', 'wite', 'cancel')
     * Get all posts , status is publish
     */
    public function getPublish(){
        $mobara = Mobara::where('status','done')->with('employee')->latest()->paginate(15);
        return response()->json([
            'mobara'=>$mobara
        ],Response::HTTP_OK);
    }
    /**
     * Get all posts , status is Wai
     */
    public function getWait(){
        $mobara = mobara::where('status','wite')->with('employee')->latest()->paginate(15);
        return response()->json([
            'mobara'=>$mobara
        ],Response::HTTP_OK);
    }
    /**
     * Get all posts , status is Cancel
     */
    public function getCancel(){
        $mobara = mobara::where('status','cancel')->with('employee')->latest()->paginate(15);
        return response()->json([
            'mobara'=>$mobara
        ],Response::HTTP_OK);
    }
}
