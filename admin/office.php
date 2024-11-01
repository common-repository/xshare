<?php
/**
 * @package xshare
 * @author rainastudio
 * @version 1.0.1
 */

// options' page
function xshare_admin_panel() {
    // load options panel
    include( plugin_dir_path( __FILE__ ) . 'panel.php' );
}

// add option page to admin menu
add_action('admin_menu', 'xshare_admin_panel_menu');

function xshare_admin_panel_menu() {

    add_menu_page( 'xShare Settings', "xShare", 'manage_options', 'xshare', 'xshare_admin_panel',  '', 81 );
    
    // save sanitization data
    add_action( 'admin_init', 'sanitize_xshare_opitions_settings' );
}

// sanitize option data
function sanitize_xshare_opitions_settings() {

    $settingsArray = array(
        'xshare_a_title',
        'xshare_b_ameta',
        'xshare_v_button',
        'xshare_api_key',        
        'xshare_twitter_name'
    );
    
    foreach ($settingsArray as $setting) {
        // register options
        register_setting( 'xshare_opitions_settings', $setting );
    }
      
}

// add social share element
function xshare_social_share_div_header( $content ) {

	if ( ! is_archive() && ! is_home() && is_singular() ){

        $xShare = '<div id="xShare_bf"></div>';
        
        return $xShare . $content;

	} else {

		return;

	}

}
function xshare_social_share_div_footer( $content ) {

	if ( ! is_archive() && ! is_home() && is_singular() ){

        $xShare = '<div id="xShare_baa"></div>';
        
        return $content . $xShare;

	} else {

		return;

	}

}
function xshare_social_share_div_page() {

	if ( is_page() || is_archive() || is_home() || is_woocommerce() ){

        $xShare = '<div id="xShare_v"></div>';
        echo $xShare;

	} else {

		return;

	}

}
if( function_exists( 'xshare_social_share_div_header' )){

    $xShare_a_title = get_option( 'xshare_a_title', 'xshare_opitions_settings');
    if( "1" === $xShare_a_title ){
        add_filter( 'the_content', 'xshare_social_share_div_header', 1 );
    }
}
if( function_exists( 'xshare_social_share_div_footer' )){

    $xshare_b_ameta = get_option( 'xshare_b_ameta', 'xshare_opitions_settings');
    if( "1" === $xshare_b_ameta ){
        add_filter( 'the_content', 'xshare_social_share_div_footer' );
    }
}
if( function_exists( 'xshare_social_share_div_page' )){

    $xshare_v_button = get_option( 'xshare_v_button', 'xshare_opitions_settings');
    if( "1" === $xshare_v_button ){
        add_filter( 'wp_footer', 'xshare_social_share_div_page' );
    }
}

// add xShare meta to header
function xshare_social_meta(){
    $xshare_api_key = get_option( 'xshare_api_key', 'xshare_opitions_settings');
    $xshare_twitter_name = get_option( 'xshare_twitter_name', 'xshare_opitions_settings');
    echo '<meta name="xShare_api" content="'.$xshare_api_key.'"/>';
    echo '<meta name="xShare_tname" content="'.$xshare_twitter_name.'"/>';
}
add_action('wp_head','xshare_social_meta');