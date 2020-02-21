<?php

$composer_autoload = __DIR__ . '/vendor/autoload.php';


if (file_exists($composer_autoload)) {
    require_once $composer_autoload;
    $timber = new Timber\Timber();
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;



new Daeristwo\StarterSite();


new Daeristwo\Cleanup();
new Daeristwo\CustomPostTypes();
new Daeristwo\Helpers();
new Daeristwo\Assets();
new Daeristwo\Ajax();


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
