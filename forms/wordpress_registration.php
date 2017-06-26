<?php
/*
WordPress registration form
*/

add_action( 'register_form', 'wp_register_form_add_imagree_checkbox' );

function wp_register_form_add_imagree_checkbox() {

    //Get and set any values already sent
    $imagree = ( isset( $_POST['imagree'] ) ) ? $_POST['imagree'] : '';
    ?>

    <p>
        <label for="imagree">
            <input type="checkbox" name="imagree" id="imagree">
            <?php echo get_option('imagree_checkbox_label'); /*@todo: add localization*/ ?>
            <span class="required">*</span>
        </label>
    </p>

    <?php
}

add_filter( 'registration_errors', 'imagree_registration_errors', 10, 3 );

function imagree_registration_errors( $errors, $sanitized_user_login, $user_email ) {
    
    if ( empty( $_POST['imagree'] ) || ! empty( $_POST['imagree'] ) && trim( $_POST['imagree'] ) == '' ) {
        $errors->add( 'imagree_error', '<strong>ERROR</strong>: '.get_option('imagree_error_text')
            /*@todo: add localization*/ );
    }

    return $errors;
}
?>