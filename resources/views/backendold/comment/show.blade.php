@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/comment/' . $comment->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Comment Table</h3>
    </div>
<div id="main-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Our comments</h4>
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
                        <td>Id Comment</td>
                        <td>{{$comment->id}}</td>
                    </tr>
                    <tr>
                        <td>User name</td>
                        <td>{{$comment->iduser}}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>{{$comment->idphoto}}</td>
                    </tr>
                    <tr>
                        <td>Comment description</td>
                        <td>{{$comment->description}}</td>
                    </tr>
                    <tr>
                        <td>Comment date</td>
                        <td>{{$comment->date}}</td>
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
                            <a href="{{ url('backend/comment') }}" class="btn btn-primary">Comments</a>
                            <a href="#" data-id="{{ $comment->id }}" data-name="{{ $comment->id }}" class="btn btn-danger" id="enlaceBorrar">Delete comment</a>
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