<?php
/**
 * Plugin Name: xShare
 * Plugin URL: https://wordpress.org/plugins/xshare/
 * Description: Robust social media sharing plugin for WordPress
 * Author: rainastudio
 * Author URI: https://rainastudio.com
 * Version: 1.0.1
 * Text Domian: xshare
 */

 // don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// define paths
define( 'xshare_js', plugins_url( '/assets/js/', __FILE__ ) );
define( 'xshare_img', plugins_url( '/assets/img/', __FILE__ ) );
define( 'xshare_css', plugins_url( '/assets/css/', __FILE__ ) );

// admin option
require_once( plugin_dir_path( __FILE__ ) . 'admin/office.php' );

// add styles and scripts to admin
function xshare_admin_panel_scripts() {
 
    if( is_admin() ) { 
    
        wp_enqueue_style( 'xshare_admin_css', xshare_css . 'admin.css' );
        wp_enqueue_script('xshare_admin_js', xshare_js . 'admin.js', array(), '1.0.1', true );
		
    }
}

add_action( 'admin_enqueue_scripts', 'xshare_admin_panel_scripts' );

// add styles and scripts to front
function xshare_front_scripts() {

    wp_enqueue_style( 'xshare_font_css', xshare_css . 'style.css' );
    wp_enqueue_script('xshare_js', xshare_js . 'xshare.js', array(), '1.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'xshare_front_scripts' );

// delete options
function xshare_plugin_reset() {

    if ( isset( $_GET['rs_plugin_reset'] ) ){
  
      $settingOptions = array(
        'xshare_a_title',
        'xshare_b_ameta',
        'xshare_v_button',
        'xshare_api_key',
        'xshare_twitter_name'
      );
  
      // clear up our settings
      foreach ( $settingOptions as $settingName ) {
        delete_option( $settingName );
      }
  
      exit( wp_redirect( admin_url( 'admin.php?page=xshare' ) ) );
  
    }
}
add_action( 'admin_init', 'xshare_plugin_reset' );