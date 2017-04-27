<?php
/*
WooCommerce checkout form
*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    add_action( 'woocommerce_review_order_before_submit', 'woocommerce_order_form_add_imagree_checbox');
    
    function woocommerce_order_form_add_imagree_checbox(){
    	?>
    	<p>
	        <label for="imagree">
	            <input type="checkbox" name="imagree" id="imagree">
	            <?php echo get_option('imagree_checkbox_label'); /*@todo: add localization*/?>
                <span class="required">*</span>
	        </label>
	    </p>
	    <?php
    }


    add_action('woocommerce_after_checkout_validation', 'imagree_woocommerce_after_checkout_validation');

    function imagree_woocommerce_after_checkout_validation( $posted ) {

        if (empty($_POST['imagree'])) {
             wc_add_notice( get_option('imagree_error_text'), 'error' );/*@todo: add localization*/
        }

    }
}
?>