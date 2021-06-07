@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/comment/' . $comment->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
           
        
<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                <h4 class="panel-title">Our comments</h4>
           
           
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
                        <td>{{$comment->user->name}}</td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td>Photo</td>-->
                    <!--   <td><img src="data:image/png;base64,{{ $comment->photo->photo }}" style="width:100px;"></td>-->
                    <!--</tr>-->
                    <tr>
                        <td>Comment description</td>
                        <td>{{$comment->description}}</td>
                    </tr>
                    <tr>
                        <td>Comment date</td>
                        <td>{{$comment->created_at}}</td>
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
                  <img src="data:image/png;base64,{{ $comment->photo->photo }}" style="max-height:350px; object-fit: cover;border-radius: 20px;max-width:450px;">
                  <!--<h1 class="display-4">Photo</h1>-->
                  </div>
                     </div>
                      </div>
                 </div>
                 
                 
            
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            <a href="{{ url('backend/comment') }}" class="btn btn-primary">Comments</a>
                            <a href="#" data-id="{{ $comment->id }}" data-name="{{ $comment->id }}" class="btn btn-danger" id="enlaceBorrar">Delete comment</a>
                        </div>
                    </div>
                </div>
           
            
           </div>
       

@endsection