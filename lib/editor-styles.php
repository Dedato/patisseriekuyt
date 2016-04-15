<?php
/*
Plugin Name: Custom Styles
Plugin URI: http://www.speckygeek.com
Description: Add custom styles in your posts and pages content using TinyMCE WYSIWYG editor. The plugin adds a Styles dropdown menu in the visual post editor.
Based on TinyMCE Kit plug-in for WordPress

http://plugins.svn.wordpress.org/tinymce-advanced/branches/tinymce-kit/tinymce-kit.php
*/

/* Apply styles to the visual editor */  
add_filter('mce_css', 'tuts_mcekit_editor_style');
function tuts_mcekit_editor_style($url) {

    if ( !empty($url) )
        $url .= ',';

    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= get_stylesheet_directory_uri() . '/assets/css/main.min.css';

    return $url;
}

/* Add "Styles" drop-down */ 
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/* Add styles/classes to the "Styles" drop-down */ 
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
function tuts_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' 		=> 'Knop Klein',
            'selector' 	=> 'a',
            'classes' 	=> 'btn btn-primary btn-sm'
        ),
        array(
            'title' 		=> 'Knop Normaal',
            'selector' 	=> 'a',
            'classes' 	=> 'btn btn-primary'
        ),
        array(
            'title' 		=> 'Knop Groot',
            'selector' 	=> 'a',
            'classes' 	=> 'btn btn-primary btn-lg'
        ),
        array(
            'title' 		=> 'Knop Seizoen',
            'selector' 	=> 'a',
            'classes' 	=> 'btn btn-primary btn-lg btn-season'
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;

}