jQuery.cookie.js/jQuery.cookie.min.js scripts fail to load
This is a problem with the server-setting, meaning that your hosting company will need to solvet this on your behalf. The problem is outdated MOD_SECURITY core ruleset.
Option 1: Get your host to update the rule set
This is by far the best option as everything will then work as by design. Contact your hosting provider for assistance.
Option 2: Rename files and update functions.php
------------- ********* -------------
------------- ********* -------------
------------- ********* -------------

wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.js
wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js
to:
wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery_cookie.js
wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery_cookie.min.js
------------- ********* -------------
------------- ********* -------------
------------- ********* -------------

And add the following to your theme’s functions.php file:
------------- ********* -------------
add_action( 'wp_enqueue_scripts', 'custom_frontend_scripts' );function custom_frontend_scripts() {global $post, $woocommerce;

$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? : '.min';
wp_deregister_script( 'jquery-cookie' );
wp_register_script( 'jquery-cookie', $woocommerce->plugin_url() . '/assets/js/jquery-cookie/jquery_cookie' . $suffix . '.js', array( 'jquery' ), '1.3.1', true );
}
