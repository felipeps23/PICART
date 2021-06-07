@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif

<!-- Mostrar todos los errores juntos -->
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <h4 class="panel-title">Creating a valuation</h4>
   
    <form role="form" action="{{ url('backend/valuation') }}" method="post" id="createValuationForm" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        
            <div class="form-group">
                <label for="iduser">From user</label>
    
                @if(isset($users))
                <select name="iduser" id="iduser" required class="form-control">
                    <option value="" disabled selected>Select user</option>
                    @foreach($users as $user)
    
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
    
                    @endforeach
                </select>
                @else
                    <input type="text" value="{{ $user->name }}" readonly class="form-control">
                    <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
                @endif
    
            </div>
            
            <div class="form-group">
                <label for="idpreset">Preset</label>
    
                @if(isset($presets))
                <select name="idpreset" id="idpreset" required class="form-control">
                    <option value="" disabled selected>Select preset</option>
                    @foreach($presets as $preset)
    
                    <option value="{{ $preset->id }}">{{ $preset->id }} - {{ $preset->name }}</option>
    
                    @endforeach
                </select>
                @else
                    <input type="text" value="{{ $preset->name }}" readonly class="form-control">
                    <input type="hidden" id="idpreset" name="idpreset" value="{{ $preset->id }}">
                @endif
    
            </div>
            <div class="form-group">
                <label for="valuation">Valuation</label>
                <input type="number" min="1" max="5" required class="form-control" id="valuation" name="valuation">
            </div>
            
            <div class="form-group">
                <label for="text_valuation">Text Valuation</label>
                <input type="text" required class="form-control" id="text_valuation" name="text_valuation">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
     
                      
                    </div>
              </div>
            </div></div>
@endsection