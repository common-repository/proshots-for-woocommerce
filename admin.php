<?php

  require_once plugin_dir_path( __FILE__ ) .'includes/codestar/codestar-framework.php'; // Codestar Framework Loaded

  // Control core classes for avoid errors
  if( class_exists( 'CSF' ) ) {

      //
      // Set a unique slug-like ID
      $prefix = 'wp_proshots_options';
    
      //
      // Create options
      CSF::createOptions( $prefix, array(
        'framework_title' => 'Proshots For WooCommerce',
        'menu_title' => 'ProShots Options',
        'menu_slug'  => 'wp_proshots_options',
        'footer_credit'=> 'Made with ♥ by Team Codember',
        'menu_icon' => 'dashicons-camera',
        'show_bar_menu'  => false,
      ) );
    
      //


      // Proshots General Settings
      CSF::createSection( $prefix, array(
        'title'  => 'Layout Settings',
        'fields' => array(

          array(
            'type'    => 'subheading',
            'content' => 'Layout Settings',
          ),

          array(
            'id'    => 'wp_proshots_enable_image_layout',
            'type'  => 'switcher',
            'title' => 'Enable Image Layout',
            'subtitle' => 'Enabling this feature will overrid only category and tag page design. Shop page desing will same as before.',
            'default' => false
          ),
          
    
          //
          // Image Style Selector
          array(
            'id'          => 'wp-proshots-image-layout-options',
            'type'        => 'select',
            'title'       => 'Image Layout',
            'placeholder' => 'Select a layout',
            'dependency' => array( 'wp_proshots_enable_image_layout', '==', true ),
            'options'     => array(
              'justifiedlayout'  => 'Justified Layout',
              //'gridlayout'  => 'Grid Layout',
              //'squarelayout'  => 'Square Layout',
            ),
            'default'     => 'justifiedlayout'
          ),


          array(
            'id'          => 'wp_proshots_image_column',
            'type'        => 'select',
            'title'       => 'Image Column',
            'placeholder' => 'Select a layout',
            'options'     => array(
              2  => '2 Column',
              3  => '3 Column',
              4  => '4 Column',
            ),
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
              'wp-proshots-image-layout-options', '==', 'justifiedlayout',
             ),
            'default'     => 4
          ),

          // Caption Settings
          array(
            'type'    => 'subheading',
            'content' => 'Caption Settings',
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
             ),
          ),

          array(
            'id'    => 'wp_proshots_caption_font_size',
            'type'  => 'number',
            'title' => 'Text Size',
            'unit'        => 'px',
            'default'     => 14,
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
             ),
          ),

          array(
            'id'          => 'wp_proshots_caption_text_color',
            'type'        => 'color',
            'title'       => 'Text Color',
            'default'     => '#FFFFFF',
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
             ),
          ),

          array(
            'id'          => 'wp_proshots_caption_background_color',
            'type'        => 'color',
            'title'       => 'Background Color',
            'default'     => 'rgba(0, 0, 0, 0.4)',
            'output_mode' => 'background-color',
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
             ),
          ),

          array(
            'id'         => 'wp_proshots_caption_text_align',
            'type'       => 'button_set',
            'title'      => 'Text Align',
            'dependency' => array( 
              'wp_proshots_enable_image_layout', '==', true,
             ),
            'options'    => array(
            'left'       => 'Left',
            'center'     => 'Center',
            'right'      => 'Right',
            ),
            'default'    => 'center'
          ),
          
        
    
        )
      ) );
    
      //


      // Proshots Watermark Settings

        CSF::createSection( $prefix, array(
          'title'  => 'Watermark Settings',
          'fields' => array(
            

          // Image Watermark

          array(
            'type'    => 'subheading',
            'content' => 'Image Watermark',
          ),

            array(
              'id'      => 'wp-proshots-upload-watermark',
              'type'    => 'media',
              'title'   => 'Image Watermark',
              'library' => 'image',
              'button_title' => 'Select Watermark'
            ),

            

            // Text Watermark

            array(
              'type'    => 'subheading',
              'content' => 'Text Watermark',
            ),

            array(
              'id'      => 'wp_proshots_text_watermark',
              'type'    => 'text',
              'title'   => 'Text Watermark',
              'default' => ''
            ),

            // Text Width

            array(
              'id'      => 'wp_proshots_text_watermark_width',
              'type'    => 'number',
              'title'   => 'Text Width (px)',
              'unit'    => 'px',
              //'default' => ''
            ),

            // // Text Size

            // array(
            //   'id'      => 'wp_proshots_text_watermark_size',
            //   'type'    => 'number',
            //   'title'   => 'Text Size (px)',
            //   'unit'    => 'px',
            //   //'default' => '20'
            // ),

            // Text Color

            array(
              'id'    => 'wp_proshots_text_watermark_color',
              'type'  => 'color',
              'title' => 'Text Color',
              'default' => '#FFFFFF'
            ),
            

            // Text Background Color

            array(
              'id'    => 'wp_proshots_text_watermark_background_color',
              'type'  => 'color',
              'title' => 'Background Color',
            ),
            

            // Common Settings

            // Watermark Opacity

            array(
              'type'    => 'subheading',
              'content' => 'Watermark Common Settings',
            ),

            array(
              'id'      => 'wp_proshots_watermark_opacity',
              'type'    => 'slider',
              'title'   => 'Watermark Opacity',
              'min'     => 0,
              'max'     => 1,
              'step'    => 0.1,
              'default' => 0.7,
            ),

            // Watermark Position
          array(
            'id'          => 'wp_proshots_watermark_position',
            'type'        => 'select',
            'title'       => 'Watermark Position',
            'placeholder' => 'Select a position',
            'options'     => array(
              'nw'  => 'Top Left',
              'n'  => 'Top Center',
              'ne'  => 'Top Right',
              'c'  => 'Center',
              'sw'  => 'Bottom Left',
              's'  => 'Bottom Center',
              'se'  => 'Bottom Right',
            ),
            'default'     => 'Bottom Right'
          ),
      
          )
        ) );
      
        //


        // Override Settings
      CSF::createSection( $prefix, array(
        'title'  => 'Override Settings',
        'fields' => array(

          array(
            'type'    => 'subheading',
            'content' => 'Override WooCommerce Settings',
          ),
          
          //
          // Change WooCommerce Add To Cart Button Text

          array(
            'id'    => 'wp_proshots_add_to_cart_text',
            'type'  => 'text',
            'title' => 'Add To Cart Button Text',
            'subtitle' => 'Enter text to change the Add to Cart button text. Example: Download Now',
          ),

          array(
            'id'    => 'wp_proshots_disable_woocommerce_fields',
            'type'  => 'switcher',
            'title' => 'Disable WooCommerce Default Fields',
            'subtitle' => 'This will disable WooCommerce default Product Description.',
            'default' => true,
          ),
          

        )
      ) );
       
    
    }
    



    






    