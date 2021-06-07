<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Preset;
use App\Models\User;
use App\Models\Comment;
use DB;

class FrontendPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = DB::select("SELECT * from users,photos where photos.iduser = users.id order by photos.id desc");
        return view ('frontend.photo.feed', ['photos' => $photos]);
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
        return view('frontend.photo.createphoto', ['photos' => $photos, 'presets' => $presets, 'users' => $users]);
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
            return redirect('/myphotos')->with($response);
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
    
    public function showphoto(User $user, $id)
    {
        $photo = Photo::find($id);
        $comments = DB::select("select comments.id as idcomment, comments.iduser as idusercomment, comments.idphoto, comments.description, photos.id, photos.iduser, photos.idpreset, photos.camera, photos.lens, photos.shutter_speed, photos.iso, photos.focal, photos.type, photos.created_at, users.id, users.nickname, users.name from comments, photos, users where photos.id = comments.idphoto and comments.idphoto = $id and comments.iduser = users.id order by comments.created_at desc");
        $likesall =DB::select("SELECT COUNT(*) as likesall from photos, likes where photos.id = likes.idphoto and photos.id = $id");
        // dd($likesall);
        $iduserid = auth()->user()->id;
        $photolikes = DB::select("select * from photos, likes WHERE likes.idphoto = photos.id and photos.id = $id and likes.iduser = $iduserid");
        //dd($contact);
        if($photolikes == null ){
           $photolikes=0;
            return view('frontend.photo.singlephoto', ['photo' => $photo, 'comments' => $comments, 'photolikes' => $photolikes, 'likesall'=>$likesall]);

        }

        return view('frontend.photo.singlephoto', ['photo' => $photo, 'comments' => $comments, 'photolikes' => $photolikes,'likesall'=> $likesall]);
    }
    
    public function createComment(Request $request, $id)
    {
        $comment = new Comment($request->all());
        // dd($object);
        try {

            $result = $comment->save();

        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($comment->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $comment->id];
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
        $photo = Photo::find($id);
        $presets = Preset::all();
        $users = User::all();
        return view('frontend.photo.editphoto', ['photo' => $photo, 'presets' => $presets, 'users' => $users]);
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
        $photo = Photo::find($id);
        try {
            $result = $photo->update($request->all());
        } catch (\Exception $e) {
            
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $photo->id];
            
            return redirect('/home/photos/' .$id)->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }
    
    public function destroyComment($id)
    {
        $comment = Comment::find($id);
        $id = $comment->id;
        try {
            $result = $comment->delete();
        } catch(\Exception $e) {
            $result = 0;

        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
       $id = $photo->id;
        try {
            $result = $photo->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('/feed');
    }
    
    public function myphotos() {
        $id = auth()->user()->id;
        $photos = DB::select("select photos.id, photos.iduser, photos.photo, photos.created_at from photos, users where photos.iduser = $id and users.id = $id order by photos.created_at desc");
        $photosgraphics = DB::select("select photos.id as idphotos, photos.photo as img, count(*) as numbergraphic from photos, users, likes where users.id = photos.iduser and photos.iduser = $id and users.id = $id and photos.id = likes.idphoto GROUP BY idphotos, img ORDER by photos.created_at desc limit 5");
        return view ('frontend.photo.myphotos', ['photos' => $photos, 'photosgraphics' => $photosgraphics ]);
    }

}
