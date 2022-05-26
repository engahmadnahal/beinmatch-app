<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $channels = Channel::paginate(15);
        return view('channels.index',['channels'=>$channels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('channels.craete');


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
            'urlOne' => 'required|string',
            'urlTwo' => 'required|string',
            'urlThree' => 'required|string',
            'name_channel' => 'required|string',
        ]);

        $channelUrls = [
            'one'=> $request->input('urlOne'),
            'two'=> $request->input('urlTwo'),
            'three'=> $request->input('urlThree'),
        ];

        $channel = new Channel();
        $channel->name = $request->input('name_channel');
        $channel->urls = json_encode($channelUrls);
        $channel->save();
        return redirect()->route('channels.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //

        return view('channels.show',['channel'=>$channel]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //

        return view('channels.edit',[
            'channelData'=>$channel,
            'onlyCh'=>json_decode($channel->urls)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        //
        $request->validate([
            'urlOne' => 'required|string',
            'urlTwo' => 'required|string',
            'urlThree' => 'required|string',
            'name_channel' => 'required|string',
        ]);

        $channelUrls = [
            'one'=> $request->input('urlOne'),
            'two'=> $request->input('urlTwo'),
            'three'=> $request->input('urlThree'),
        ];

        $channel->name = $request->input('name_channel');
        $channel->urls = json_encode($channelUrls);
        $channel->save();
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
        $channel->delete();
        return redirect()->route('channels.index');

    }
}
