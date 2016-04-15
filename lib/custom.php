<?php
/**
 * Custom functions
 */


/* ==========================================================================
   Convert url to pretty looking url
   ========================================================================== */  
function pretty_url($input){
	// If URI is like, eg. www.way2tutorial.com/
	$input = trim($input, '/');
	// If not have http:// or https:// then prepend it
	if (!preg_match('#^http(s)?://#', $input)) {
	    $input = 'http://' . $input;
	}
	$urlParts = parse_url($input);
	// Remove www.
	$domain_name = preg_replace('/^www\./', '', $urlParts['host']);
	echo $domain_name;
}


/* ==========================================================================
   Custom Wordpress Login & Admin Page
   ========================================================================== */  
   
/* Custom style Wordpress login page */
function wp_custom_login() { 
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/wp-admin.css" />'; 
}
// Change url logo Wordpress login page
function put_my_url(){
	return (get_home_url());
}
// Custom style Wordpress dashboard
function wp_custom_admin() { 
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/wp-admin.css" />'; 
}
add_action('login_head', 'wp_custom_login');
add_filter('login_headerurl', 'put_my_url');
add_action('admin_head', 'wp_custom_admin');



/* ==========================================================================
   Enable Appearance > Menu's for Editors
   ========================================================================== */  
   
// get the the role object
$role_object = get_role( 'editor' );
// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );