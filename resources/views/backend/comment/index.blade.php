@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

{{--
@if(Session::get('op') !== null)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Comment created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <h3 class="breadcrumb-header">Comment Table</h3>
   
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Published by
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 1])}}">↓</a>
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 1])}}">↑</a>
                    </th>
                    <th scope="col">Photo
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 2])}}">↓</a>
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 2])}}">↑</a>
                    </th>
                    <th scope="col">Date
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 3])}}">↓</a>
                        <a href="{{route(
                        'backend.comment.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 3])}}">↑</a>
                    </th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->user->nickname }}</td>
                        <td><img src="data:image/png;base64,{{ $comment->photo->photo }}" style="width: auto;
    height: 60px;
    border-radius: 0;"></td>
                        <td>{{ $comment->created_at }}</td>
                        
                        <td><a href="{{ url('backend/comment/' . $comment->id) }}" class="btn btn-inverse-primary btn-fw">Show</a></td>
                        <td><a href="{{ url('backend/comment/' . $comment->id . '/edit') }}" class="btn btn-inverse-success btn-fw">Edit</a></td>
                        <td><a href="#" data-id="{{ $comment->id }}" class="enlaceBorrar btn btn-inverse-danger btn-fw" >Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <form id="formDelete" action="{{ url('backend/comment') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
                </div>
            
        <div class="card-body">
            <a href="{{ route('backend.comment.create') }}" class="btn btn-primary">Create a new comment</a>
        </div>
    
                </div>
              </div>
            </div>
   
</div>
@endsection