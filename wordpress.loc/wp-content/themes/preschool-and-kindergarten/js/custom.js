
jQuery(document).ready(function(){
 /** Variables from Customizer for Slider settings */
    if( preschool_and_kindergarten_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( preschool_and_kindergarten_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( preschool_and_kindergarten_data.control == '1' ){
        var slider_control = true;
    }else{
        slider_control = false;
    }

    /** Home Page Slider */
    jQuery('.flexslider').flexslider({
        slideshow: slider_auto,
        animationLoop : slider_loop,
        directionNav: slider_control,
        animation: preschool_and_kindergarten_data.animation,
        slideshowSpeed: preschool_and_kindergarten_data.speed,
        animationSpeed: preschool_and_kindergarten_data.a_speed 
    });

    jQuery("#lightSlider").lightSlider({
        
        item: 1,// slidemove will be 1 if loop is true
        slideMargin: 0,
        pager: false,
        gallery: false,
        thumbMargin: 5,
        enableDrag:false,
        swipeThreshold: 40,
        responsive : [],
 
    });
        

    jQuery('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#site-navigation',
        side: 'right'
    
    });

});
