@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/purchase/' . $purchase->id) }}" method="post">
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
        <h4 class="panel-title">Editing purchase</h4>
    </div>
    <div class="panel-body">
    <form role="form" action="{{ url('backend/purchase/' . $purchase->id) }}" method="post" id="editPurchaseForm" enctype="multipart/form-data">
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
        
        <div class="card-body">
            <div class="form-group">
            <label for="idpreset">Preset</label>
            <select name="idpreset" id="idpreset" required class="form-control">
                <option value="" disabled>Select preset</option>
                @foreach($presets as $preset)
                
                @if($preset->id == old('idpreset', $preset->idpreset))
                
                <option selected value="{{ $preset->id }}">{{ $preset->name }}</option>
                @else
                    <option value="{{ $preset->id }}">{{ $preset->name }}</option>
                @endif
                
                @endforeach
            </select>
            
        </div>
        
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" required class="form-control" id="date" name="date" value="{{ old('date', $purchase->date) }}">
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