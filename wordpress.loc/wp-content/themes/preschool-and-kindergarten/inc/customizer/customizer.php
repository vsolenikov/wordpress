<?php
/**
 * Preschool and Kindergarten Theme Customizer.
 *
 * @package Preschool_and_Kindergarten
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
    $preschool_and_kindergarten_sections = array( 'banners', 'about', 'lessons', 'services', 'promotional', 'program', 'testimonials', 'staff', 'news' );
    
    $preschool_and_kindergarten_settings = array( 'default', 'header', 'home', 'breadcrumb', 'social', 'custom' );

   /* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'preschool-and-kindergarten' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }

     /** Option list of all pages */ 
    $options_pages = array();
    $options_pages_obj = get_posts('posts_per_page=-1&post_type=page');
    $options_pages[''] = __( 'Choose Page', 'preschool-and-kindergarten' );
    foreach ( $options_pages_obj as $pages ) {
        $options_pages[$pages->ID] = $pages->post_title; 
    }
    
    /* Option list of all categories */
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $option_categories = array();
    $category_lists = get_categories( $args );
    $option_categories[''] = __( 'Choose Category', 'preschool-and-kindergarten' );
    foreach( $category_lists as $category ){
        $option_categories[$category->term_id] = $category->name;
    }
     

    foreach( $preschool_and_kindergarten_settings as $setting ){
        require get_template_directory() . '/inc/customizer/' . $setting . '.php';
    }

    foreach( $preschool_and_kindergarten_sections as $section ){
        require get_template_directory() . '/inc/customizer/home/' . $section . '.php';
    }

    /**
     * Sanitization Functions
    */
    require get_template_directory() . '/inc/customizer/sanitization-functions.php';



    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function preschool_and_kindergarten_customize_preview_js() {
        wp_enqueue_script( 'preschool_and_kindergarten_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
    }
    add_action( 'customize_preview_init', 'preschool_and_kindergarten_customize_preview_js' );
