<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preset;
use App\Models\User;
use App\Models\Valuation;
use DB;

class FrontendPresetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presets = Preset::all();
        return view ('frontend.preset.presets', ['presets' => $presets]);
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
        return view('frontend.preset.createpreset', ['presets' => $presets, 'users' => $users]);
    }
    
    public function editCreate(Preset $preset)
    {
        $users = User::all();
        return view('frontend.preset.editcreatepreset', ['preset' => $preset, 'users' => $users]);
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
            return redirect('/mypresets')->with($response);
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
    
    public function showpreset(User $user, $id)
    {
        $preset = Preset::find($id);
        $valuations = DB::select("select * from presets, valuations, users where presets.id = valuations.idpreset and valuations.idpreset = $id and valuations.iduser = users.id");
        $iduserid = auth()->user()->id;
        $presetfavourites = DB::select("select * from presets, favourites WHERE favourites.idpreset = presets.id and presets.id = $id and favourites.iduser = $iduserid");
        //dd($contact);
         if($presetfavourites == null ){
           $presetfavourites=0;
           return view('frontend.preset.singlepreset', ['preset' => $preset, 'valuations' => $valuations, 'presetfavourites' => $presetfavourites]);
         }
        return view('frontend.preset.singlepreset', ['preset' => $preset, 'valuations' => $valuations, 'presetfavourites' => $presetfavourites]);
    }
    
    public function createValuation(Request $request, $id)
    {
        $valuation = new Valuation($request->all());
        // dd($object);
        try {

            $result = $valuation->save();

        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($valuation->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $valuation->id];
            return back();
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preset = Preset::find($id);
        $users = User::all();
        return view('frontend.preset.editpreset', ['preset' => $preset, 'users' => $users]);
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
         $preset = Preset::find($id);
        try {
            $result = $preset->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $preset->id];
            return redirect('/home/presets/' .$id)->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }
    
    public function mypresets() {
        $id = auth()->user()->id;
        $presets = DB::select("select * from presets, users where presets.iduser = $id and users.id = $id");
        return view ('frontend.preset.mypresets', ['presets' => $presets]);
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
