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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


       
  </head>
  <body id="home-picart">
    
    <section class="section-home">
        <div class="line-top"></div>
        <div class="line-right"></div>
        <div class="line-left"></div>
        <div class="line-bottom"></div>
       
        <div class="img-home" > <h3>Inspiration, and a place for you to be you.</h3>  
            <video autoplay loop>
              <source src="{{url('/assets/frontend/images/lv_0_20210525204202.mp4')}}" type="video/mp4">
            Your browser does not support the video tag.
            </video>
            <div class="filter-white"></div>
        </div>
        <div class="nav-home">
            <ul>
                <li> <a href="{{ url('/') }}"><b>Home</b></a> </li>
                <li> <a href="{{ url('/feed') }}">Feed</a> </li>
                <li> <a href="{{ url('/preset') }}">Presets</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/PIC-ART/contact/">Contact</a> </li>
                <li> <a class="sign" href="{{ route('login') }}">Sign in</a> </li>
                <li> <a class="sign" href="{{ route('register') }}">Sign up</a> </li>
            </ul>
        </div>
        <div class="contain-home">
            <div class="text-home">
                <h1>YOUR WAY OF SEEING THE WORD</h1>
                
            </div>
            <div class="banner-home">
                <div class="container-home-img-1" style="background:url('{{url('/assets/frontend/images/pexels-harrison-haines-6109154.jpg')}}')"> </div>
                <div class="container-home-img-2" style="background:url('{{url('/assets/frontend/images/pexels-roberto-okaka-3552486.jpg')}}')"><h3>share your art</h3></div>
            </div>
           
               <h1 class="picart">PIC-ART</h1>
          
        </div>
    </section>
     
    <section class="section-place">
        <div class="container container-place" >
             
            <div class="row row-place-1" >
                <div class="col-9">
                   <div class="img-place" style="background:url('{{url('/assets/frontend/images/vsco6079c8f7e9e96.jpg')}}')"></div>
                   <span>Inspiration, and a place for you to be you.</span>
                </div>
                <div class="col-3">
                    <h2>A PLACE TO <b>DISCOVER IDEAS</b> AND SHARE YOUR OWN.</h2>
                </div>
                
            </div>

            <div class="row row-upload">
                <div class="col-12 upload-center">
                    <div class="text-upload">
                        <p>Upload your photos, comment, upload your presets and download them. This is a space to be yourself and share your experiences.
                        Share your presets or edits for lightroom, everyone can see and download them.</p>
                        <a href="{{ url('/feed') }}">Feed</a>
                    </div>
                   
                </div>
                
            </div>
        </div>
        <div class="ideas"><h2>IDEAS</h2></div>
    </section>
    
    <section class="section-account">
        <div class="account"><h2>ACCOUNT</h2></div>
        
        <div class="container container-account" >
            <div class="row row-account-1" >
                <div class="col-7">
                   <h2>WITH YOUR <b>ACCOUNT</b>.</h2>
                   <ul>
                       <li>Upload photos to your account that were added to the PIC-ART feed.</li>
                       <li>Upload your presets and sell them to other users.</li>
                       <li>Comment, like and save your favorite photos.</li>
                       <li>You value user presets.</li>
                       <li>Enjoy the PIC-ART feed with the photos of all the users of the web.</li>
                   </ul>
                   <a href="{{ url('/register') }}">Register</a>
                </div>
                <div class="col-5">
                    <div class="img-account" style="background:url('{{url('/assets/frontend/images/vsco6083f8ac86bbe.jpg')}}')"></div>
                </div>
            </div>
        </div>
        
    </section>
    
    <section class="section-preset">
        <div class="preset"><h2>PRESET</h2></div>
        
        <div class="container container-preset" >
            <div class="row row-preset-1" >
                <div class="col-9 col-preset">
                  <div class="img-preset" style="background:url('{{url('/assets/frontend/images/pexels-gryffyn-m.jpg')}}')"> <h3>Before</h3> <h4>Inspiration, and a place for you to be you.</h4> </div>
                  <div class="img-preset-2" style="background:url('{{url('/assets/frontend/images/pexels-gryffyn-m-5397723.jpg')}}')"><h3>After</h3></div>
                </div>
                <div class="col-3">
                    <h2>BEFORE AND AFTER <b>PRESETS</b> </h2>
                    
                    <p>The presets are used to apply, with a 
                        simple click, a series of adjustments and 
                        adjustments previously configured</p>
                        
                     <a href="{{ url('/preset') }}">Download Presets</a>
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
                      <li> <a href="{{ url('/') }}"><b>Home</b></a> </li>
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
    
    <!--<div class="video">-->
    <!--    <video autoplay loop>-->
    <!--      <source src="{{url('/assets/frontend/images/lv_0_20210525201158.mp4')}}" type="video/mp4">-->
    <!--    Your browser does not support the video tag.-->
    <!--    </video>-->
    <!--</div>-->

</body>
</html>
