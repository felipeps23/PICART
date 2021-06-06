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
        <h3 class="breadcrumb-header">User Table</h3>
    
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nickname</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol }}</td>
                        
                        <td><a href="{{ url('backend/user/' . $user->id . '/edit') }}" class="btn btn-inverse-success btn-fw">Edit</a></td>
                        <td><a href="#" data-id="{{ $user->id }}" class="enlaceBorrar btn btn-inverse-danger btn-fw" >Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>  
                <form id="formDelete" action="{{ url('backend/user') }}" method="post">
                    @method('delete')
                    @csrf
                </form>
               
        </div>
        
    </div>
</div>
</div>
</div>
@endsection
