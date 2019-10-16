<?php
/**
 * SeaGameFootball functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SeaGameFootball
 */
// add_action( 'wp_enqueue_scripts', 'seagamefootball_theme_register_js');
// function seagamefootball_theme_register_js(){
// 	$js_Url = get_template_directory_uri() . '/js';

// 	wp_register_script( 'seagamefootball_theme_j', $js_Url . '/jquery.min.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_j');

// 	wp_register_script( 'seagamefootball_theme_jp', $js_Url . '/pool.min.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_jp');

// 	wp_register_script( 'seagamefootball_theme_jps', $js_Url . '/jquery-migrate.min.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_jps');
    
//     wp_register_script( 'seagamefootball_theme_bt', $js_Url . '/bootstrap.min.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_bt');
	
// 	wp_register_script( 'seagamefootball_theme_o', $js_Url . '/owl.carousel.min.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_o');

// 	wp_register_script( 'seagamefootball_theme_m', $js_Url . '/main.js', array(), '1.0');
// 	wp_enqueue_script('seagamefootball_theme_m');

	

// }
add_action( 'wp_enqueue_scripts', 'seagamefootball_theme_register_style');
function seagamefootball_theme_register_style(){
	$css_Url = get_template_directory_uri() . '/css';

	wp_register_style( 'seagamefootball_theme_bt', $css_Url . '/bootstrap.min.css', array(), '1.0');
	wp_enqueue_style('seagamefootball_theme_bt');
	
	wp_register_style( 'seagamefootball_theme_fa', $css_Url . '/font-awesome.min.css', array(), '1.0');
	wp_enqueue_style('seagamefootball_theme_fa');

	wp_register_style( 'seagamefootball_theme_owl', $css_Url . '/owl.carousel.css', array(), '1.0');
	wp_enqueue_style('seagamefootball_theme_owl');

	wp_register_style( 'seagamefootball_theme_owlt', $css_Url . '/owl.theme.default.css', array(), '1.0');
	wp_enqueue_style('seagamefootball_theme_owlt');

	wp_register_style( 'seagamefootball_theme_style', $css_Url . '/style.css', array(), '1.8');
	wp_enqueue_style('seagamefootball_theme_style');

}

if ( ! function_exists( 'seagamefootball_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function seagamefootball_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SeaGameFootball, use a find and replace
		 * to change 'seagamefootball' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'seagamefootball', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'seagamefootball' ),
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
		add_theme_support( 'custom-background', apply_filters( 'seagamefootball_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'seagamefootball_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seagamefootball_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'seagamefootball_content_width', 640 );
}
add_action( 'after_setup_theme', 'seagamefootball_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seagamefootball_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'seagamefootball' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'seagamefootball' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'seagamefootball_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seagamefootball_scripts() {
	wp_enqueue_style( 'seagamefootball-style', get_stylesheet_uri() );

	wp_enqueue_script( 'seagamefootball-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'seagamefootball-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seagamefootball_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
