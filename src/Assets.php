<?php

namespace Daeristwo;


class Assets {

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
    }


    public function enqueueScripts()
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


}
