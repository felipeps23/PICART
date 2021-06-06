@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/like/' . $like->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="panel-title">Our likes</h4>
            
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User name</td>
                        <td>{{$like->iduser}}</td>
                    </tr>
                    <tr>
                        <td>Id Preset</td>
                        <td>{{$like->idphoto}}</td>
                    </tr>
                </tbody>
                </table>  
                </div>
            </div> </div>
            
             <div class="col-lg-6 grid-margin stretch-card">
                 <div class="card">
                <div class="card-body">
                   
                <div class="img-show" style="display:flex; width:100%; justify-content: center;align-items: center;flex-direction:column">
                  <img src="data:image/png;base64,{{ $like->photo->photo }}" style="max-height:180px; object-fit: cover;border-radius: 20px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
            
            
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/like') }}" class="btn btn-primary">Likes</a>
                            <a href="#" data-id="{{ $like->id }}" data-name="{{ $like->id }}" class="btn btn-danger" id="enlaceBorrar">Delete like</a>
                        </div>
                    </div>
                </div>
            
    
</div>

@endsection