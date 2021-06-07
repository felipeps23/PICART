<?php

namespace App\Http\Controllers;

use App\Models\Valuation;
use App\Models\User;
use App\Models\Preset;
use Illuminate\Http\Request;

class BackendValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'idpreset','valuation', 'text_valuation'];
        $valuations = new Valuation();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $valuations = $valuations->where('id', 'like', '%' . $search . '%')
                                ->orWhere('iduser', 'like', '%' . $search . '%')
                                ->orWhere('idpreset', 'like', '%' . $search . '%')
                                ->orWhere('valuation', 'like', '%' . $search . '%')
                                ->orWhere('text_valuation', 'like', '%' . $search . '%');
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
            $valuations = $valuations->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $valuations = $valuations->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.valuation.index', array_merge(['valuations' => $valuations], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $valuations = Valuation::all();
        $presets = Preset::all();
        $users = User::all();
        return view('backend.valuation.create', ['valuations' => $valuations, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $valuations = new Valuation($request->all());
        try {
            $result = $valuations->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($valuations->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $valuations->id];
            return redirect('backend/valuation')->with($response);
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
    public function show(Valuation $valuation)
    {
        return view('backend.valuation.show', ['valuation' => $valuation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Valuation $valuation)
    {
        $presets = Preset::all();
        $users = User::all();
        return view('backend.valuation.edit', ['valuation' => $valuation, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valuation $valuation)
    {
        try {
            $result = $valuation->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $valuation->id];
            return redirect('backend/valuation')->with($response);
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
    public function destroy(Valuation $valuation)
    {
        $id = $valuation->id;
        try {
            $result = $valuation->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/valuation')->with($response);
    }
}
