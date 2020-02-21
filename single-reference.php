<?php
/*
Template Name: Page référence
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>

<div class="single-reference">

    <section class="section section-title parallax-bg" style="background-image: url( <?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>)">
        <div class="container">
            <?php the_title('<h1 class="h1">', '</h1>'); ?>
            <div class="arrow"></div>
        </div>
    </section>


    <section class=" section section-details">
        <div class=" container">

            <div class="box-details">

                <table class="detail-table">
                    <tr>
                        <td class="labelize">Type</td>
                        <td>
                            <?php
                            $type = get_field('type');
                            echo  $type['label'];
                            ?></td>
                    </tr>
                    <tr>
                        <td class="labelize">Surface</td>
                        <td><?php echo get_field('surface'); ?></td>
                    </tr>
                    <tr>
                        <td class="labelize">Lieu</td>
                        <td><?php echo get_field('lieu'); ?></td>
                    </tr>
                </table>

                <div class="detail-text">
                    <?php the_content(); ?>
                </div>


            </div>




        </div>
    </section>

    <section class=" section section-more">
        <div class="container">
            <div class="has-text-centered">
                <h2 class="h2 is-spaced">D'autres références</h2>
            </div>

            <?php
            $args = array(
                'numberposts' => 2,
                'post_type'   => 'reference',
                'orderby'   => 'rand',
            );

            $refs = get_posts($args);
            include(locate_template('template-parts/references-list.php', false, false));
            ?>
        </div>


    </section>


</div>



<?php
get_footer();
