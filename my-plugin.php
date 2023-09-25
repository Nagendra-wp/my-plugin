<?php
/**
 * Plugin Name: My Custom Plugin
 * Description: Handle the custom functions replace branding and remove all updates.
**/


// disable updates

// Disable core update emails

function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

// branding logo change



function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>);
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

function dashboard_logo() {
?>
      <style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
    padding: 0 7px;
    background-image: url(<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>) !important;
    background-size: 70%;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.8;
}
#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
    content: " ";
    top: 2px;
}
        </style>
<?php
}
add_action('wp_before_admin_bar_render', 'dashboard_logo');