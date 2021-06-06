<nav class="nav-section">
        <div class="col-2 nav-logo">
            <img class="logo-home-white" src="<?php echo bloginfo('template_directory');?>/assets/images/logo.png" alt="">

        </div>

        <div class="col-10 nav-links">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menutecos',
            'menu_id' => 'ul-nav-section',
        ) );
        ?>
        <a id="nav-dispplay" href=""><img src="<?php echo bloginfo('template_directory');?>/assets/images/Group66.png" alt=""></a>
            <!-- <ul class="ul-nav-section">
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="" id="selectmenu">Contact</a></li>
                <li style="display:none"><a href=""><img src="<?php echo bloginfo('template_directory');?>/assets/images/Group66.png" alt=""></a></li>
            </ul> -->
        </div>


</nav>