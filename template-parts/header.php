<?php

/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
?>
<header role="banner">

    <nav class="navbar is-fixed-top is-spaced" role="navigation" aria-label="main navigation" id="mainNavbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $image = wp_get_attachment_image_src($custom_logo_id, 'large');
                        echo "<img src='" . $image[0] . "' />";
                    } elseif ($site_name) {
                        echo esc_html($site_name);
                    }
                    ?>
                </a>

                <a role="button" class="burger navbar-burger" tabindex="1" data-target="primary-menu" aria-controls="primary-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="primary-menu" class="navbar-menu">
                <div class="navbar-end">
                    <?php if (has_nav_menu('menu-1')) : ?>
                        <?php wp_nav_menu(array(
                                'theme-location'    => 'menu-1',
                                'depth'        =>    3,
                                'menu'            =>    'NewNav',
                                'container'        =>    '',
                                'menu_class'        =>    '',
                                'items_wrap'        =>    '%3$s',
                                'walker'        =>    new Bulma_NavWalker(),
                                'fallback_cb'        =>    'Bulma_NavWalker::fallback'
                            ));
                            ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

</header>