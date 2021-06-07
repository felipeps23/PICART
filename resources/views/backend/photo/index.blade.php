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
            Valuation created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Our Photos</h4>
                  <!--<p class="card-description">-->
                  <!--  Add class <code>.table</code>-->
                  <!--</p>-->
                  <div class="table-responsive">
                    <table class="table">
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
                            <th scope="col">Photo</th>
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
                            <td>{{ $photo->type}}</td>
                            <td><img src="data:image/png;base64,{{ $photo->photo }}" style="width:auto;height:60px;border-radius:0;"></td>
                            
                            
                            
                            <td><a href="{{ url('backend/photo/' . $photo->id) }}" class="btn btn-inverse-primary btn-fw">Show</a></td>
                            <td><a href="{{ url('backend/photo/' . $photo->id . '/edit') }}" class="btn btn-inverse-success btn-fw">Edit</a></td>
                            <td><a href="#" data-id="{{ $photo->id }}" class="enlaceBorrar btn btn-inverse-danger btn-fw" >Delete</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                   <div class="col-lg-6">
                        {{ $photos->links() }}
                    </div>
                    <form id="formDelete" action="{{ url('backend/photo') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
                  </div>
                  
                </div>
              </div>
            </div>
   
</div>

@endsection