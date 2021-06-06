@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/preset/' . $preset->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Preset Table</h3>
    </div>
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Our presets</h4>
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
                    <tr>
                        <td>Preset photo</td>
                        <td><img src="data:image/png;base64,{{ $preset->photo }}" style="width:100px;"></td>
                    </tr>
                    <tr>
                        <td>File photo</td>
                        <td><a href="data:file/;base64,{{ $preset->file }}">Hola</a></td>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            <a href="{{ url('backend/preset') }}" class="btn btn-primary">Presets</a>
                            <a href="#" data-id="{{ $preset->id }}" data-name="{{ $preset->name }}" class="btn btn-danger" id="enlaceBorrar">Delete preset</a>
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