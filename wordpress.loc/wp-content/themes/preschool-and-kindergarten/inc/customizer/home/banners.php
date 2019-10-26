<?php 
/*
* slider Section Theme Option.
*
* @Package  preschool_and_kindergarten
*/

function preschool_and_kindergarten_customize_register_slider( $wp_customize ) {
    
    global $option_categories;
    
    $wp_customize->add_section(
        'preschool_and_kindergarten_banner_settings',
        array(
            'title' => __( 'Slider Settings', 'preschool-and-kindergarten' ),
            'priority' => 30,
            'panel' => 'preschool_and_kindergarten_home_page_settings',
        )
    );
    
    /** Enable/Disable banner Section */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_ed_banners_section',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_ed_banners_section',
        array(
            'label' => __( 'Enable Slider Section', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );

    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Control */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_control',
        array(
            'default' => '1',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_control',
        array(
            'label' => __( 'Enable Slider Control', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Slider Animation */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_animation',
        array(
            'label' => __( 'Choose Slider Animation', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'preschool-and-kindergarten' ),
                'slide' => __( 'Slide', 'preschool-and-kindergarten' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_speed',
        array(
            'default' => '7000',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_speed',
        array(
            'label' => __( 'Slider Speed', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Animation Speed */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_animation_speed',
        array(
            'default' => '600',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_animation_speed',
        array(
            'label' => __( 'Animation Speed', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Readmore */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_readmore',
        array(
            'default' => __( 'Continue Reading', 'preschool-and-kindergarten' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_readmore',
        array(
            'label' => __( 'Readmore Text', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'text',
        )
    );
    
    /** Select Category */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_cat',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_cat',
        array(
            'label' => __( 'Choose Slider Category', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'select',
            'choices' => $option_categories,
        )
    );

}
add_action( 'customize_register', 'preschool_and_kindergarten_customize_register_slider' );
