<?php 
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Preschool and Kindergarten
 */

if( ! function_exists( 'preschool_and_kindergarten_get_post_meta' ) ) :
/**
 * Post meta info
*/
function preschool_and_kindergarten_get_post_meta(){
    
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'On %s', 'post date', 'preschool-and-kindergarten' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'By %s', 'post author', 'preschool-and-kindergarten' ),
		'<span class="authors vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'preschool-and-kindergarten' ) );
		if ( $categories_list && preschool_and_kindergarten_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'preschool-and-kindergarten' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'preschool-and-kindergarten' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

}
endif;


if ( ! function_exists( 'preschool_and_kindergarten_entry_footer' ) ) :
/**
 * Prints edit links
 */
function preschool_and_kindergarten_entry_footer() {	

    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() && is_single() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'preschool-and-kindergarten' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i>' . esc_html__( ' %1$s ', 'preschool-and-kindergarten' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'preschool-and-kindergarten' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function preschool_and_kindergarten_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'preschool_and_kindergarten_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'preschool_and_kindergarten_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so preschool_and_kindergarten_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so preschool_and_kindergarten_categorized_blog should return false.
		return false;
	}
}


if( !function_exists( 'preschool_and_kindergarten_breadcrumbs_cb' ) ):
/**
 * Breadcrumb
*/
    function preschool_and_kindergarten_breadcrumbs_cb(){
      
        $showOnHome    = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter     = esc_html( get_theme_mod( 'preschool_and_kindergarten_breadcrumb_separator', __( '>', 'preschool-and-kindergarten' ) ) ); // delimiter between crumbs
        $home          = esc_html( get_theme_mod( 'preschool_and_kindergarten_breadcrumb_home_text', __( 'Home', 'preschool-and-kindergarten' ) ) ); // text for the 'Home' link
        $showCurrent   = get_theme_mod( 'preschool_and_kindergarten_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before        = '<span class="current">'; // tag before the current crumb
        $after         = '</span>'; // tag after the current crumb
        $ed_breadcrumb = get_theme_mod( 'preschool_and_kindergarten_ed_breadcrumb' );
        
        global $post;
        $homeLink = esc_url( home_url( ) );
        
        if( $ed_breadcrumb ){
            if ( is_front_page() ) {
            
                if ( $showOnHome == 1 ) echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div>';
            
            } else {
            
                echo '<div id="crumbs"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            
                if ( is_category() ) {
                    $thisCat = get_category( get_query_var( 'cat' ), false );
                    if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
                    echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
                
                } elseif ( is_search() ) {
                    echo $before . esc_html__( 'Search Results for "', 'preschool-and-kindergarten' ) . esc_html( get_search_query() ) . esc_html__( '"', 'preschool-and-kindergarten' ) . $after;
                
                } elseif ( is_day() ) {
                    echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    echo $before . esc_html( get_the_time( 'd' ) ) . $after;
                
                } elseif ( is_month() ) {
                    echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    echo $before . esc_html( get_the_time( 'F' ) ) . $after;
                
                } elseif ( is_year() ) {
                    echo $before . esc_html( get_the_time( 'Y' ) ) . $after;
            
                } elseif ( is_single() && !is_attachment() ) {
                    if ( get_post_type() != 'post' ) {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        echo '<a href="' . esc_url( $homeLink . '/' . $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
                        if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
                    } else {
                        $cat = get_the_category(); 
                        if( $cat ){
                            $cat = $cat[0];
                            $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                            if ( $showCurrent == 0 ) $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
                            echo $cats;
                        }
                        if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
                    }
                
                } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    echo $before . esc_html( $post_type->labels->singular_name ) . $after;
                
                } elseif ( is_attachment() ) {
                    $parent = get_post( $post->post_parent );
                    $cat = get_the_category( $parent->ID ); 
                    if( $cat ){
                        $cat = $cat[0];
                        echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                        echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    }
                    if ( $showCurrent == 1 ) echo  $before . esc_html( get_the_title() ) . $after;
                
                } elseif ( is_page() && !$post->post_parent ) {
                    if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
            
                } elseif ( is_page() && $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $breadcrumbs = array();
                    while( $parent_id ){
                        $page = get_page( $parent_id );
                        $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                        $parent_id  = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse( $breadcrumbs );
                    for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                        echo $breadcrumbs[$i];
                        if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    }
                    if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
                
                } elseif ( is_tag() ) {
                    echo $before . esc_html( single_tag_title( '', false ) ) . $after;
                
                } elseif ( is_author() ) {
                    global $author;
                    $userdata = get_userdata( $author );
                    echo $before . esc_html( $userdata->display_name ) . $after;
                
                } elseif ( is_404() ) {
                    echo $before . esc_html__( '404 Error - Page not Found', 'preschool-and-kindergarten' ) . $after;
                } elseif( is_home() ){
                    echo $before;
                    single_post_title();
                    echo $after;
                }
            
                echo '</div>';
            
            }
        }   
    } // end preschool_and_kindergarten_breadcrumbs()
endif;


/**
 * Return sidebar layouts for pages
*/
function preschool_and_kindergarten_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'preschool_and_kindergarten_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'preschool_and_kindergarten_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

if( ! function_exists( 'preschool_and_kindergarten_pagination' ) ) :
/**
 * Pagination
*/
function preschool_and_kindergarten_pagination(){
    
    if( is_single() ){
        the_post_navigation();
    }else{
        the_posts_pagination( array(
            'prev_text'   => __( ' Prev ', 'preschool-and-kindergarten' ),
            'next_text'   => __( ' Next ', 'preschool-and-kindergarten' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'preschool-and-kindergarten' ) . ' </span>',
         ) );

    }
    
}
endif;


/**
 * Returns Section header
*/
function preschool_and_kindergarten_get_section_header( $title, $content ){
    if( $title || $content ){ ?>
        <header class="header">
            <?php 
                if( $title ) echo '<h2 class="title">' . esc_html( $title ) . '</h2>';
                if( $content ) echo wpautop( wp_kses_post( $content ) ); 
            ?>
        </header>
    <?php
    }
}