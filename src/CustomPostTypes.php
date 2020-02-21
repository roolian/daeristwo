<?php

namespace Daeristwo;


class CustomPostTypes
{
    public function __construct()
    {
        add_action('init', array($this, 'createPostTypes'));
        add_action('init', array($this, 'createTaxonomies'));
    }

    public function createPostTypes()
    {
        //$this->registerBooks();
    }

    public function createTaxonomies()
    {
        //$this->registerThemes();
    }

    public function registerBooks()
    {
        register_post_type(
            "book",
            array(
                'labels' => array(
                    'name' => __('Références', 'backend'),
                    'singular_name' => __('Référence', 'backend'),
                    'all_items' => __('Toutes les références', 'backend'),
                    'add_new' => __('Ajouter', 'backend'),
                    'add_new_item' => __('Ajouter une référence', 'backend'),
                    'edit' => __('Modifier', 'backend'),
                    'edit_item' => __('Modifier la référence', 'backend'),
                    'new_item' => __('Nouvelle référence', 'backend'),
                    'view_item' => __('Voir la référence', 'backend'),
                    'search_items' => __('Rechercher une référence', 'backend'),
                    'not_found' =>  __('Non trouvée', 'backend'),
                    'not_found_in_trash' => __('Non trouvée dans la corbeille', 'backend'),
                    'parent_item_colon' => ''
                ),
                'taxonomies' => [],
                'public' => true,
                'has_archive' => false,
                'exclude_from_search' => false,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'realisations'),
                'supports' => array('title',  'editor', 'thumbnail'),
                'menu_icon' => 'dashicons-book-alt'
            )
        );
    }

    public function registerTheme()
    {
        register_taxonomy(
            'theme',
            array('post'),
            array(
                'labels' => array(
                    'name' => __('Thèmes', 'backend'),
                    'singular_name' => __('Thème', 'backend'),
                    'all_items' => __('Tous les thèmes', 'backend'),
                    'edit_item' => __('Editer le thème', 'backend'),
                    'view_item' => __('Voir le thème', 'backend'),
                    'update_item' => __('Mettre à jour le thème', 'backend'),
                    'add_new_item' => __('Ajouter un thème', 'backend'),
                    'new_item_name' => __('Nouveau thème', 'backend'),
                    'search_items' => __('Rechercher parmi les thèmes', 'backend'),
                    'popular_items' => __('Thèmes les plus utilisés', 'backend'),
                ),
                'hierarchical' => true,
                'public'  => true,
                'rewrite'      => array('slug' => 'theme', 'with_front' => true),
                'show_admin_column' => true,
                'show_in_menu' => false
            )
        );
    }
}
