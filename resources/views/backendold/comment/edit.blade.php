@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/comment/' . $comment->id) }}" method="post">
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
<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Editing comment {{$comment->id}}</h4>
    </div>
    <div class="panel-body">
    <form role="form" action="{{ url('backend/comment/' . $comment->id) }}" method="post" id="editCommentForm" enctype="multipart/form-data">
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
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea minlength="10" class="form-control" name="description" id="description" placeholder="Description">{{ old('description', $comment->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" required class="form-control" id="date" name="date" value="{{ old('date', $comment->date) }}">
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