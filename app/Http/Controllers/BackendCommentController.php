<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;

class BackendCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = ['id', 'iduser', 'idphoto', 'description'];
        $comments = new Comment();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $comments = $comments->where('id', 'like', '%' . $search . '%')
                                ->orWhere('iduser', 'like', '%' . $search . '%')
                                ->orWhere('idphoto', 'like', '%' . $search . '%')
                                ->orWhere('photo', 'like', '%' . $search . '%')
                                ->orWhere('description', 'like', '%' . $search . '%')
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
            $comments = $comments->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $comments = $comments->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.comment.index', array_merge(['comments' => $comments], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comments = Comment::all();
        $users = User::all();
        $photos = Photo::all();
        return view('backend.comment.create', ['comment' => $comments, 'photos' => $photos, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $comments = new Comment($request->all());
        try {
            $result = $comments->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($comments->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $comments->id];
            return redirect('backend/comment')->with($response);
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
    public function show(Comment $comment)
    {
        return view('backend.comment.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $photos = Photo::all();
        return view('backend.comment.edit', ['comment' => $comment, 'photos' => $photos, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        try {
            $result = $comment->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $comment->id];
            return redirect('backend/comment')->with($response);
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
    public function destroy(Commment $comment)
    {
        $id = $comment->id;
        try {
            $result = $comment->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/comment')->with($response);
    }
}
