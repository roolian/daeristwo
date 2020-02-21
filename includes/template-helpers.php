<?php
/*======================================================*/
/*========================Util==========================*/
/*======================================================*/
function reduce_text_lenght($text, $limit)
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


/**
 * Archive Navigation
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 */
function daeristwo_archive_navigation()
{
    $settings = array(
        'count' => 6,
        'prev_text' => '<span aria-hidden="true">&laquo;</span>',
        'next_text' => '<span aria-hidden="true">&raquo;</span>'
    );
    global $wp_query;
    $current = max(1, get_query_var('paged'));
    $total = $wp_query->max_num_pages;
    $links = array();
    // Offset for next link
    if ($current < $total)
        $settings['count']--;
    // Previous
    if ($current > 1) {
        $settings['count']--;
        $links[] = daeristwo_archive_navigation_link($current - 1, 'prev', $settings['prev_text']);
    }
    // Current
    $links[] = daeristwo_archive_navigation_link($current, 'active');
    // Next Pages
    for ($i = 1; $i < $settings['count']; $i++) {
        $page = $current + $i;
        if ($page <= $total) {
            $links[] = daeristwo_archive_navigation_link($page);
        }
    }
    // Next
    if ($current < $total) {
        $links[] = daeristwo_archive_navigation_link($current + 1, 'next', $settings['next_text']);
    }
    echo '<nav class="navigation posts-navigation" role="navigation" aria-label="Pagination">';
    echo '<ul class="pagination justify-content-center">' . join('', $links) . '</ul>';
    echo '</nav>';
}



/**
 * Archive Navigation Link
 *
 * @author Bill Erickson
 * @see https://www.billerickson.net/custom-pagination-links/
 *
 * @param int $page
 * @param string $class
 * @param string $label
 * @return string $link
 */
function daeristwo_archive_navigation_link($page = false, $class = '', $label = '')
{
    if (!$page)
        return;
    $classes = array('page-numbers');
    if (!empty($class))
        $classes[] = $class;
    $classes = array_map('sanitize_html_class', $classes);
    $label = $label ? $label : $page;
    $link = esc_url_raw(get_pagenum_link($page));
    return '<li class="page-item  ' . join(' ', $classes) . '"><a class="page-link" href="' . $link . '">' . $label . '</a></li>';
}

/*======================================================*/
/*=========================Shortcode====================*/
/*======================================================*/

//add_shortcode( 'custom-template', 'custom_template_shortcode' );
function custom_template_shortcode($param)
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

/*======================================================*/
/*=====Chargement des données pour les tempaltes========*/
/*======================================================*/

function daeristwo_last_posts_widget()
{
    $args = array(
        'numberposts' => 5,
        'post_type'   => 'post'
    );

    $posts = get_posts($args);

    if ($posts) {
        echo '<h3>';
        echo __('Derniers Articles', 'daerisone');
        echo '</h3>';
        echo '<ul>';
        foreach ($posts as $post) :
            echo '<li class="thumb-section-link">';
            echo '<a href="' . get_permalink($post) . '" class="btCases" id="post' . $post->ID . '" >';
            echo get_the_title($post->ID);
            echo '</a>';
            echo '</li>';
        endforeach;
        echo '</ul>';
    }
}

function daeristwo_the_posts_navigation($pages = false)
{
    if ($pages) $GLOBALS['wp_query']->max_num_pages = $pages;
    daeristwo_archive_navigation();
}
