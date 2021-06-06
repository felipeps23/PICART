@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/favourite/' . $favourite->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
        <h3 class="breadcrumb-header">Comment Table</h3>
    
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id Favourite</td>
                        <td>{{$favourite->id}}</td>
                    </tr>
                    <tr>
                        <td>From user</td>
                        <td>{{$favourite->user->nickname}}</td>
                    </tr>
                    <tr>
                        <td>To user</td>
                        <td>{{$favourite->preset->name}}</td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td>Preset photo</td>-->
                    <!--    <td><img src="data:image/png;base64,{{ $favourite->preset->photo }}" style="width:100px;"></td>-->
                    <!--</tr>-->
                </tbody>
                </table>  
                </div>
              </div>
            </div>
            
            
             <div class="col-lg-6 grid-margin stretch-card">
                 <div class="card">
                <div class="card-body">
                   
                <div class="img-show" style="display:flex; width:100%; justify-content: center;align-items: center;flex-direction:column">
                  <img src="data:image/png;base64,{{ $favourite->preset->photo }}" style="max-height:250px; object-fit: cover;border-radius: 300px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/favourite') }}" class="btn btn-primary">Favourites</a>
                            <a href="#" data-id="{{ $favourite->id }}" data-name="{{ $favourite->id }}" class="btn btn-danger" id="enlaceBorrar">Delete favourite</a>
                        </div>
                    </div>
                </div>
            
            
        </div>
   

@endsection