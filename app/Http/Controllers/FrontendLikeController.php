<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use DB;

class FrontendLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $likes = DB::select("select likes.id, users.nickname as nickname, photos.id as idphoto, photos.photo, photos.created_at as datecreate from likes, users, photos where likes.iduser = users.id and likes.idphoto = photos.id and likes.iduser = $id order by photos.created_at desc");
        return view ('frontend.like.likes', ['likes' => $likes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Like($request->all());
        try {
            $result = $object->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $object->id];
             return back()->withInput();
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        } 
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
   public function destroy($idlike, $id, $iduser)
    {
        $like = Like::find($idlike);
       
        $id = $like->id;
         
        try {
            $result = $like->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return back();
    }
}
