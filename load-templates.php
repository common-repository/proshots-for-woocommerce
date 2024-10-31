<?php

        class Wp_Proshots_Load_Custom_WooCommerce_Templates {

            public function __construct(){
                // Get Option Value From Options Panel
                $options = get_option( 'wp_proshots_options' );
                $layout = $options['wp_proshots_enable_image_layout'];

                $priority = 1;
                $accepted_args = 3;

                if($layout == true){
                    add_filter( 'woocommerce_locate_template', array($this,'wp_proshots_locate_template_category'), $priority, $accepted_args);
                }

                add_filter( 'woocommerce_locate_template', array($this,'wp_proshots_locate_single_product_image'), $priority, $accepted_args);
            
            }


            public function wp_proshots_locate_template_category( $template, $template_name, $template_path ) {
                
                $basename = basename( $template );
                if( $basename == 'archive-product.php' ) {
                    $template = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'templates/archive-product.php';
                }
                return $template;

            }


            public function wp_proshots_locate_single_product_image( $template, $template_name, $template_path ) {
                
                $basename = basename( $template );
                if( $basename == 'product-image.php' ) {
                    $template = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'templates/single-product/product-image.php';
                }
                return $template;

            }


        }



    new Wp_Proshots_Load_Custom_WooCommerce_Templates();