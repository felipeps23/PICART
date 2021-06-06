@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/valuation/' . $valuation->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Valuation Table</h3>
    </div>
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Our valuations</h4>
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
                        <td>Id Valuation</td>
                        <td>{{$valuation->id}}</td>
                    </tr>
                    <tr>
                        <td>From user</td>
                        <td>{{$valuation->iduser}}</td>
                    </tr>
                    <tr>
                        <td>To preset</td>
                        <td>{{$valuation->idpreset}}</td>
                    </tr>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            <a href="{{ url('backend/valuation') }}" class="btn btn-primary">Valuations</a>
                            <a href="#" data-id="{{ $valuation->id }}" data-name="{{ $valuation->id }}" class="btn btn-danger" id="enlaceBorrar">Delete valuation</a>
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