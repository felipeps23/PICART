@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/valuation/' . $valuation->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <h3 class="breadcrumb-header">Valuation Table</h3>
    
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id Valuation</td>
                        <td>{{$valuation->id}}</td>
                    </tr>
                    <tr>
                        <td>From user</td>
                        <td>{{$valuation->user->nickname}}</td>
                    </tr>
                    <tr>
                        <td>To preset</td>
                        <td>{{$valuation->preset->name}}</td>
                    </tr>
                    <!-- <tr>-->
                    <!--    <td>Preset photo</td>-->
                    <!--    <td><img src="data:image/png;base64,{{ $valuation->preset->photo }}" style="width:50px;"></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>Valuation</td>
                        <td>{{$valuation->valuation}}</td>
                    </tr>
                    <tr>
                        <td>Text Valuation</td>
                        <td>{{$valuation->text_valuation}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{$valuation->date}}</td>
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
                  <img src="data:image/png;base64,{{ $valuation->preset->photo }}" style="max-height:350px; object-fit: cover;border-radius: 300px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
            
           
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/valuation') }}" class="btn btn-primary">Valuations</a>
                            <a href="#" data-id="{{ $valuation->id }}" data-name="{{ $valuation->id }}" class="btn btn-danger" id="enlaceBorrar">Delete valuation</a>
                        </div>
                    </div>
                </div>
            
        </div>
    

@endsection