<?php
/**
 * Yummy Gummy Opening functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Yummy_Gummy_Opening
 */

if ( ! function_exists( 'candyland_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function candyland_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Yummy Gummy Opening, use a find and replace
	 * to change 'candyland' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'candyland', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'candyland' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'candyland_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'candyland_setup' );



/**
 * Register custom fonts.
 */
function candyland_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro and PT Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$josefin_slab = _x( 'on', 'Josefin Slab font: on or off', 'candyland' );
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'candyland' );
	$bree_serif = _x( 'on', 'Bree Serif font: on or off', 'candyland' );
	$titan_one = _x( 'on', 'Titan+One font: on or off', 'candyland' );

	$font_families = array();

	if ( 'off' !== $josefin_slab ) {
		$font_families[] = 'Josefin+Slab:400,700';
	}

	if ( 'off' !== $merriweather  ) {
		$font_families[] = 'Merriweather:400,700';
	}

	if ( 'off' !== $bree_serif ) {
		$font_families[] = 'Bree+Serif';
	}

	if ( 'off' !== $titan_one) {
		$font_families[] = 'Titan+One';
	}

	if ( in_array( 'on', array($josefin_slab , $merriweather, $bree_serif, $titan_one) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function candyland_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'candyland-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'candyland_resource_hints', 10, 2 );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function candyland_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'candyland_content_width', 640 );
}
add_action( 'after_setup_theme', 'candyland_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function candyland_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'candyland' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'candyland' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'candyland_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function candyland_scripts() {
	wp_enqueue_style( 'candyland-fonts', 'https://fonts.googleapis.com/css?family=Bree+Serif|Chewy|Holtwood+One+SC|Josefin+Slab:400,700|Merriweather:400,700|Oswald|Titan+One' );

	wp_enqueue_style( 'candyland-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );

	wp_enqueue_style( 'candyland-style', get_stylesheet_uri() );

	wp_enqueue_style( 'candyland-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');

	wp_enqueue_script( 'candyland-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'candyland-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'candyland-stickynav', get_template_directory_uri() . '/js/stickynav.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'candyland-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'candyland_scripts' );


function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
