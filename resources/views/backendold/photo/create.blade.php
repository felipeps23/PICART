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
        <h4 class="panel-title">Creating a photo</h4>
    </div>
    <div class="panel-body">
    <form role="form" action="{{ url('backend/photo') }}" method="post" id="createPhotoForm" enctype="multipart/form-data">
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
                <label for="idpreset">Preset</label>
    
                @if(isset($presets))
                <select name="idpreset" id="idpreset" required class="form-control">
                    <option value="" disabled selected>Select preset</option>
                    @foreach($presets as $preset)
    
                    <option value="{{ $preset->id }}">{{ $preset->id }} - {{ $preset->name }}</option>
    
                    @endforeach
                </select>
                @else
                    <input type="text" value="{{ $preset->name }}" readonly class="form-control">
                    <input type="hidden" id="idpreset" name="idpreset" value="{{ $preset->id }}">
                @endif
    
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="camera">Camera</label>
                <input type="text" class="form-control" id="camera" placeholder="Camera" name="camera" value="{{ old('camera') }}">
            </div>
            <div class="form-group">
                <label for="lens">Lens</label>
                <input type="text" class="form-control" id="lens" placeholder="Lens" name="lens" value="{{ old('lens') }}">
            </div>
            <div class="form-group">
                <label for="shutter_speed">Shutter Speed</label>
                <input type="text" class="form-control" id="shutter_speed" placeholder="Shutter Speed" name="shutter_speed" value="{{ old('shutter_speed') }}">
            </div>
            <div class="form-group">
                <label for="iso">ISO</label>
                <input type="text" class="form-control" id="iso" placeholder="ISO" name="iso" value="{{ old('iso') }}">
            </div>
            <div class="form-group">
                <label for="focal">Focal</label>
                <input type="text" class="form-control" id="focal" placeholder="Focal" name="focal" value="{{ old('focal') }}">
            </div>
            <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" required class="form-control">
                <option value="" disabled selected>Select type</option>
                <option value="Abstract">Abstract</option>
                <option value="Artistic">Artistic</option>
                <option value="Architectural">Architectural</option>
                <option value="Urban">Urban</option>
                <option value="Portrait">Portrait</option>
                <option value="Aerial">Aerial</option>
                <option value="Submarine">Submarine</option>
                <option value="Black&White">Black&White</option>
                <option value="Fashion">Fashion</option>
                <option value="Gastronomy">Gastronomy</option>
                <option value="Minimalist">Minimalist</option>
                <option value="Astronomical">Astronomical</option>
                <option value="Sport">Sport</option>
            </select>
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