<?php

/*======================================================*/
/*================ PREFIXE FONCTIONS : DRS ==============*/
/*======================================================*/

// define constants
define('THEME_ROOT_URI', get_stylesheet_directory_uri());
define('THEME_ROOT_DIR', get_stylesheet_directory());
define('THEME_LIB_DIR', THEME_ROOT_DIR . '/includes');
define('THEME_TEMPLATE_DIR', get_stylesheet_directory() . '/template-parts');


include_once THEME_LIB_DIR . '/custom-content.php';
include_once THEME_LIB_DIR . '/assets.php';
include_once THEME_LIB_DIR . '/acf.php';
include_once THEME_LIB_DIR . '/ajax.php';


require_once(THEME_LIB_DIR . '/classes/bulma-navwalker.php');


/*======================================================*/
/*============= MASQUER MISE A JOUR WORDPRESS ==========*/
/*======================================================*/

// supprimer les notifications du core
//add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

// supprimer les notifications de thèmes
//remove_action( 'load-update-core.php', 'wp_update_themes' );
//add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );

// supprimer les notifications de plugins
//remove_action( 'load-update-core.php', 'wp_update_plugins' );
//add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

/*======================================================*/
/*======================== AUTRES ======================*/
/*======================================================*/
