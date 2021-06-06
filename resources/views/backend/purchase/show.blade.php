@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/purchase/' . $purchase->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <h3 class="breadcrumb-header">Purchase Table</h3>
    
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
                        <td>{{$purchase->user->nickname}}</td>
                    </tr>
                    <tr>
                        <td>Id Preset</td>
                        <td>{{$purchase->preset->name}}</td>
                    </tr>
                    <!-- <tr>-->
                    <!--    <td>Preset photo</td>-->
                    <!--    <td><img src="data:image/png;base64,{{ $purchase->preset->photo }}" style="width:50px;"></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>Date</td>
                        <td>{{$purchase->date}}</td>
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
                  <img src="data:image/png;base64,{{ $purchase->preset->photo }}" style="max-height:250px; object-fit: cover;border-radius: 300px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
            
           
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/purchase') }}" class="btn btn-primary">Purchases</a>
                            <a href="#" data-id="{{ $purchase->id }}" data-name="{{ $purchase->id }}" class="btn btn-danger" id="enlaceBorrar">Delete purchase</a>
                        </div>
                    </div>
                </div>
            
        </div>
   
@endsection