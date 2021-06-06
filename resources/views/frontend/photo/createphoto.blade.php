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
    <link rel="shortcut icon" type="png" href="{{ url('/assets/logo.png') }}" />
    <!-- 1. Add latest jQuery and fancybox files -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    
   

  </head>
  <body id="createphoto-picart">
    
      
          <div class="nav-home">
               <h1 class="picart">PIC-ART</h1>
            <ul>
                <li> <a href="{{ url('/home') }}">Home</a> </li>
                <li> <a href="{{ url('/feed') }}">Feed</a> </li>
                <li> <a href="{{ url('/preset') }}">Presets</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/PIC-ART/contact">Contact</a> </li>
                <li> <a href="" class="menuitem">{{ Auth::user()->nickname }}</a> 
                    <ul>
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user fa-w-14 fa-2x"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" class=""></path></svg><a href="{{ url('/admin') }}">My account</a></li>
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-image fa-w-16 fa-2x"><path fill="currentColor" d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z" class=""></path></svg><a href="{{ url('/myphotos') }}">My photos</a></li>
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magic" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-magic fa-w-16 fa-2x"><path fill="currentColor" d="M224 96l16-32 32-16-32-16-16-32-16 32-32 16 32 16 16 32zM80 160l26.66-53.33L160 80l-53.34-26.67L80 0 53.34 53.33 0 80l53.34 26.67L80 160zm352 128l-26.66 53.33L352 368l53.34 26.67L432 448l26.66-53.33L512 368l-53.34-26.67L432 288zm70.62-193.77L417.77 9.38C411.53 3.12 403.34 0 395.15 0c-8.19 0-16.38 3.12-22.63 9.38L9.38 372.52c-12.5 12.5-12.5 32.76 0 45.25l84.85 84.85c6.25 6.25 14.44 9.37 22.62 9.37 8.19 0 16.38-3.12 22.63-9.37l363.14-363.15c12.5-12.48 12.5-32.75 0-45.24zM359.45 203.46l-50.91-50.91 86.6-86.6 50.91 50.91-86.6 86.6z" class=""></path></svg><a href="{{ url('/mypresets') }}">My presets</a></li>
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-2x"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" class=""></path></svg><a href="{{ url('/mylikes') }}">Likes</a></li>
						<li><svg style="width:10px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-bookmark fa-w-12 fa-2x"><path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z" class=""></path></svg><a href="{{ url('/myfavourites') }}">Saved Presets</a></li>
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-bag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-shopping-bag fa-w-14 fa-9x"><path fill="currentColor" d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z" class=""></path></svg><a href="{{ url('/myshopping') }}">My shopping</a></li>
						
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-crown" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user-crown fa-w-14 fa-2x"><path fill="currentColor" d="M352 0l-64 32-64-32-64 32L96 0v96h256V0zm-38.4 304h-16.71c-22.24 10.18-46.88 16-72.89 16s-50.65-5.82-72.89-16H134.4C60.17 304 0 364.17 0 438.4V464c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48v-25.6c0-74.23-60.17-134.4-134.4-134.4zM224 272c70.69 0 128-57.31 128-128v-16H96v16c0 70.69 57.31 128 128 128z" class=""></path></svg><a href="{{ url('/backend') }}">Administration</a></li>
						<!--<li><a href="">Add photo</a></li>-->
						<!--<li><a href="">Add preset</a></li>-->
						<li><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out-alt fa-w-16 fa-2x"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" class=""></path></svg>
						<a href="{{ route('logout') }}" 
						                    onclick="event.preventDefault(); 
						                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
					</ul> </li>
                <!--<li> <a class="sign" href="">Sign in</a> </li>-->
                <!--<li> <a class="sign" href="">Sign up</a> </li>-->
            </ul>
            
        </div>
               
        <section class="section-single">
            
            <div class="container container-single" >
                <div class="row row-single" >
                    <div class="col-12">
                      <h1> <b>PIC-ART</b>  — sergiomh9</h1>
                    </div>
                    <div class="col-12 col-createphoto">
                       <div class="form-createphoto">
                           <form role="form" action="{{ url('/myphotos/create') }}" method="post" id="createPhotoForm" enctype="multipart/form-data">
                              @csrf
                               <h1>Add Photo</h1>
                                 
                                 <div style="display:none">
                                    <label for="iduser">User</label>
                                    <input type="text" value="{{ Auth::user()->id }}" readonly class="form-control">
                                    <input type="hidden" id="iduser" name="iduser" value="{{ Auth::user()->id }}">
                                 </div>
                                 
                                 <div class="center-img-file">
                                     <img id="output"/>
                                 </div>
                                 <div class="soltarphoto">
                                     <h5>Click or drag the photo here</h5>
                                     <input type="file" accept="image/*" onchange="loadFile(event)" class="fileout" id="photo" name="photo">
                                 </div>
                                
                               
                                <label for="idpreset">Preset</label>
                                @if(isset($presets))
                                <select class="custom-select w-100" name="idpreset" id="idpreset" required="">
                                    <option value="" disabled="" selected="">Select preset</option>
                                    @foreach($presets as $preset)
                                    <option value="{{ $preset->id }}">{{ $preset->id }} - {{ $preset->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" value="{{ $preset->name }}" readonly class="form-control">
                                <input type="hidden" id="idpreset" name="idpreset" value="{{ $preset->id }}">
                                @endif
                                
                                <label for="camera"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-camera fa-w-16 fa-9x"><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z" class=""></path></svg> Camera</label>
                                <input id="camera" type="text" class="form-control " placeholder="Camera" name="camera" value="{{ old('camera') }}" required="" autocomplete="name" autofocus="">
                                <div class="divider-form">
                                    <div>
                                       <label for="lens"><svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="camera-home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-camera-home fa-w-14 fa-9x"><g class="fa-group"><path fill="currentColor" d="M224,96h-.05a112,112,0,1,0,.05,0Zm0,80a32,32,0,0,0-32,32,16,16,0,0,1-32,0,64.06,64.06,0,0,1,64-64,16,16,0,0,1,0,32Z" class="fa-secondary"></path><path fill="currentColor" d="M384,0H64A64,64,0,0,0,0,64V352a64,64,0,0,0,64,64h72.71L76.53,450.83c-6.9,4.33-12.5,14.45-12.5,22.6v11.9A26.68,26.68,0,0,0,90.7,512H357.37A26.68,26.68,0,0,0,384,485.33V473.45c0-8.17-5.65-18.3-12.58-22.62L311.28,416H384a64,64,0,0,0,64-64V64A64,64,0,0,0,384,0ZM224,352h-.05a144,144,0,1,1,.05,0Z" class="fa-primary"></path></g></svg> Lens</label>
                                       <input id="lens" type="text" class="form-control " name="lens" value="{{ old('lens') }}" required="" placeholder="Lens" autocomplete="name" autofocus="">
                                   </div>
                                   <div>
                                       <label for="shutter_speed"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="running" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416 512" class="svg-inline--fa fa-running fa-w-13 fa-9x"><path fill="currentColor" d="M272 96c26.51 0 48-21.49 48-48S298.51 0 272 0s-48 21.49-48 48 21.49 48 48 48zM113.69 317.47l-14.8 34.52H32c-17.67 0-32 14.33-32 32s14.33 32 32 32h77.45c19.25 0 36.58-11.44 44.11-29.09l8.79-20.52-10.67-6.3c-17.32-10.23-30.06-25.37-37.99-42.61zM384 223.99h-44.03l-26.06-53.25c-12.5-25.55-35.45-44.23-61.78-50.94l-71.08-21.14c-28.3-6.8-57.77-.55-80.84 17.14l-39.67 30.41c-14.03 10.75-16.69 30.83-5.92 44.86s30.84 16.66 44.86 5.92l39.69-30.41c7.67-5.89 17.44-8 25.27-6.14l14.7 4.37-37.46 87.39c-12.62 29.48-1.31 64.01 26.3 80.31l84.98 50.17-27.47 87.73c-5.28 16.86 4.11 34.81 20.97 40.09 3.19 1 6.41 1.48 9.58 1.48 13.61 0 26.23-8.77 30.52-22.45l31.64-101.06c5.91-20.77-2.89-43.08-21.64-54.39l-61.24-36.14 31.31-78.28 20.27 41.43c8 16.34 24.92 26.89 43.11 26.89H384c17.67 0 32-14.33 32-32s-14.33-31.99-32-31.99z" class=""></path></svg>   Shutter Speed</label>
                                       <input id="shutter_speed" type="text" class="form-control " name="shutter_speed" value="{{ old('shutter_speed') }}" required="" placeholder="Shutter Speed" autocomplete="email" autofocus="">
                                   </div>
                                </div>
                                
                                 <div class="divider-form">
                                    <div>
                                       <label for="iso"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="image-polaroid" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-image-polaroid fa-w-14 fa-9x"><path fill="currentColor" d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 400H48v-64h352zm0-112h-16l-97.07-121c-7.46-9.31-22.4-9.31-29.86 0l-63.38 79-33.05-45.78c-7.92-11-25.36-11-33.28 0L64 320H48V80h352zM144 176a32 32 0 1 0-32-32 32 32 0 0 0 32 32z" class=""></path></svg> ISO</label>
                                       <input id="iso" type="text" class="form-control " name="iso" value="{{ old('iso') }}" required="" placeholder="ISO" autocomplete="name" autofocus="">
                                   </div>
                                   <div>
                                       <label for="focal"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mountain" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-mountain fa-w-20 fa-9x"><path fill="currentColor" d="M634.92 462.7l-288-448C341.03 5.54 330.89 0 320 0s-21.03 5.54-26.92 14.7l-288 448a32.001 32.001 0 0 0-1.17 32.64A32.004 32.004 0 0 0 32 512h576c11.71 0 22.48-6.39 28.09-16.67a31.983 31.983 0 0 0-1.17-32.63zM320 91.18L405.39 224H320l-64 64-38.06-38.06L320 91.18z" class=""></path></svg> Focal</label>
                                       <input id="focal" type="text" class="form-control " name="focal" value="{{ old('focal') }}" required="" placeholder="Focal" autocomplete="email" autofocus="">
                                   </div>
                                </div>
                               
                              
                               <label for="type">Type</label>
                               <select class="custom-select w-100" name="type" id="type" required="">
                                    <option value="" disabled selected>Select type</option>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Artistic">Artistic</option>
                                    <option value="Architectural">Architectural</option>
                                    <option value="Urban">Urban</option>
                                    <option value="Portrait">Portrait</option>
                                    <option value="Aerial">Aerial</option>
                                    <option value="Submarine">Submarine</option>
                                    <option value="Black&White">Black&White</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Gastronomy">Gastronomy</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Astronomical">Astronomical</option>
                                    <option value="Sport">Sport</option>
                                </select>
                               
                                
                                    <div class="button-form">
                                         <button type="submit">
                                    Create
                                </button>
                                    </div>
                               
                                
                           </form>
                          
                       </div>
                      
                    </div>
                   
                    
                    
                </div>
            </div>
        
    </section>
    
      <footer>
        <div class="container container-footer" >
            <div class="row row-footer" >
                <div class="col-4 col-footer-menu">
                  <ul>
                      <li> <b>Menu</b> </li>
                      <li> <a href="{{ url('/') }}">Home</a> </li>
                      <li> <a href="{{ url('/feed') }}">Feed</a> </li>
                      <li> <a href="{{ url('/preset') }}">Presets</a> </li> 
                      <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/PIC-ART/contact/">Contact</a> </li>
                  </ul>
                  <ul>
                      <li> <b>Company</b> </li>
                      <li> <a href="">About us</a> </li>
                      <li> <a href="">Privacy</a> </li>
                      
                  </ul>
                </div>
                <div class="col-4 col-logo-footer">
                    <h2>PIC-ART</h2>
                </div>
                
                <div class="col-4 col-copy">
                    <p>© PIC-ART 2021. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
   
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      $(".fileout").addClass("height-input-form")
    }
  };
</script>

</body>
</html>