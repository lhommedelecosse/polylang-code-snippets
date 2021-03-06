<?php  // <~ do not copy the opening php tag

//* Translate Google Recaptcha
add_action( 'wpcf7_enqueue_scripts', 'custom_recaptcha_enqueue_scripts', 11 );

function custom_recaptcha_enqueue_scripts() {
	wp_deregister_script( 'google-recaptcha' );

	$url = 'https://www.google.com/recaptcha/api.js';

    if(pll_current_language() == 'en') {
        $url = add_query_arg( array(
            'onload' => 'recaptchaCallback',
            'render' => 'explicit',
            'hl' => 'en' ), $url );
    } else {
        $url = add_query_arg( array(
            'onload' => 'recaptchaCallback',
            'render' => 'explicit',
            'hl' => 'fr' ), $url );
    }

	wp_register_script( 'google-recaptcha', $url, array(), '2.0', true );
}
