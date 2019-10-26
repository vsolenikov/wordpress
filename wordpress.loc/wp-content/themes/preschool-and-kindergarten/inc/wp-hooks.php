<?php 
/**
 * WordPress Hooks
 *
 * @package preschool_and_kindergarten
 */

/**
 * @see preschool_and_kindergarten_setup
*/
add_action( 'after_setup_theme', 'preschool_and_kindergarten_setup' );

/**
 * @see preschool_and_kindergarten_content_width
*/

add_action( 'after_setup_theme', 'preschool_and_kindergarten_content_width', 0 );

/**
 * @see preschool_and_kindergarten_template_redirect_content_width
*/

add_action( 'template_redirect', 'preschool_and_kindergarten_template_redirect_content_width' );

/**
 * @see preschool_and_kindergarten_scripts
*/

add_action( 'wp_enqueue_scripts', 'preschool_and_kindergarten_scripts' );

/**
 * @see preschool_and_kindergarten_body_classes
*/
add_filter( 'body_class', 'preschool_and_kindergarten_body_classes' );

/**
 * @see preschool_and_kindergarten_category_transient_flusher
*/
add_action( 'edit_category', 'preschool_and_kindergarten_category_transient_flusher' );
add_action( 'save_post',     'preschool_and_kindergarten_category_transient_flusher' );

/**
 * Move comment field to the bottm
 * @see preschool_and_kindergarten_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'preschool_and_kindergarten_move_comment_field_to_bottom' );

/**
 * @see preschool_and_kindergarten_excerpt_more
 * @see preschool_and_kindergarten_excerpt_length
*/
add_filter( 'excerpt_more', 'preschool_and_kindergarten_excerpt_more' );
add_filter( 'excerpt_length', 'preschool_and_kindergarten_excerpt_length', 999 );

/**
 * Custom CSS
 * @see preschool_and_kindergarten_custom_css
*/
add_action( 'wp_head', 'preschool_and_kindergarten_custom_css', 100 );

/**
 * Social Links
 * @see preschool_and_kindergarten_social_cb
*/
add_action( 'preschool_and_kindergarten_social', 'preschool_and_kindergarten_social_cb' );
