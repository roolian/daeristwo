<?php

namespace Daeristwo;


class Ajax {

    public function __construct()
    {
        add_action('wp_ajax_get_references', array($this, 'myFunction'));
        add_action('wp_ajax_nopriv_get_references', array($this, 'myFunction'));
    }


    public function myFunction()
    {

    }


}
