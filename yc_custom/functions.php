<?php

$theme = wp_get_theme();
define('THEME_VER', $theme->Version);
// function redirect_login_page()
// {
//   $login_url  = home_url('/login');
//   $url = basename($_SERVER['REQUEST_URI']); // get requested URL
//   isset($_REQUEST['redirect_to']) ? ($url   = "wp-login.php") : 0; // if users ssend request to wp-admin
//   if ($url  == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//     wp_redirect($login_url);
//     exit;
//   }
// }
// add_action('init', 'redirect_login_page');




function carbon_enqueue_scripts()
{
  wp_enqueue_script('carbon_main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), THEME_VER);
}
add_action('wp_enqueue_scripts', 'carbon_enqueue_scripts');
