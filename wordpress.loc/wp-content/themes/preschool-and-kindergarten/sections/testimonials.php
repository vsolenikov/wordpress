<?php
/**
 * Testimonials Section
 * 
 * @package Preschool_and_Kindergarten
*/ 
    $title       = get_theme_mod('preschool_and_kindergarten_testimonials_section_title');
    $description = get_theme_mod('preschool_and_kindergarten_testimonials_section_description');
    $cat         = get_theme_mod('preschool_and_kindergarten_testimonial_slider_cat');
    if($cat){ 
	    $testimonials_qry = new WP_Query(array(
		    	'posts_per_page' => -1,
			    'post_type' => 'post',
				'ignore_sticky_posts' => true,
				'cat' => $cat

		    ));

		if($testimonials_qry->have_posts()){ ?> 
			<section class="testimonial">
	            <div class="container">
					<ul id="lightSlider">
						<?php 
						while($testimonials_qry->have_posts()){ $testimonials_qry->the_post(); ?>
							<li>
								<div class="table">
									<div class="table-row">
										<div class="text-holder">
											<?php 
										    preschool_and_kindergarten_get_section_header( $title, $description );
											the_content();
											 ?>
								            <span class="name"><?php 
								                echo esc_html_e( '- ', 'preschool-and-kindergarten'); 
								                the_title();
								                
								                if(has_excerpt()){ 
								                  echo esc_html_e( ' , ', 'preschool-and-kindergarten');
								                  the_excerpt();
								                }
								                ?>  
								            </span>
										</div>
										<?php 
										if(has_post_thumbnail()){ ?>
								            <div class="img-holder">
									           <?php the_post_thumbnail( 'preschool-and-kindergarten-testimonials-thumb' ); ?>
								            </div>
							            <?php 
							            } ?>
									</div>
								</div>
							</li>
						<?php 
						} ?>
					</ul>
			    </div>
			</section>
	    <?php }
	     wp_reset_postdata();
    } ?>