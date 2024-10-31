<?php

    /**
     *
     * @link              https://nervythemes.com/
     * @since             1.5
     * @package           Sell your photos, arts, vectors using Woocommerce. Included with Custom Product Type, Watermark Support and much more.
     *
     * @wordpress-plugin
     * Plugin Name:       ProShots For WooCommerce
     * Plugin URI:        https://nervythemes.com/
     * Description:       Sell your photos, arts, vectors using Woocommerce. Included with Custom Product Type, Watermark Support and much more.
     * Version:           1.5
     * Author:            NervyThemes
     * Author URI:        https://nervythemes.com/
     * License:           GPL-2.0+
     * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain:       wp-proshots
     * Tested up to:      6.3.2
     * WC requires at least: 2.2
     * WC tested up to: 8.2.1

    */


     /**
        * Check if WooCommerce is active
     **/


        require __DIR__ . '/vendor/autoload.php';


        /**
         * Initialize the plugin tracker
         *
         * @return void
         */
        function appsero_init_tracker_proshots_for_woocommerce() {

            if ( ! class_exists( 'Appsero\Client' ) ) {
            require_once __DIR__ . '/appsero/src/Client.php';
            }

            $client = new Appsero\Client( '038e8562-ba05-4499-b603-3cf0c5c6ed13', 'Proshots For WooCommerce', __FILE__ );

            // Active insights
            $client->insights()->init();

        }

        appsero_init_tracker_proshots_for_woocommerce();


        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            require_once ('functions.php');
            require_once ('control.php');
        }

        else {
            function wp_proshots_woocomerce_error_notice() {
                ?>
                <div class="notice notice-error is-dismissible" style="background-color:#7F54B3;">
                    <p
                    style="color:#FFFFFF;
                    font-size:16px;
                    ">
                    <strong>Proshots need an active installation of WooCommerce.</strong> Please install WooCommerce from plugin directory and enjoy Proshots.</p>
                </div>
                <?php
            }
            add_action( 'admin_notices', 'wp_proshots_woocomerce_error_notice' );
        }
