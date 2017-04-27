<?php 
/*
WordPress comment form for not logged in user
*/

add_filter('comment_form_after_fields', 'wp_comment_form_add_imagree_checkbox');

function wp_comment_form_add_imagree_checkbox($fields){
    $imagree_checkbox_label = get_option('imagree_checkbox_label');
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

add_filter( 'preprocess_comment', 'imagree_verify_comment_meta_data' );

function imagree_verify_comment_meta_data( $commentdata ) {
  if ( empty($commentdata['user_ID']) && ! isset( $_POST['imagree'] ) )
  wp_die( get_option('imagree_error_text') /*@todo: add localization*/ );
  return $commentdata;
}

?>