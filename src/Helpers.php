<?php

namespace Daeristwo;


class Helpers
{

    public function reduce_text_lenght($text, $limit)
    {
        $text_len = strlen($text);
        if ($text_len > $limit) {
            if ($pos = strpos($text, ' ', $limit)) {
                $text = substr($text, 0, $pos);
                $text .= '...';
            }
        }
        return $text;
    }

}