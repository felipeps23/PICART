<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\User;
use App\Models\Preset;
use Illuminate\Http\Request;

class BackendFavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'idpreset'];
        $favourites = new Favourite();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $favourites = $favourites->where('id', 'like', '%' . $search . '%')
                                ->orWhere('iduser', 'like', '%' . $search . '%')
                                ->orWhere('idpreset', 'like', '%' . $search . '%');
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
            $favourites = $favourites->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $favourites = $favourites->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.favourite.index', array_merge(['favourites' => $favourites], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $favourites = Favourite::all();
        $users = User::all();
        $presets = Preset::all();
        return view('backend.favourite.create', ['favourites' => $favourites, 'users' => $users, 'presets' => $presets]);
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
            return redirect('backend/favourite')->with($response);
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
    public function show(Favourite $favourite)
    {
        return view('backend.favourite.show', ['favourite' => $favourite]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        $users = User::all();
        $presets = Preset::all();
        return view('backend.favourite.edit', ['favourite' => $favourite, 'users' => $users, 'presets' => $presets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        try {
            $result = $favourite->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $favourite->id];
            return redirect('backend/favourite')->with($response);
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
    public function destroy(Favourite $favourite)
    {
        $id = $favourite->id;
        try {
            $result = $favourite->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/favourite')->with($response);
    }
}
