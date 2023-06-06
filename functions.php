<?php

// var dump with auto <pre>
function pprint_r($a) { echo '<pre>'; print_r($a); echo '</pre>'; }
function pvar($a) { echo '<pre>'; var_dump($a); echo '</pre>'; }


// Image support
add_theme_support( 'post-thumbnails' );



function includeJsScript(){
    // wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);

    wp_register_script( 'my_ajax_call', get_template_directory_uri() . '/js/ajaxcall.js', array(), false, true);
    wp_localize_script( 'my_ajax_call', 'obj_ajax', [ 'ajax_url' => get_template_directory_uri() .'/template-parts/ajax-data.php' ] );
    wp_enqueue_script( 'my_ajax_call' );
}
add_action('wp_enqueue_scripts','includeJsScript');


/* Get Rid off jQuery Migrate 1.4.1 */

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
  });


  /*
*  Turn Off Gutenberg
*/
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


/* remove eMoji emoticons junk in the <head> tags */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/* remove the junk that Yoast SEO puts in the <head> tag */
add_filter( 'disable_wpseo_json_ld_search', '__return_true' );
add_filter( 'wpseo_canonical', '__return_false' );
