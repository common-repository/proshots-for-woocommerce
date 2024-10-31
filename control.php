<?php

    class Wp_Proshots_Controls {

        public function __construct(){

            add_action('wp_enqueue_scripts', array($this,'wp_proshots_load_custom_assets'));

        }



        public function wp_proshots_load_custom_assets($hook) {

            $options = get_option( 'wp_proshots_options' );
            
            $wp_proshots_data = array(

                // Get Ajax URL
                
                'ajax_url' => admin_url('admin-ajax.php'),

                // Lightbox Settings
                
                'lightbox_animation' => $options['wp_proshots_lightbox_animation'],
                'lightbox_animation_duration' => $options['wp_proshots_lightbox_animation_duration'],
                'lightbox_image_protection' => $options['wp_proshots_lightbox_image_protection'],
                
                // Watermark Settings

                'watermark' => $options['wp-proshots-upload-watermark'],
                'text_watermark' => $options['wp_proshots_text_watermark'],
                // 'text_watermark_size' => $options['wp_proshots_text_watermark_size'],
                'text_watermark_width' => $options['wp_proshots_text_watermark_width'],
                'text_watermark_color' => $options['wp_proshots_text_watermark_color'],
                'text_watermark_background_color' => $options['wp_proshots_text_watermark_background_color'],
                'watermark_opacity' => $options['wp_proshots_watermark_opacity'],
                'watermark_position' => $options['wp_proshots_watermark_position'],

                // Caption Style Settings
                'caption_font_size' => $options['wp_proshots_caption_font_size'],
                'caption_text_color' => $options['wp_proshots_caption_text_color'],
                'caption_background_color' => $options['wp_proshots_caption_background_color'],
                'caption_text_align' => $options['wp_proshots_caption_text_align'],
            );


            $wp_proshots_image_layout_data = array(
                'image_layout' => $options['wp-proshots-image-layout-options'],
                'image_column' => $options['wp_proshots_image_column'],
            );

            
            // create my own version codes
            $main_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/main.js' ));
            $layoutjs_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/layout.js' ));
            $infinitegrid_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'lib/js/infinitegrid.pkgd.min.js' ));

            // if ( is_shop() OR is_product_category() OR is_product_tag() ) {
                wp_enqueue_script( 'infinitegrid', plugins_url( 'lib/js/infinitegrid.pkgd.min.js', __FILE__ ), array(), $infinitegrid_ver, true);
                wp_enqueue_script( 'layoutjs', plugins_url( 'assets/js/layout.js', __FILE__ ), array(), $layoutjs_ver, true);
                wp_localize_script( 'layoutjs', 'wp_proshots_image_layout_data', $wp_proshots_image_layout_data);
            // }
            wp_enqueue_script( 'main_js', plugins_url( 'assets/js/main.js', __FILE__ ), array('jquery'), $main_js_ver, true );
            wp_localize_script( 'main_js', 'wp_proshots_data', $wp_proshots_data);
        }

    }


    new Wp_Proshots_Controls();
    