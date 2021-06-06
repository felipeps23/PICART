<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Preset;
use App\Models\User;
use Illuminate\Http\Request;

class BackendPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'idpreset', 'date'];
        $purchases = new Purchase();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $purchases = $purchases->where('iduser', 'like', '%' . $search . '%')
                                        ->orWhere('idpreset', 'like', '%' . $search . '%')
                                        ->orWhere('date', 'like', '%' . $search . '%');
        }
        $orderby = $request->input('orderby');
        $sort = 'asc';
        if($orderby != null) {
            if(!isset($order[$orderby])) {
                $orderby = 0;
            }
            $orderbyField = $order[$orderby];
            if($request->input('sort') != null) {
                $sort = $request->input('sort');
                if(!($sort == 'asc' || $sort == 'desc')) {
                    $sort = 'asc';
                }
            }
            $purchases = $purchases->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $purchases = $purchases->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.purchase.index', array_merge(['purchases' => $purchases], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchases = Purchase::all();
        $presets = Preset::all();
        $users = User::all();
        return view('backend.purchase.create', ['purchases' => $purchases, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $purchases = new Purchase($request->all());
        try {
            $result = $purchases->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($purchases->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $purchases->id];
            return redirect('backend/purchase')->with($response);
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
    public function show(Purchase $purchase)
    {
        return view('backend.purchase.show', ['purchase' => $purchase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $presets = Preset::all();
        $users = User::all();
        return view('backend.purchase.edit', ['purchase' => $purchase, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        try {
            $result = $purchase->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $purchase->id];
            return redirect('backend/purchase')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $id = $purchase->id;
        try {
            $result = $purchase->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/purchase')->with($response);
    }
}
