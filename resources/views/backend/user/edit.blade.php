@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/user/' . $user->id) }}" method="post">
    @method('delete')
    @csrf
</form>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-12 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
        <h4 class="panel-title">Editing user {{$user->name}}</h4>
   
    <form role="form" action="{{ url('backend/user/' . $user->id) }}" method="post" id="editUserForm" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="nickname">User nickname</label>
                @error('nickname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="nickname" class="form-control" id="nickname" placeholder="Nickname" name="nickname" value="{{ old('nickname', $user->nickname) }}">
            </div>
            
            <div class="form-group">
                <label for="user">User name</label>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name', $user->name) }}">
            </div>
            
            <div class="form-group">
                <label for="email">User email</label>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
            </div>
            
            <div class="form-group">
                <label for="email">User rol</label>
                @error('rol')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="number" class="form-control" id="rol" placeholder="Rol" name="rol" value="{{ old('rol', $user->rol) }}">
            </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
</div>
</div>
</div></div>
</div>
@endsection