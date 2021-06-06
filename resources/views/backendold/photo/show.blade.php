@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/photo/' . $photo->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Photo Table</h3>
    </div>
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Our photos</h4>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                <table class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id Photo</td>
                        <td>{{$photo->id}}</td>
                    </tr>
                    <tr>
                        <td>User name</td>
                        <td>{{$photo->iduser}}</td>
                    </tr>
                    <tr>
                        <td>Preset used</td>
                        <td>{{$photo->idpreset}}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><img src="data:image/png;base64,{{ $photo->photo }}" style="width:100px;"></td>
                    </tr>
                    <tr>
                        <td>Camera</td>
                        <td>{{$photo->camera}}</td>
                    </tr>
                    <tr>
                        <td>Photo lens</td>
                        <td>{{$photo->lens}}</td>
                    </tr>
                    <tr>
                        <td>Photo Shutter Speed</td>
                        <td>{{$photo->shutter_speed}}</td>
                    </tr>
                    <tr>
                        <td>Photo ISO</td>
                        <td>{{$photo->iso}}</td>
                    </tr>
                    <tr>
                        <td>Photo Focal</td>
                        <td>{{$photo->focal}}</td>
                    </tr>
                    <tr>
                        <td>Photo Type</td>
                        <td>{{$photo->type}}</td>
                    </tr>
                </tbody>
                </table>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            <a href="{{ url('backend/photo') }}" class="btn btn-primary">Photos</a>
                            <a href="#" data-id="{{ $photo->id }}" data-name="{{ $photo->name }}" class="btn btn-danger" id="enlaceBorrar">Delete photo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection