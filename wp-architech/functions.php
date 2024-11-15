<?php
/**
 * WP Architech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Architech
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_architech_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WP Architech, use a find and replace
		* to change 'wp-architech' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp-architech', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-architech' ),
			'quick_link'  => __( 'Quick Menu', 'wp-architech' ),
			'support_link'  => __( 'Support Menu', 'wp-architech' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_architech_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wp_architech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_architech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_architech_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_architech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_architech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-architech' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-architech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_architech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_architech_scripts() {
	wp_enqueue_style( 'wp-architech-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wp-architech-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), time(), 'all' );
	wp_enqueue_style( 'style_css', get_template_directory_uri() .'/assets/css/style.css', array(), time(), 'all' );
	wp_enqueue_style( 'responsive_css', get_template_directory_uri() .'/assets/css/responsive.css', array(), time(), 'all' );
	wp_enqueue_style( 'color-switcher-design_css', get_template_directory_uri() .'/assets/css/color-switcher-design.css', array(), time(), 'all' );
	wp_enqueue_style( 'default_theme_css', get_template_directory_uri() .'/assets/css/color-themes/default-theme.css', array(), time(), 'all' );

	wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.js', array(),time(), true );
	wp_enqueue_script( 'popper_min_js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), time(), true );
	wp_enqueue_script( 'bootstrap_min_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), time(), true );
	wp_enqueue_script( 'jquery_fancybox_js', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', array(), time(), true );
	wp_enqueue_script( 'owl_js', get_template_directory_uri() . '/assets/js/owl.js', array(), time(), true );
	wp_enqueue_script( 'wow_js', get_template_directory_uri() . '/assets/js/wow.js', array(), time(), true );
	wp_enqueue_script( 'appear_js', get_template_directory_uri() . '/assets/js/appear.js', array(), time(), true );
	wp_enqueue_script( 'mixitup_js', get_template_directory_uri() . '/assets/js/mixitup.js', array(), time(), true );
	wp_enqueue_script( 'script_js', get_template_directory_uri() . '/assets/js/script.js', array(), time(), true );
	wp_enqueue_script( 'color_settings_js', get_template_directory_uri() . '/assets/js/color-settings.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_architech_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

//require get_template_directory() . '/inc/custom-header.php';

require_once('custom-post-type/project-post-type.php');
require_once('custom-post-type/project-shortcode.php');
require_once('custom-post-type/team-post-type.php');
require_once('custom-post-type/team-shortcode.php');
require_once('custom-post-type/post-shortcode.php');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}