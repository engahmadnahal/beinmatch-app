<?php

namespace App\Http\Controllers;

use App\Http\Helper\CustomTrait;
use App\Models\MangerFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MangerFileController extends Controller
{
    use CustomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mangerfile.index',[
            'mangerfiles' => MangerFile::all()
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
        return view('mangerfile.craete');
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
            'file'=>'required|mimes:png,jpg,jpeg,mp4,mov,flv,wmv,avi,mpg,3gp,mkv,mpeg',
            'title'=>'required|string|max:100',
            'typeFile'=>'required|string|max:10'
        ]);

        if(!$validator->fails()){
            $fileName = $this->uploadFile($request->file('file'));
            $mangerFile = new MangerFile();
            $mangerFile->title = $request->title;
            $mangerFile->file = $fileName;
            $mangerFile->user_id = auth()->user()->id;
            if($request->typeFile == 'image'){
                $mangerFile->type = 'image';
            }else if($request->typeFile == 'video'){
                $mangerFile->type = 'video';
            }
            $mangerFile->save();
            return response()->json([
                'msg'=>"Upladed Successfully",
            ],Response::HTTP_OK);
        }else{
             return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MangerFile  $mangerFile
     * @return \Illuminate\Http\Response
     */
    public function show(MangerFile $mangerFile)
    {
        //
        return redirect(Storage::url($mangerFile->file));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MangerFile  $mangerFile
     * @return \Illuminate\Http\Response
     */
    public function edit(MangerFile $mangerFile)
    {
        //
        return view('mangerfile.edit',[
            'mangerFile'=>$mangerFile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MangerFile  $mangerFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MangerFile $mangerFile)
    {
        //
        $validator = Validator($request->all(),[
            'file'=>'nullable|mimes:png,jpg,jpeg,mp4,mov,flv,wmv,avi,mpg,3gp,mkv,mpeg',
            'title'=>'required|string|max:100',
            'typeFile'=>'required|string|max:10'
        ]);

        if(!$validator->fails()){
            $fileName = $this->uploadFile($request->file('file'));
            $mangerFile = new MangerFile();
            $mangerFile->title = $request->title;
            $mangerFile->user_id = auth()->user()->id;
            if($request->typeFile == 'image'){
                    $mangerFile->type = 'image';
                }else if($request->typeFile == 'video'){
                    $mangerFile->type = 'video';
                }
            if($request->hasFile('file')){
                Storage::delete($mangerFile->file);
                $mangerFile->file = $fileName;
            }
            $mangerFile->save();
            return response()->json([
                'msg'=>"Update Successfully",
            ],Response::HTTP_OK);
        }else{
             return response()->json([
                'msg'=>$validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MangerFile  $mangerFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MangerFile $mangerFile)
    {
        //
        $mangerFile->delete();
        Storage::delete($mangerFile->file);
        return redirect()->back();
    }
}
