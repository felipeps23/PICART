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
            Photo created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                <h4 class="panel-title">Our photos</h4>
            
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Published by
                        <a href="{{route(
                        'backend.photo.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 1])}}">↓</a>
                        <a href="{{route(
                        'backend.photo.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 1])}}">↑</a>
                    </th>
                    <th scope="col">Preset used
                        <a href="{{route(
                        'backend.photo.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 2])}}">↓</a>
                        <a href="{{route(
                        'backend.photo.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 2])}}">↑</a>
                    </th>
                    <th scope="col">Photo</th>
                    <th scope="col">Type
                        <a href="{{route(
                        'backend.photo.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 3])}}">↓</a>
                        <a href="{{route(
                        'backend.photo.index',
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
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td>{{ $photo->user->nickname }}</td>
                        <td>{{ $photo->preset->name }}</td>
                        <td><img src="data:image/png;base64,{{ $photo->photo }}" style="width:100px;"></td>
                        <td>{{ $photo->url }}</td>
                        <td>{{ $photo->type}}</td>
                        
                        <td><a href="{{ url('backend/photo/' . $photo->id) }}" class="btn btn-info">Show</a></td>
                        <td><a href="{{ url('backend/photo/' . $photo->id . '/edit') }}" class="btn btn-success">Edit</a></td>
                        <td><a href="#" data-id="{{ $photo->id }}" class="enlaceBorrar btn btn-danger" >Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <form id="formDelete" action="{{ url('backend/photo') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
                
        </div>
        <div class="card-body">
            <a href="{{ route('backend.photo.create') }}" class="btn btn-primary">Create a new photo</a>
        </div>
     </div>
              </div>
            </div>
   
</div>
@endsection