<?php
/**
 * Hotel Sorriso Misano - Functions and definitions
 *
 * @package Hotel_Sorriso
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HOTEL_SORRISO_VERSION', '1.0.0' );
define( 'HOTEL_SORRISO_DIR', get_template_directory() );
define( 'HOTEL_SORRISO_URI', get_template_directory_uri() );

/**
 * Theme setup
 */
function hotel_sorriso_setup() {
	// Title tag support
	add_theme_support( 'title-tag' );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hero-banner', 1920, 1080, true );
	add_image_size( 'room-gallery', 800, 600, true );
	add_image_size( 'offer-card', 600, 400, true );

	// Custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// HTML5 support
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Register navigation menus
	register_nav_menus( array(
		'primary'   => __( 'Menu Principale', 'hotel-sorriso' ),
		'footer'    => __( 'Menu Footer', 'hotel-sorriso' ),
		'offerte'   => __( 'Menu Offerte', 'hotel-sorriso' ),
	) );

	// Content width
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}
}
add_action( 'after_setup_theme', 'hotel_sorriso_setup' );

/**
 * Enqueue scripts and styles
 */
function hotel_sorriso_scripts() {
	// Google Fonts
	wp_enqueue_style(
		'hotel-sorriso-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,300;1,9..40,400&display=swap',
		array(),
		null
	);

	// Main stylesheet
	wp_enqueue_style(
		'hotel-sorriso-style',
		HOTEL_SORRISO_URI . '/assets/css/main.css',
		array( 'hotel-sorriso-fonts' ),
		HOTEL_SORRISO_VERSION
	);

	// Theme stylesheet (WordPress requirement)
	wp_enqueue_style(
		'hotel-sorriso-theme',
		get_stylesheet_uri(),
		array( 'hotel-sorriso-style' ),
		HOTEL_SORRISO_VERSION
	);

	// Main JavaScript
	wp_enqueue_script(
		'hotel-sorriso-main',
		HOTEL_SORRISO_URI . '/assets/js/main.js',
		array(),
		HOTEL_SORRISO_VERSION,
		true
	);

	// Localize script with theme data
	wp_localize_script( 'hotel-sorriso-main', 'hotelSorriso', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'hotel_sorriso_nonce' ),
		'siteUrl' => home_url(),
	) );
}
add_action( 'wp_enqueue_scripts', 'hotel_sorriso_scripts' );

/**
 * Include Customizer settings
 */
require_once HOTEL_SORRISO_DIR . '/inc/customizer.php';

/**
 * Include contact form handler
 */
require_once HOTEL_SORRISO_DIR . '/inc/contact-form.php';

/**
 * Include custom Walker for navigation
 */
require_once HOTEL_SORRISO_DIR . '/inc/class-walker-nav.php';

/**
 * Add custom body classes
 */
function hotel_sorriso_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'is-homepage';
	}
	if ( is_page_template( 'page-templates/template-offerta.php' ) ) {
		$classes[] = 'is-offerta';
	}
	return $classes;
}
add_filter( 'body_class', 'hotel_sorriso_body_classes' );

/**
 * Disable Gutenberg block editor CSS on frontend (keep it lightweight)
 */
function hotel_sorriso_dequeue_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'hotel_sorriso_dequeue_block_styles', 100 );

/**
 * Remove WordPress emoji scripts
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Clean up WordPress head
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/**
 * Custom excerpt length
 */
function hotel_sorriso_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'hotel_sorriso_excerpt_length' );

/**
 * Register widget areas
 */
function hotel_sorriso_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'hotel-sorriso' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Area widget nel footer', 'hotel-sorriso' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget__title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'hotel_sorriso_widgets_init' );

/**
 * Allow SVG uploads
 */
function hotel_sorriso_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'hotel_sorriso_mime_types' );
