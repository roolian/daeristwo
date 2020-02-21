<?php

namespace Daeristwo;


class Cleanup
{

    public function __construct()
    {
        add_action('do_feed', array($this, 'disableFeed'), 1);
        add_action('do_feed_rdf', array($this, 'disableFeed'), 1);
        add_action('do_feed_rss', array($this, 'disableFeed'), 1);
        add_action('do_feed_rss2', array($this, 'disableFeed'), 1);
        add_action('do_feed_atom', array($this, 'disableFeed'), 1);
        add_action('do_feed_rss2_comments', array($this, 'disableFeed'), 1);
        add_action('do_feed_atom_comments', array($this, 'disableFeed'), 1);

        add_action('widgets_init', array($this, 'removeRecentCommentsStyle'));

        add_action('wp_print_scripts', array($this, 'disableAutosave'));

        //$this->disableComments();
    }

    public function removeActions()
    {
        remove_action('wp_head', 'feed_links_extra', 3); //removes comments feed.
        remove_action('wp_head', 'feed_links', 2); //removes feed links.


        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
        remove_action('wp_head',      'rest_output_link_wp_head');


        remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
        remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
        remove_action('wp_head', 'wp_generator'); //removes meta name generator.
        remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.

        /*
        Désactiver les emojis
        */
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }

    /*
    Désactiver les flux non utilisés
    */
    public function disableFeed()
    {
        wp_die(__('No feed available,please visit our <a href="' . get_bloginfo('url') . '">homepage</a>!'));
    }

    public function disableComments()
    {
        add_action('comments_open', array($this, 'closeComments'), 10, 2);
        add_action('admin_menu', array($this, 'removeCommentStatusMetaBox'));
        add_action('admin_menu', array($this, 'removeLinksTabMenuComments'));
    }

    /*
    Désactiver les flux non utilisés
    */
    public function removeRecentCommentsStyle()
    {
        global $wp_widget_factory;
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }

    public function disableAutosave()
    {
        wp_deregister_script('autosave');
    }

    public function closeComments($open, $post_id)
    {
        $open = false;
        return $open;
    }

    public function removeCommentStatusMetaBox()
    {
        remove_meta_box('commentstatusdiv', 'post', 'normal');
    }

    public function removeLinksTabMenuComments()
    {
        remove_menu_page('edit-comments.php');
    }
}
