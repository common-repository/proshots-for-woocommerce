<?php

    // ACF Loaded

    define( 'includes/acf', get_stylesheet_directory() . '/includes/acf/' );
    define( 'includes/acf', get_stylesheet_directory_uri() . '/includes/acf/' );
    include_once plugin_dir_path( __FILE__ ) .'includes/acf/acf.php';


    // Hide ACF From Dashboard

        
    function wp_proshots_hide_acf($show_admin) {
        return false;
    }

    add_filter('acf/settings/show_admin', 'wp_proshots_hide_acf');



    // ACF Fields and Controls


    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5f66280f13baa',
            'title' => 'Stock Photo Informations',
            'fields' => array(
                array(
                    'key' => 'field_5f66288cd062d',
                    'label' => 'Image Details',
                    'name' => 'wp_proshots_image_details',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'product',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
        
        endif;