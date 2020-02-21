<?php

//Add Ajax function Here like sample

//add_action('wp_ajax_get_references', 'getReferences');
//add_action('wp_ajax_nopriv_get_references', 'getReferences');
function getReferences()
{
    if (isset($_POST['type'])) {
        if ($_POST['type'] == "all") {
            $args = array(
                'numberposts' => -1,
                'post_type'   => 'reference',
            );
        } else {
            $args = array(
                'numberposts' => -1,
                'post_type'   => 'reference',
                'meta_key'    => 'type',
                'meta_value'    => $_POST['type'],
            );
        }


        $refs = get_posts($args);

        ob_start();

        include(locate_template('template-parts/references-list.php', false, false));

        $data['html'] = ob_get_clean();
        wp_send_json_success($data);
    } else {
        // Sinon j'envoie une erreur
        wp_send_json_error('oups');
    }
}
