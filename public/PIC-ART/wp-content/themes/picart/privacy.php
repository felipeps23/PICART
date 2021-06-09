<?php
    /***
     * Template Name: Privacy
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
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/">Home</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/feed">Feed</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/preset">Presets</a> </li>
                <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/PIC-ART/contact"><b>Contact</b></a> </li>
            </ul>
            
        </div>
          
        
        <section class="section-preset">
            
            <div class="container container-preset">
                <div class="row row-preset">
                    <div class="col-12">
                      <h1> <b>PIC-ART</b>  — <?= get_field("privacy_policy"); ?></h1>
                    </div>
                    
                    <div class="col-12 content-mypresets">
                        <div class="gallery-preset">
                          <?php 
                        if(get_field("about_us_title")){
                            ?>
                           <h2><?= get_field("about_us_title"); ?></h2>
                           <p><?= get_field("about_us_content"); ?></p>
                             <?php 
                        }
                        ?>
                            
                            <?php 
                        if(get_field("comments_title")){
                            ?>
                             <h2><?= get_field("comments_title"); ?></h2>
                           <p><?= get_field("comments_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("media_title")){
                            ?>
                            <h2><?= get_field("media_title"); ?></h2>
                           <p><?= get_field("media_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("cookies_title")){
                            ?>
                            <h2><?= get_field("cookies_title"); ?></h2>
                           <p><?= get_field("cookies_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("embedded_title")){
                            ?>
                            <h2><?= get_field("embedded_title"); ?></h2>
                           <p><?= get_field("embedded_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("who_we_title")){
                            ?>
                            <h2><?= get_field("who_we_title"); ?></h2>
                           <p><?= get_field("who_we_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("how_long_title")){
                            ?>
                            <h2><?= get_field("how_long_title"); ?></h2>
                           <p><?= get_field("how_long_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("what_rights_title")){
                            ?>
                            <h2><?= get_field("what_rights_title"); ?></h2>
                           <p><?= get_field("what_rights_content"); ?></p>
                            <?php 
                        }
                        ?>
                           
                           <?php 
                        if(get_field("where_we_title")){
                            ?>
                            <h2><?= get_field("where_we_title"); ?></h2>
                           <p><?= get_field("where_we_content"); ?></p>
                            <?php 
                        }
                        ?>
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
                      <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/">Home</a> </li>
                      <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/feed">Feed</a> </li>
                      <li> <a href="https://informatica.ieszaidinvergeles.org:10016/PIC-ART/public/preset">Presets</a> </li> 
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
   


</body>
</html>