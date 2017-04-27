<?php
/*
Plugin settings page
*/

if ( is_admin() ){
  add_action( 'admin_menu', 'add_imagree_settings_submenu' );
  add_action( 'admin_init', 'register_imagree_settings' );
} 

function add_imagree_settings_submenu() {
    add_options_page('imagree settings', 'imagree settings', 'manage_options', 'imagree', 'imagree_options_page_html');
}

function imagree_options_page_html(){
    ?>
     <div class="wrap">
     <h1>Настройки текста</h1>
     <form action="options.php" method="post">
	     <?php settings_fields( 'imagree_texts' );?>
	     <table class="form-table">
	         <tbody>
	             <tr>
	                 <th>
	                    <label for="imagree_checkbox_label">
	                    	<?php /*@todo: add localization*/?>
	                        Текст для checkbox'а
	                    </label>
	                </th>
	                <td>
	                    <input type="text" name="imagree_checkbox_label" id="imagree_checkbox_label" 
	                        value="<?php /*@todo: add localization*/ echo get_option('imagree_checkbox_label'); ?>">
	                </td>
	            </tr>
	            <tr>
	                <th>
	                    <label for="imagree_error_text">
	                    <?php /*@todo: add localization*/?>
	                    Текст ошибки
	                    </label>
	                </th>
	                <td>
	                    <input type="text" name="imagree_error_text" id="imagree_error_text" 
	                        value="<?php /*@todo: add localization*/ echo get_option('imagree_error_text'); ?>">
	                </td>
	            </tr>
	        </tbody>
	    </table>         
        <?php submit_button('Save Settings');?>
    </form>
    </div>
 <?php
}

function register_imagree_settings(){
    register_setting( 'imagree_texts', 'imagree_checkbox_label' );
    register_setting( 'imagree_texts', 'imagree_error_text' );
}

/*
Default messages
*/
add_filter( 'default_option_imagree_checkbox_label', 'filter_function_imagree_checkbox_label', 1, 3 );
function filter_function_imagree_checkbox_label( $default, $option, $passed_default ){
	global $imagree_settings;
	return $imagree_settings['default_imagree_checkbox_label'];
}

add_filter( 'default_option_imagree_error_text', 'filter_function_imagree_error_text', 1, 3 );
function filter_function_imagree_error_text( $default, $option, $passed_default ){
	global $imagree_settings;
	return $imagree_settings['default_imagree_error_text'];
}

?>