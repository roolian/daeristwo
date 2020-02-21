<?php

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function daeristwo_enqueue_scripts()
{
    wp_enqueue_style(
        'daeristwo-style',
        get_stylesheet_directory_uri() . '/dist/css/app.css',
        [
            //Add dependencie here
        ],
        '1.0.0'
    );


    wp_enqueue_script('daeristwo-script', get_stylesheet_directory_uri() . '/dist/js/app.js', array('jquery'));
    wp_localize_script('daeristwo-script', 'adminAjax', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'daeristwo_enqueue_scripts');

