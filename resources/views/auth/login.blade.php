@extends('layouts.app')

@section('modal')
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verificación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Enhorabuena, estás dado de alta, verifica tu cuenta para iniciar sesión.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example2ModalLabel">Verificación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Para poder iniciar sesión hay que verificar el correo, se le acaba de enviar un correo de verificación nuevo.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="example3ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example3ModalLabel">Verificación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La cuenta se ha verificado correctamente, ya puede iniciar sesión.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="restoreEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel11" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel11">Restablecer contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Enhorabuena, se ha restablecido tu correo anterior o no: 
        @if (Session::get('restoreemail'))
          Modificado.
        @else
          No modificado.
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    if(document.getElementById('register')) {
        $('#registerModal').modal('show');
    }
    if(document.getElementById('login')) {
        $('#loginModal').modal('show');
    }
    if(document.getElementById('verify')) {
        $('#verifyModal').modal('show');
    }
    if(document.getElementById('restore')) {
        $('#restoreEmailModal').modal('show');
    }
</script>
@endsection

@section('content')
@if(Session::has('register'))
    <div id="register"></div>
@endif
@if(Session::has('login'))
    <div id="login"></div>
@endif
@if(Session::has('verified'))
    <div id="verify"></div>
@endif
@if(Session::has('restoreemail'))
    <div id="restore"></div>
@endif

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PICART</title>
    
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{url('/assets/frontend/css/style.css')}}" rel="stylesheet">
    <!-- 1. Add latest jQuery and fancybox files -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="png" href="{{ url('/assets/logo.png') }}" />
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


       
  </head>
  <body id="login-picart">
    
              
          <div class="nav-home">
               <h1 class="picart">PIC-ART</h1>
            <ul>
                <li> <a href="{{ url('/') }}">Home</a> </li>
                <li> <a href="{{ url('/feed') }}">Feed</a> </li>
                <li> <a href="{{ url('/preset') }}">Presets</a> </li>
                <li> <a href="">Contact</a> </li>
               <!-- <li> <a href="" class="menuitem">Sergio </a> -->
               <!--     <ul>-->
          					<!--	<li><a href="">My account</a></li>-->
          					<!--	<li><a href="">My photos</a></li>-->
          					<!--	<li><a href="">My presets</a></li>-->
          					<!--	<li><a href="">Likes</a></li>-->
          						<!--<li><a href="">Add photo</a></li>-->
          						<!--<li><a href="">Add preset</a></li>-->
          					<!--	<li><a href="">Logout</a></li>-->
          					<!--</ul> </li>-->
                <!--<li> <a class="sign" href="">Sign in</a> </li>-->
                <li> <a class="sign" href="{{ route('register') }}">Sign up</a> </li>
            </ul>
            
        </div>
          
        
        <div class="container-login">
            <div class="img-login" style="background:url('{{url('/assets/frontend/images/backlogin.jpg')}}')"></div>
            
            <div class="login-form">
               <form method="POST" action="{{ route('login') }}">
                   @csrf
                   <h1>{{ __('Login') }}</h1>
                   <label for="email" >E-Mail Address</label>
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                   @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                   <label for="password" >Password</label>
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                   @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                   <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <div class="button-form">
                         <button type="submit" >
                    {{ __('Login') }}
                        </button>
                    </div>
                   
                    
               </form>
            </div>
            
        </div>

</body>
</html>
@endsection
