<?php

namespace Daeristwo;


class ShortCodes
{
    public function __construct()
    {
        add_shortcode('customShortcode', array($this, 'customShortcode'));
    }


    public function customShortcode($param)
    {
        extract(
            shortcode_atts(
                array(
                    'id' => ''
                ),
                $param
            )
        );
        if ($id != '')
            return custom_template_shortcode_output($id);
        else
            return $id;
    }
}
