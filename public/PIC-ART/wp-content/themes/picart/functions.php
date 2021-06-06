<?php
    /********************************************* 
     * Theme Supports
    *********************************************/
     ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    
    add_theme_support('post-thumbnails');




    function add_theme_scripts(){

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'),null,true);
    wp_enqueue_script('bootstrap');
    

    wp_enqueue_script('masonry-js', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'));
    wp_enqueue_script('masonry-init', get_stylesheet_directory_uri() . '/assets/js/masonry-init.js', array('masonry'), 1, true); 
 
    }



add_action('wp_enqueue_scripts' , 'add_theme_scripts');


