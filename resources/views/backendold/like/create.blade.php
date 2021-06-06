@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif

<!-- Mostrar todos los errores juntos -->
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Creating a like</h4>
    </div>
    <div class="panel-body">
    <form role="form" action="{{ url('backend/like') }}" method="post" id="createLikeForm" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        
            <div class="form-group">
                <label for="iduser">User</label>
    
                @if(isset($users))
                <select name="iduser" id="iduser" required class="form-control">
                    <option value="" disabled selected>Select user</option>
                    @foreach($users as $user)
    
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
    
                    @endforeach
                </select>
                @else
                    <input type="text" value="{{ $user->name }}" readonly class="form-control">
                    <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
                @endif
    
            </div>
            
            <div class="form-group">
                <label for="idphoto">Photo</label>
    
                @if(isset($photos))
                <select name="idphoto" id="idphoto" required class="form-control">
                    <option value="" disabled selected>Select preset</option>
                    @foreach($photos as $photo)
    
                    <option value="{{ $photo->id }}">{{ $photo->id }}</option>
    
                    @endforeach
                </select>
                @else
                    <input type="text" value="{{ $photo->name }}" readonly class="form-control">
                    <input type="hidden" id="idphoto" name="idphoto" value="{{ $photo->id }}">
                @endif
    
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection