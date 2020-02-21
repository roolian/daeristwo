<?php


/*
Désactiver les flux non utilisés
*/

function daeristwo_disable_feed()
{
    wp_die(__('No feed available,please visit our <a href="' . get_bloginfo('url') . '">homepage</a>!'));
}

add_action('do_feed', 'daeristwo_disable_feed', 1);
add_action('do_feed_rdf', 'daeristwo_disable_feed', 1);
add_action('do_feed_rss', 'daeristwo_disable_feed', 1);
add_action('do_feed_rss2', 'daeristwo_disable_feed', 1);
add_action('do_feed_atom', 'daeristwo_disable_feed', 1);
add_action('do_feed_rss2_comments', 'daeristwo_disable_feed', 1);
add_action('do_feed_atom_comments', 'daeristwo_disable_feed', 1);


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

/*
Enlever les styles inutiles dans header
*/
function daeristwo_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'daeristwo_remove_recent_comments_style');

/*
Désactiver les commentaires
*/

//add_filter('comments_open', 'daeristwo_comments_closed', 10, 2);
//add_action( 'admin_menu' , 'daeristwo_remove_commentstatus_meta_box' );
//add_action( 'admin_menu', 'daeristwo_remove_links_tab_menu_pages' );

function daeristwo_comments_closed($open, $post_id)
{
    $open = false;
    return $open;
}

function daeristwo_remove_commentstatus_meta_box()
{
    remove_meta_box('commentstatusdiv', 'post', 'normal');
}

function daeristwo_remove_links_tab_menu_pages()
{
    remove_menu_page('edit-comments.php');
}

//Désactiver les sauvegardes automatiques
add_action('wp_print_scripts', 'daeristwo_no_autosave');
function daeristwo_no_autosave()
{
    wp_deregister_script('autosave');
}
