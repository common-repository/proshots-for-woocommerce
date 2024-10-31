<?php


    class Wp_Proshots_WooCommerce_Override {

        public function __construct(){
            $priority = 10;
            $accepted_args = 2;
            
            $options = get_option( 'wp_proshots_options' );
            $remove_meta_box = $options['wp_proshots_disable_woocommerce_fields'];

            if($remove_meta_box == true) {
                add_action( 'init', array($this,'wp_proshots_disable_post_type_support'), $priority );
                add_action('add_meta_boxes', array($this,'wp_proshots_disable_product_description_support'), 999);
            }

            add_filter( 'woocommerce_product_single_add_to_cart_text', array($this,'wp_proshots_change_add_to_cart_text'), $priority,$accepted_args );

        }

        
        // Change WooCommerce Add To Cart Text

        public function wp_proshots_change_add_to_cart_text() {
            $options = get_option( 'wp_proshots_options' );
            $button_text = $options['wp_proshots_add_to_cart_text'];
            
            if($button_text){
                return __( $button_text, 'wp_proshots' );
            }

            else{
                return __( 'Add To Cart', 'wp_proshots' );;
            }

        }

         
         // Remove post-formats support from WooCommerce Product.

        public function wp_proshots_disable_post_type_support() {
            remove_post_type_support( 'product', 'editor' );
        }


        // Remove Product Description support from WooCommerce Product.

        public function wp_proshots_disable_product_description_support() {
            remove_meta_box( 'postexcerpt', 'product', 'normal');
        }

    }


    new Wp_Proshots_WooCommerce_Override();





   

        
        
        


        
    