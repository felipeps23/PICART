<?php
    /***
     * Template Name: Contact
     * 
     **/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PICART</title>
    
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="<?php echo bloginfo('template_directory');?>/style.css" rel="stylesheet">
    <!-- 1. Add latest jQuery and fancybox files -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


       
  </head>
  <body id="register-picart">
    
              
          <div class="nav-home">
               <h1 class="picart">PIC-ART</h1>
            <ul>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/home">Home</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/feed">Feed</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/preset">Presets</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/PIC-ART/contact"><b>Contact</b></a> </li>
            </ul>
            
        </div>
          
        
        <div class="container-login">
            
            <div class="img-login" style="background:url(' <?= get_field("img_contact"); ?>')">
                
                
            </div>
            
            <div class="login-form">
               <h2>From Contact</h2>
                <?php 
                the_content();
                ?>
            </div>
            
        </div>
    
   


</body>
</html>
