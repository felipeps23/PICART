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
            Preset created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Preset</h4>
                  
                  
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Published by
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 1])}}">↓</a>
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 1])}}">↑</a>
                    </th>
                    <th scope="col">Name
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 2])}}">↓</a>
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 2])}}">↑</a>
                    </th>
                    <th scope="col">Price
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'asc',
                         'orderby' => 3])}}">↓</a>
                        <a href="{{route(
                        'backend.preset.index',
                        ['search' => $search,
                         'sort' => 'desc',
                         'orderby' => 3])}}">↑</a>
                    </th>
                    <th scope="col">Img preset</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($presets as $preset)
                    <tr>
                        <td>{{ $preset->id }}</td>
                        <td>{{ $preset->user->nickname }}</td>
                        
                        <td>{{ $preset->name }}</td>
                        <td>{{ $preset->price }}</td>
                        <td><img src="data:image/png;base64,{{ $preset->photo }}" style="width: 53px;height: 50px;border-radius: 100%;object-fit:cover"></td>
                        <td><a href="{{ url('backend/preset/' . $preset->id) }}" class="btn btn-inverse-primary btn-fw">Show</a></td>
                        <td><a href="{{ url('backend/preset/' . $preset->id . '/edit') }}" class="btn btn-inverse-success btn-fw">Edit</a></td>
                        
                        <td><a href="#" data-id="{{ $preset->id }}" class="enlaceBorrar btn btn-inverse-danger btn-fw" >Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                <div class="col-lg-6">
                    {{ $presets->links() }}
                </div>
                <form id="formDelete" action="{{ url('backend/preset') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
                </div>
                 <div class="card-body">
            <a href="{{ route('backend.preset.create') }}" class="btn btn-primary">Create a new preset</a>
        </div>
                
              
                </div>
              </div>
            </div>
   
</div>
@endsection