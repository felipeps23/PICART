<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Preset;
use DB;

class FrontendPurchaseController extends Controller
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
    public function destroy($id)
    {
        //
    }
    
    public function myshopping() {
        //$purchases = Purchase::all();
        $id = auth()->user()->id;
        $purchases = DB::select("select presets.name as pname, users.nickname, presets.price, presets.photo from purchases, presets, users where purchases.iduser = $id and purchases.idpreset = presets.id and users.id = $id");
        return view ('frontend.purchase.myshopping', ['purchases' => $purchases]);
    }
    
    public function cart(Request $request)
    {
         $object = new Purchase($request->all());

        // dd($object);
        try {

            $result = $object->save();

        } catch(\Exception $e) {
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('/cart/{id}')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    public function cartview(Preset $preset)
    {
        $preset = Preset::all();
        //$wanteds = DB::select("select wanteds.id, users.name, product.id as idproduct, product.name as pname, product.photo as photo, product.price as price, product.state as state, wanteds.id as wantid from product, wanteds, users 
        //                       where wanteds.iduser = $id 
        //                        AND wanteds.idproduct = product.id and wanteds.iduser = users.id");
        //$puchases = DB::select("select * from purchases");
        return view('frontend.purchase.cart', ['preset' => $preset]);
    }
}
