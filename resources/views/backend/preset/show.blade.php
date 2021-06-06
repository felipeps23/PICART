@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/preset/' . $preset->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                <h4 class="panel-title">Our presets</h4>
            
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id Preset</td>
                        <td>{{$preset->id}}</td>
                    </tr>
                    <tr>
                        <td>User name</td>
                        <td>{{$preset->iduser}}</td>
                    </tr>
                    <tr>
                        <td>Preset name</td>
                        <td>{{$preset->name}}</td>
                    </tr>
                    <tr>
                        <td>Preset description</td>
                        <td>{{$preset->description}}</td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td>Preset photo</td>-->
                    <!--    <td><img src="data:image/png;base64,{{ $preset->photo }}" style="width:100px;"></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>File photo</td>
                        <td><a href="{{ url('logos/' . $preset->id.'.zip' ) }}">Download preset</a></td>
                    </tr>
                    <tr>
                        <td>Preset file</td>
                        <td>{{$preset->file}}</td>
                    </tr>
                    <tr>
                        <td>Preset price</td>
                        <td>{{$preset->price}}</td>
                    </tr>
                </tbody>
                </table>  
                </div>
              </div>
            </div>
            
            
            <div class="col-lg-6 grid-margin stretch-card">
                 <div class="card">
                <div class="card-body">
                   
                <div class="img-show" style="display:flex; width:100%; justify-content: center;align-items: center;flex-direction:column">
                  <img src="data:image/png;base64,{{ $preset->photo }}" style="max-height:350px; object-fit: cover;border-radius: 300px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
                 
                 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/preset') }}" class="btn btn-primary">Presets</a>
                            <a href="#" data-id="{{ $preset->id }}" data-name="{{ $preset->name }}" class="btn btn-danger" id="enlaceBorrar">Delete preset</a>
                        </div>
                    </div>
                </div>
           
        </div>
       
       

@endsection