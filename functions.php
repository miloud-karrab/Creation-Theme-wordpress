<?php
 function monthme_support()
{
add_theme_support('title-tag');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
register_nav_menu('header','en tete du menu');
register_nav_menu('footer','en pied du menu');
}
function montheme_register_asset()
{
wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
wp_register_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',['popper','jquery'],false,true);
wp_register_script('popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',[],false,true);
wp_deregister_script('jquery');
wp_register_script('jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js',[],false,true);
wp_enqueue_style( 'bootstrap' );
wp_enqueue_script('bootstrap');
}
function montheme_menu_class($class)
{
  $class[]= 'nav-item';
  return $class;
}
function montheme_menu_link_class($attrs)
{
  $attrs['class']= 'nav-link';
  return $attrs;
}

add_action('after_setup_theme','monthme_support');
add_action('wp_enqueue_scripts','montheme_register_asset');
add_action('nav_menu_css_class','montheme_menu_class');
add_action('nav_menu_link_attributes','montheme_menu_link_class');
add_action( 'send_headers', 'site_router');
function site_router()

{
  $root=str_replace('index.php','', $_SERVER['SCRIPT_NAME']);
  $url=str_replace($root, '', $_SERVER['REQUEST_URI']);
  $url=explode('/', $url);
  if (count($url)==1 && $url[0]== 'login') {
    require 'tpl-login.php';
    die();
  }
  if (count($url)==1 && $url[0]== 'profil') {
    require 'tpl-profil.php';
    die();
  }
  if (count($url)==1 && $url[0]== 'logout') {
    wp_logout();
    header('location:'.$root);
    die();
  }
  if (count($url)==1 && $url[0]== 'register') {

    require 'tpl-register.php';
    die();
  }
}
  ?>
