<?php
/*
Plugin Name: IMAGREE
*/
/*
@todo: add localization
@todo: save checked to user
@todo: settings for available forms (show agreement or not)
*/

include ( plugin_dir_path( __FILE__ ) . "settings.php" );
include ( plugin_dir_path( __FILE__ ) . "settings_page.php" );

include ( plugin_dir_path( __FILE__ ) . "forms/wordpress_registration.php" );
include ( plugin_dir_path( __FILE__ ) . "forms/wordpress_comment.php" );
include ( plugin_dir_path( __FILE__ ) . "forms/woocommerce_checkout.php" );
?>