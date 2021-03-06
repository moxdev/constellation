<?php
/**
 * Constellation Technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Constellation_Technologies
 */

if ( ! function_exists( 'constellation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function constellation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Constellation Technologies, use a find and replace
		 * to change 'constellation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'constellation', get_template_directory() . '/languages' );

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
		add_image_size('feature-img', 1800, 500, true);
		add_image_size('two-column-image', 300, 300, true);
		add_image_size('leadership-image', 300, 300, true);
		add_image_size('capabilities-icon', 255, 255, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'constellation' ),
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
add_action( 'after_setup_theme', 'constellation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function constellation_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'constellation_content_width', 640 );
}
add_action( 'after_setup_theme', 'constellation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function constellation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'constellation' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'constellation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'constellation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function constellation_scripts() {
	wp_enqueue_style( 'constellation-style', get_stylesheet_uri() );

	wp_enqueue_script( 'constellation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'constellation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('constellation-object-fit-library', get_template_directory_uri() . '/js/min/ofi.min.js', NULL, NULL, TRUE);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'constellation_scripts' );

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
		'page_title' 	=> 'Social Settings',
		'menu_title'	=> 'Social',
		'menu_slug'	  => 'social-settings',
		'post_id' 	  => 'social-settings',
		'capability'	=> 'edit_posts',
		'redirect'    => false
	));
}

/**
 * Add plus icons into registered "mobile-menu" if menu has childrem items
 */
add_filter( 'walker_nav_menu_start_el', 'wpse_add_menu_icon', 10, 4);
function wpse_add_menu_icon( $item_output, $item, $depth, $args ){
    if( 'main-menu' == $args->theme_location && $depth == 0 && in_array('menu-item-has-children', $item->classes ) ) {
        $item_output .='<span class="icon-plus">&#43;</span>';
    }
    return $item_output;
}

/**
 * ADD STYLES TO WYSIWYG
 */

// Insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Use 'mce_buttons' for button row #1, mce_buttons_3' for button row #3
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {
    $style_formats = array(
      array(
        'title' => 'Button', // Title to show in dropdown
        'inline' => 'a', // Element to add class to
        'classes' => 'btn' // CSS class to add
			),
			array(
					'title' => 'Column', // Title to show in dropdown
					'block' => 'div', // Element to add class to
					'classes' => 'wysiwig-column' // CSS class to add
			)
    );
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// Load editor styles for mce_buttons

function constellation_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'constellation_add_editor_styles' );

/**
 * Move Yoast to bottom
 */
function yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom');

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Home Hero Section.
 */
require get_template_directory() . '/inc/custom-hero-img.php';

/**
 * Capabilities Icon Section.
 */
require get_template_directory() . '/inc/capabilities-icon-section.php';

/**
 * Two Column Section.
 */
require get_template_directory() . '/inc/two-column-section.php';

/**
 * Leadship Section.
 */
require get_template_directory() . '/inc/leadership-section.php';

/**
 * Who We Are Section.
 */
require get_template_directory() . '/inc/who-we-are-section.php';


