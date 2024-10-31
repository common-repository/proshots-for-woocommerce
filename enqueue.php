<?php

    class Wp_Proshots_Assets {
        
        public function __construct() {
            add_action('wp_enqueue_scripts', array($this,'wp_proshots_assets'));
        }
        

            /**
             * All core scripts will enqueued from here
             */
        public function wp_proshots_assets($hook) {

                // $options = get_option('wp_proshots_options');
                // $affiliate = $options['wp_proshots_select_affiliate'];

                $core_css = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/core.css' ));
                //$fancybox_css = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'lib/css/jquery.fancybox.min.css' ));
                $watermarkjs_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'lib/js/jquery.watermark.js' ));
                $lazyload_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'lib/js/jQuery.loadScroll.js' ));
                //$fancybox_js = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'lib/js/jquery.fancybox.min.js' ));
                
                // Enquenue CSS and JS scripts

                wp_enqueue_script( 'lazyload', plugins_url( 'lib/js/jQuery.loadScroll.js', __FILE__ ), array('jquery'), $lazyload_ver);
               // wp_enqueue_script( 'fancybox', plugins_url( 'lib/js/jquery.fancybox.min.js', __FILE__ ), array('jquery'), $fancybox_js);
                wp_enqueue_script( 'watermarkjs', plugins_url( 'lib/js/jquery.watermark.js', __FILE__ ), array('jquery'), $watermarkjs_ver);
                //wp_enqueue_script( 'depositphotos', '//static.depositphotos.com/js_c/widget-ext.js"', array(), '');
                wp_register_style( 'core_css',    plugins_url( 'assets/css/core.css',    __FILE__ ), true,   $core_css );
                //wp_register_style( 'fancybox_css',    plugins_url( 'lib/css/jquery.fancybox.min.css',    __FILE__ ), true,   $fancybox_css );
                wp_enqueue_style ( 'core_css' );
               // wp_enqueue_style ( 'fancybox_css' );

                // if ($affiliate == 'depositphotos') {
                //     wp_enqueue_script( 'depositphotos', '//static.depositphotos.com/js_c/widget-ext.js"', array(), '');
                // }

            }

    }


    new Wp_Proshots_Assets();

    



function producttype_custom_js() {

    if ( 'product' != get_post_type() ) :
        return;
    endif;
    
    ?><script type='text/javascript'>
        jQuery( document ).ready( function() {
            jQuery( '.enable_variation' ).addClass( 'show_if_cus_producttype' ).show();
        });
    
    </script><?php 
    } 
    
    add_action( 'admin_footer', 'producttype_custom_js' );

