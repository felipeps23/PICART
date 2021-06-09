<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BackendController extends Controller
{
    function main() {
        $totalphotos = DB::select('SELECT count(*) as total FROM photos');
        $totalpresets = DB::select('SELECT count(*) as total FROM presets');
        $totalcomments = DB::select('SELECT count(*) as total FROM comments');
        $totalvaluations = DB::select('SELECT count(*) as total FROM valuations');
        $totalfavourites = DB::select('SELECT count(*) as total FROM favourites');
        $totalvaluations = DB::select('SELECT count(*) as total FROM valuations');
        $totalpurchases = DB::select('SELECT count(*) as total FROM purchases');
        
        $last7presets = DB::select('SELECT * FROM presets ORDER BY created_at DESC LIMIT 7');
        $last5comments = DB::select('SELECT users.nickname as nickname, photos.photo as photo, comments.created_at, comments.description FROM users, photos, comments where  photos.iduser = users.id and photos.id = comments.idphoto ORDER BY created_at DESC LIMIT 5');
        $usersWithMorePhotos = DB::select('select users.nickname, count(*) as totalphotos from photos, users where photos.iduser = users.id GROUP BY users.nickname ORDER by totalphotos desc limit 5');
        
        return view('backend.index', ['totalphotos' => $totalphotos, 
                                    'totalpresets' => $totalpresets, 
                                    'totalcomments' => $totalcomments, 
                                    'totalvaluations' => $totalvaluations, 
                                    'totalfavourites' => $totalfavourites, 
                                    'totalvaluations' => $totalvaluations, 
                                    'totalpurchases' => $totalpurchases,
                                    'last7presets' => $last7presets,
                                    'last5comments' => $last5comments,
                                    'usersWithMorePhotos' => $usersWithMorePhotos]);
    }
}