<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use DB;

class FrontendFavouriteController extends Controller
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
         $object = new Favourite($request->all());
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
    public function destroy($idfavourite, $id, $iduser)
    {
        $favourite = Favourite::find($idfavourite);
       
        $id = $favourite->id;
         
        try {
            $result = $favourite->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return back();
    }
    
    public function myfavourites() {
        $id = auth()->user()->id;
        $favourites = DB::select("select favourites.created_at, presets.photo as presetphoto, presets.name as pname, presets.price, presets.id as idpreset from favourites, presets, users where favourites.iduser = $id and favourites.idpreset = presets.id and users.id = $id order by presets.id desc");
        return view ('frontend.favourite.savedpresets', ['favourites' => $favourites]);
    }
}
