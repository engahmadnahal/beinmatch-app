<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\rfs;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(15);
        return view('users.index',['users'=>$users]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $rfs)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->status = 'delete';
        $user->save();
        Comment::where('user_id',$user->id)->delete();
        return redirect()->back();
    }

    /**
     * Show All items is removed.
     *
     * @return \Illuminate\Http\Response
     */

    public function trush(){
        $users = User::onlyTrashed()->get();
        return view('users.trash',['users'=>$users]);
    }

     /**
     * Method Using restor item is removed softDelete.
     * @return \Illuminate\Http\Response
     */
    public function restor($id){
        User::withTrashed()->where('id',$id)->restore();
        Comment::withTrashed()->where('user_id',$id)->restore();
        return redirect()->back();
    }

    public function block($id){
        $user = User::findOrFail($id);
        $user->status = 'block';
        $user->save();

        return redirect()->back();
    }
}
