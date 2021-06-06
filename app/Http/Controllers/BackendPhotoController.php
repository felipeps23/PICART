<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Preset;
use App\Models\User;
use Illuminate\Http\Request;

class BackendPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'idpreset','photo', 'url', 'lens', 'shutter_speed', 'iso', 'focal', 'type'];
        $photos = new Photo();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $photos = $photos->where('id', 'like', '%' . $search . '%')
                                ->orWhere('iduser', 'like', '%' . $search . '%')
                                ->orWhere('idpreset', 'like', '%' . $search . '%')
                                ->orWhere('photo', 'like', '%' . $search . '%')
                                ->orWhere('url', 'like', '%' . $search . '%')
                                ->orWhere('lens', 'like', '%' . $search . '%')
                                ->orWhere('shutter_speed', 'like', '%' . $search . '%')
                                ->orWhere('iso', 'like', '%' . $search . '%')
                                ->orWhere('focal', 'like', '%' . $search . '%')
                                ->orWhere('type', 'like', '%' . $search . '%');
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
            $photos = $photos->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $photos = $photos->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.photo.index', array_merge(['photos' => $photos], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        $presets = Preset::all();
        $users = User::all();
        return view('backend.photo.create', ['photos' => $photos, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $photos = new Photo($request->all());
        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $path = $file->getRealPath();
            $photo = file_get_contents($path);
            $base64 = base64_encode($photo);
            $photos->photo = $base64;
        }
        // dd($object);
        try {
            $result = $photos->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($photos->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $photos->id];
            return redirect('backend/photo')->with($response);
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
    public function show(Photo $photo)
    {
        return view('backend.photo.show', ['photo' => $photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $presets = Preset::all();
        $users = User::all();
        return view('backend.photo.edit', ['photo' => $photo, 'presets' => $presets, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        try {
            $result = $photo->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $photo->id];
            return redirect('backend/photo')->with($response);
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
    public function destroy(Photo $photo)
    {
        $id = $photo->id;
        try {
            $result = $photo->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/photo')->with($response);
    }
}
