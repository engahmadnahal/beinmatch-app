<?php

namespace App\Http\Controllers;

use App\Jobs\ClubDataJob;
use App\Models\Club;
use App\Models\Dawry;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clubs = Club::paginate(12);
        $dawrys = Dawry::all();
        return view('clubs.index',[
            'clubs' => $clubs,
            'dawrys' => $dawrys
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
        // create variable for dawrys
        $dawrys = Dawry::all();
        return view('clubs.craete',[
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
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'dawry' => 'required|integer',
            'logo_url'=>'required|string',
            'country'=>'required|string',
        ]);
        $club = new Club();
        $club->name = $request->input('name');
        $club->dawry_id = $request->input('dawry');
        $club->avater = $request->input('logo_url');
        $club->country = $request->input('country');
        $club->save();
        return redirect()->route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
        return view('clubs.show',[
            'club'=>$club,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
        $dawrys = Dawry::all();
        return view('clubs.edit',[
            'club'=>$club,
            'dawrys'=>$dawrys,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'dawry' => 'required|integer',
            'logo_url'=>'required|string',
            'country'=>'required|string',
        ]);
        $club->name = $request->input('name');
        $club->dawry_id = $request->input('dawry');
        $club->avater = $request->input('logo_url');
        $club->country = $request->input('country');
        $club->save();
        return redirect()->route('clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
        $club->delete();
        return redirect()->route('clubs.index');
    }


    public function getDataClub(){
        ClubDataJob::dispatch();
        return response()->json(['msg'=>"تم اضافتها للمهام"]);
    }
}
