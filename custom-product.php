<?php

            // Add the Stock Photos Class

            function wp_proshots_stock_photo_product_class()    {
                class WC_Product_Stock_Photo extends WC_Product_Simple {
                    public function get_type() {
                    return 'stock_photos';
                    }
                }
            }

            add_action( 'init', 'wp_proshots_stock_photo_product_class' );


            // Load the Stock Photos Class

            function wp_proshots_stock_photo_product_class_init( $classname, $product_type ) {
                if ( $product_type == 'stock_photos' ) {
                $classname = 'WC_Product_Stock_Photo';
                    }
                return $classname;
            }

        add_filter( 'woocommerce_product_class', 'wp_proshots_stock_photo_product_class_init', 10, 2 );




        // Add the Stock Photos Dropdown

        function wp_proshots_stock_photo_product_type_dropdown($types) {
            $types[ 'stock_photos' ] = __( 'Stock Photos' );
            return $types;
            }

        add_filter( 'product_type_selector', 'wp_proshots_stock_photo_product_type_dropdown' );




        // Show Downloadable Products
            
            function wc_custom_product_type_options($options){
                $options['downloadable'] = array(
                    'id' => '_downloadable',
                    'wrapper_class' => 'show_if_stock_photos hide_if_simple',
                    'label' => __( 'Available For Download', 'wp_proshots' ),
                    'default' => 'yes'
                );

                $options['virtual'] = array(
                    'id' => '_virtual',
                    'wrapper_class' => 'hide_if_stock_photos hide_if_simple',
                    'label' => __( 'Available For Downloads', 'wp_proshots' ),
                    'default' => 'yes'
                );
                
                return $options;
            }

            add_action( 'product_type_options', 'wc_custom_product_type_options' );




            // Control Stock Photos Tabs

            function wp_proshots_stock_photo_controls($tabs) {

                $tabs['shipping'] = array(
                    'label'		=> __( 'Shipping', 'wp_proshots' ),
                    'target'	=> 'shipping_product_data',
                    'class'		=> array('hide_if_stock_photos','hide_if_virtual', 'hide_if_grouped', 'hide_if_external')
                );


                $tabs['variations'] = array(
                    'label'		=> __( 'Variations', 'wp_proshots' ),
                    'target'	=> 'variable_product_options',
                    'class'		=> array('show_if_stock_photos')
                );

                $tabs['attribute'] = array(
                    'label'		=> __( 'Attributes', 'wp_proshots' ),
                    'target'	=> 'product_attributes',
                    'class'		=> array('show_if_stock_photos')
                );


                $tabs['linked_product'] = array(
                    'label'		=> __( 'Linked Products', 'wp_proshots' ),
                    'target'	=> 'linked_product_data',
                    'class'		=> array('hide_if_stock_photos')
                );


                $tabs['advanced'] = array(
                    'label'		=> __( 'Advanced', 'wp_proshots' ),
                    'target'	=> 'advanced_product_data',
                    'class'		=> array('hide_if_stock_photos')
                );
            
                return $tabs;
            }

            add_filter( 'woocommerce_product_data_tabs', 'wp_proshots_stock_photo_controls' );




            // Enable Pricing Option For Stock Photo Product Type

            function wp_proshots_enable_stock_photo_pricing() {
                if ('product' != get_post_type()) :
                    return;
                endif;
                ?>
                <script type='text/javascript'>
                    jQuery(document).ready(function () {
                        //for Price tab
                        jQuery('.product_data_tabs .general_tab').addClass('show_if_stock_photos').show();
                        jQuery('#general_product_data .pricing').addClass('show_if_stock_photos').show();
                    });
                </script>
                <?php      
            }
            
            add_action('admin_footer', 'wp_proshots_enable_stock_photo_pricing');

            

     
          
            // Enable Add To Cart Button For Stock Photo Product Type
     

            function wp_proshots_add_to_cart() {
                wc_get_template( 'single-product/add-to-cart/simple.php' );
            }
            
            
            add_action('woocommerce_stock_photos_add_to_cart',  'wp_proshots_add_to_cart');  



