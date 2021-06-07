<?php

namespace App\Http\Controllers;

use App\Models\Preset;
use App\Models\User;
use Illuminate\Http\Request;

class BackendPresetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'name', 'description', 'photo', 'file', 'price'];
        $presets = new Preset();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $presets = $presets->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('iduser', 'like', '%' . $search . '%')
                                        ->orWhere('description', 'like', '%' . $search . '%')
                                        ->orWhere('photo', 'like', '%' . $search . '%')
                                        ->orWhere('file', 'like', '%' . $search . '%')
                                        ->orWhere('price', 'like', '%' . $search . '%');
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
            $presets = $presets->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $presets = $presets->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.preset.index', array_merge(['presets' => $presets], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presets = Preset::all();
        $users = User::all();
        return view('backend.preset.create', ['presets' => $presets, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        
        $presets = new Preset($request->all());
        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $path = $file->getRealPath();
            $photo = file_get_contents($path);
            $base64 = base64_encode($photo);
            $presets->photo = $base64;
        }
        // dd($object);
        try {
            $result = $presets->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($presets->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $presets->id];
             //return redirect('backend/preset')->with($response);
            return redirect('backend/preset/' . $presets->id . '/editcreate' )->with($response);
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
    public function show(Preset $preset)
    {
        return view('backend.preset.show', ['preset' => $preset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Preset $preset)
    {
        $users = User::all();
        return view('backend.preset.edit', ['preset' => $preset, 'users' => $users]);
    }
    
    public function editCreate(Preset $preset)
    {
        $users = User::all();
        return view('backend.preset.editcreate', ['preset' => $preset, 'users' => $users]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preset $preset)
    {
         $public = $this->uploadPublicFile($request, $preset->id);
        
        try {
            $result = $preset->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $preset->id];
            return redirect('backend/preset')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }
    public function updateCreate(Request $request, Preset $preset)
    {
         $public = $this->uploadPublicFile($request, $preset->id);
        
        try {
            $result = $preset->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $preset->id];
            return redirect('backend/preset')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }
    private function deleteFiles($id) {
        $extensions = ['zip', 'rar'];
        $deleted = 0;
        $errors = 0;
        foreach($extensions as $extension) {
            if(file_exists('logos/' . $id . '.' . $extension) &&
                !unlink('logos/' . $id . '.' . $extension)) {
                    $errors++;
            }
        }
        return $errors == 0;
    }
    private function uploadFile(Request $request, $id, string $fileName, string $target, $deleteFiles = false) {
        $result = false;
        $deleted = true;
        if($request->hasFile($fileName) && $request->file($fileName)->isValid()) {
            if($deleteFiles) {
                $deleted = $this->deleteFiles($id);
            }
            $file = $request->file($fileName);
            $ext = \File::extension($file->getClientOriginalName());
            $name = $id . '.' . $ext;
            $result = $file->move($target, $name);
        }
        return $result && $deleted;
    }
    
    private function uploadPublicFile(Request $request, $id) {
        return $this->uploadFile($request, $id, 'file', 'logos/', true);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preset $preset){
        $id = $preset->id;
         $deleted = $this->deleteFiles($id);
        try {
            $result = $preset->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/preset')->with($response);
    }
}
