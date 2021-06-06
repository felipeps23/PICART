@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/like/' . $like->id) }}" method="post">
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
        <h4 class="panel-title">Editing like</h4>
    
    
    <form role="form" action="{{ url('backend/like/' . $like->id) }}" method="post" id="editLikeForm" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
            <label for="iduser">User</label>
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled>Select user</option>
                @foreach($users as $user)
                
                @if($user->id == old('iduser', $user->iduser))
                
                <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                
                @endforeach
            </select>
            
        </div>
        
        
            <div class="form-group">
            <label for="idphoto">Photo</label>
            <select name="idphoto" id="idphoto" required class="form-control">
                <option value="" disabled>Select photo</option>
                @foreach($photos as $photo)
                
                @if($photo->id == old('idphoto', $photo->idphoto))
                
                <option selected value="{{ $photo->id }}">{{ $photo->id }}</option>
                @else
                    <option value="{{ $photo->id }}">{{ $photo->id }}</option>
                @endif
                
                @endforeach
            </select>
            
      
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>
</div>
@endsection