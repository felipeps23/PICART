@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/photo/' . $photo->id) }}" method="post">
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
<div id="main-wrapper">
<div class="row">
<div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="panel-title">Editing photo {{$photo->id}}</h4>
                
   
    <form role="form" action="{{ url('backend/photo/' . $photo->id) }}" method="post" id="editPhotoForm" enctype="multipart/form-data">
        @csrf
        @method('put')
        
            <div class="form-group">
            <label for="iduser">User</label>
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled>Select user</option>
                @foreach($users as $user)
                
                @if($user->id == old('iduser', $photo->iduser))
                
                <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                
                @endforeach
            </select>
          
        
        </div>
        
        
            <div class="form-group">
            <label for="idpreset">Preset</label>
            <select name="idpreset" id="idpreset" required class="form-control">
                <option value="" disabled>Select preset</option>
                @foreach($presets as $preset)
                
                @if($preset->id == old('idpreset', $photo->idpreset))
                
                <option selected value="{{ $preset->id }}">{{ $preset->name }}</option>
                @else
                    <option value="{{ $preset->id }}">{{ $preset->name }}</option>
                @endif
                
                @endforeach
            </select>
           
        
        </div>
        <div class="form-group">
            <label for="camera">Camera</label>
            <input type="text" class="form-control" id="camera" placeholder="Camera" name="camera" value="{{ old('camera', $photo->camera) }}">
        </div>
        <div class="form-group">
            <label for="lens">Lens</label>
            <input type="text" class="form-control" id="lens" placeholder="Photo lens" name="lens" value="{{ old('lens', $photo->lens) }}">
        </div>
        <div class="form-group">
            <label for="shutter_speed">Shutter Speed</label>
            <input type="text" class="form-control" id="shutter_speed" placeholder="Photo shutter_speed" name="shutter_speed" value="{{ old('shutter_speed', $photo->shutter_speed) }}">
        </div>
        <div class="form-group">
            <label for="iso">ISO</label>
            <input type="text" class="form-control" id="iso" placeholder="Photo iso" name="iso" value="{{ old('iso', $photo->iso) }}">
        </div>
        <div class="form-group">
            <label for="focal">Focal</label>
            <input type="text" class="form-control" id="focal" placeholder="Photo focal" name="focal" value="{{ old('focal', $photo->focal) }}">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" required class="form-control">
                <option value="" disabled>Select type</option>
                
                @if($photo->type == old('type', $photo->type))
                
                <option selected value="{{ $photo->type }}">{{ $photo->type }}</option>
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
                @else
                    <option value="{{ $photo->type }}">{{ $photo->type }}</option>
                @endif
                
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
              
              
              
           <div class="col-lg-6 grid-margin stretch-card">
                 <div class="card">
                <div class="card-body">
                   
                <div class="img-show" style="display:flex; width:100%; justify-content: center;align-items: center;flex-direction:column">
                  <img src="data:image/png;base64,{{ $photo->photo }}" style="max-height:550px; object-fit: cover;border-radius: 20px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
   </div>
                 </div>
@endsection