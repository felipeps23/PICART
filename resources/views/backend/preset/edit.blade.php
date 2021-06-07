@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/preset/' . $preset->id) }}" method="post">
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
        <h4 class="panel-title">Editing preset {{$preset->name}}</h4>
   
    <form role="form" action="{{ url('backend/preset/' . $preset->id) }}" method="post" id="editPresetForm" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
            <label for="iduser">User</label>
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled>Select user</option>
                @foreach($users as $user)
                
                @if($user->id == old('iduser', $preset->iduser))
                
                <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                
                @endforeach
            </select>
            
        </div>
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" maxlength="60" minlength="2" required class="form-control" id="name" placeholder="Preset name" name="name" value="{{ old('name', $preset->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea minlength="10" class="form-control" name="description" id="description" placeholder="Description">{{ old('description', $preset->description) }}</textarea>
            </div>
           <!--  <div class="form-group">-->
           <!--     <label for="file">File</label>-->
           <!--     <input type="file" class="form-control" id="file" name="file">-->
           <!--</div>-->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" min="0" max="9999.99" step="0.01" required class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price', $preset->price) }}">
            </div>
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
                  <img src="data:image/png;base64,{{ $preset->photo }}" style="max-height:450px; object-fit: cover;border-radius: 20px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
   </div>
                 </div>
@endsection