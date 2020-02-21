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


class StarterSite extends Timber\Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'theme_supports'));
        add_filter('timber/context', array($this, 'add_to_context'));
        add_filter('timber/twig', array($this, 'add_to_twig'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        parent::__construct();
    }

    /** This is where you can register custom post types. */
    public function register_post_types()
    {
    }
    /** This is where you can register custom taxonomies. */
    public function register_taxonomies()
    {
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function add_to_context($context)
    {
        $context['foo']   = 'bar';
        $context['stuff'] = 'I am a value set in your functions.php file';
        $context['notes'] = 'These values are available everytime you call Timber::context();';
        $context['menu']  = new Timber\Menu();
        $context['site']  = $this;
        return $context;
    }

    public function theme_supports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support('menus');
        
        register_nav_menus(array(
            'primary' => __('Main Menu', 'daeristwo'),
            'footernav' => __('Footer Menu', 'daeristwo'),
            'sitemap' => __('Plan de site', 'daeristwo')
        ));

    }

    /** This Would return 'foo bar!'.
     *
     * @param string $text being 'foo', then returned 'foo bar!'.
     */
    public function myfoo($text)
    {
        $text .= ' bar!';
        return $text;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig($twig)
    {
        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
        $twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }
}

new StarterSite();

// define constants
define('THEME_ROOT_URI', get_stylesheet_directory_uri());
define('THEME_ROOT_DIR', get_stylesheet_directory());
define('THEME_LIB_DIR', THEME_ROOT_DIR . '/includes');
define('THEME_TEMPLATE_DIR', get_stylesheet_directory() . '/template-parts');


include_once THEME_LIB_DIR . '/cleanup.php';
include_once THEME_LIB_DIR . '/custom-post-types.php';
include_once THEME_LIB_DIR . '/template-helpers.php';
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
