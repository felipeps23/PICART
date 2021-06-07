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
            Favourite created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <h3 class="breadcrumb-header">Favourite Table</h3>
   
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Published by
                        <a href="{{route(
                        'backend.favourite.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 1])}}">↓</a>
                        <a href="{{route(
                        'backend.favourite.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 1])}}">↑</a>
                    </th>
                    <th scope="col">To
                        <a href="{{route(
                        'backend.favourite.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 2])}}">↓</a>
                        <a href="{{route(
                        'backend.favourite.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 2])}}">↑</a>
                    </th>
                    <th scope="col">Img preset</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($favourites as $favourite)
                    <tr>
                        <td>{{ $favourite->id }}</td>
                        <td>{{ $favourite->user->nickname }}</td>
                        <td>{{ $favourite->preset->name }}</td>
                       
                        <td><img src="data:image/png;base64,{{ $favourite->preset->photo }}" style="width:50px;"></td>
                    
                        <td><a href="{{ url('backend/favourite/' . $favourite->id) }}" class="btn btn-inverse-primary btn-fw">Show</a></td>
                        <td><a href="{{ url('backend/favourite/' . $favourite->id . '/edit') }}" class="btn btn-inverse-success btn-fw">Edit</a></td>
                        <td><a href="#" data-id="{{ $favourite->id }}" class="enlaceBorrar btn btn-inverse-danger btn-fw" >Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <div class="col-lg-6">
                    {{ $favourites->links() }}
                </div>
                <form id="formDelete" action="{{ url('backend/favourite') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
                </div>
            
        <div class="card-body">
            <a href="{{ route('backend.favourite.create') }}" class="btn btn-primary">Create a new favourite</a>
        </div>
    </div>
              </div>
            </div>
   
</div>
@endsection