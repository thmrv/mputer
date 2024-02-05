<?php
/**
 * mputer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mputer
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
function mputer_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mputer, use a find and replace
		* to change 'mputer' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mputer', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'mputer' ),
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
			'mputer_custom_background_args',
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
add_action( 'after_setup_theme', 'mputer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mputer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mputer_content_width', 640 );
}
add_action( 'after_setup_theme', 'mputer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mputer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mputer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mputer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mputer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mputer_scripts() {
	wp_enqueue_style( 'mputer-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mputer-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mputer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mputer_scripts' );

function strings_type() {
	register_post_type('wpstring',
		array(
			'labels'      => array(
				'name'          => __('Strings', 'textdomain'),
				'singular_name' => __('string', 'textdomain'),
				'add_new'            => _x( 'Add New', 'item' ),
				'add_new_item'       => __( 'Add New Item' ),
				'edit_item'          => __( 'Edit item' ),
				'new_item'           => __( 'New item' ),
				'all_items'          => __( 'All item' ),
				'view_item'          => __( 'View item' ),
				'search_items'       => __( 'Search item' ),
				'not_found'          => __( 'No items found' ),
				'not_found_in_trash' => __( 'No items found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Тексты',
			),
			'args' => array(
				'rewrite' => true,
				'menu_icon' => '',
			),
				'public'      => true,
				'has_archive' => true,
		)
	);
}
add_action('init', 'strings_type');

function products_type() {
	register_post_type('wpproduct',
		array(
			'labels'      => array(
				'name'          => __('Products', 'textdomain'),
				'singular_name' => __('product', 'textdomain'),
				'add_new'            => _x( 'Add New', 'item' ),
				'add_new_item'       => __( 'Add New Item' ),
				'edit_item'          => __( 'Edit item' ),
				'new_item'           => __( 'New item' ),
				'all_items'          => __( 'All item' ),
				'view_item'          => __( 'View item' ),
				'search_items'       => __( 'Search item' ),
				'not_found'          => __( 'No items found' ),
				'not_found_in_trash' => __( 'No items found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Продукты'
			),
				'public'      => true,
				'has_archive' => true,
		)
	);
}
add_action('init', 'products_type');

function contacts_type() {
	register_post_type('wpcontact',
		array(
			'labels'      => array(
				'name'          => __('Contacts', 'textdomain'),
				'singular_name' => __('contact', 'textdomain'),
				'add_new'            => _x( 'Add New', 'contact' ),
				'add_new_item'       => __( 'Add New Contact' ),
				'edit_item'          => __( 'Edit item' ),
				'new_item'           => __( 'New item' ),
				'all_items'          => __( 'All contacts' ),
				'view_item'          => __( 'View item' ),
				'search_items'       => __( 'Search item' ),
				'not_found'          => __( 'No items found' ),
				'not_found_in_trash' => __( 'No items found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Контакты'
			),
				'public'      => true,
				'has_archive' => true,
		)
	);
}
add_action('init', 'contacts_type');

function solutions_type() {
	register_post_type('wpsolution',
		array(
			'labels'      => array(
				'name'          => __('Solutions', 'textdomain'),
				'singular_name' => __('solution', 'textdomain'),
				'add_new'            => _x( 'Add New', 'solution' ),
				'add_new_item'       => __( 'Add New Solution' ),
				'edit_item'          => __( 'Edit solution' ),
				'new_item'           => __( 'New solution' ),
				'all_items'          => __( 'All solutions' ),
				'view_item'          => __( 'View solution' ),
				'search_items'       => __( 'Search solution' ),
				'not_found'          => __( 'No items found' ),
				'not_found_in_trash' => __( 'No items found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Решения'
			),
				'public'      => true,
				'has_archive' => true,
		)
	);
}
add_action('init', 'solutions_type');

function training_type() {
	register_post_type('wptraining',
		array(
			'labels'      => array(
				'name'          => __('Training', 'textdomain'),
				'singular_name' => __('training', 'textdomain'),
				'add_new'            => _x( 'Add New', 'training' ),
				'add_new_item'       => __( 'Add New Item' ),
				'edit_item'          => __( 'Edit item' ),
				'new_item'           => __( 'New item' ),
				'all_items'          => __( 'All item' ),
				'view_item'          => __( 'View item' ),
				'search_items'       => __( 'Search item' ),
				'not_found'          => __( 'No items found' ),
				'not_found_in_trash' => __( 'No items found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Обучение'
			),
				'public'      => true,
				'has_archive' => true,
		)
	);
}
add_action('init', 'training_type');

function article_type() {
	register_post_type('wparticle',
		array(
			'labels'      => array(
				'name'          => __('Articles', 'textdomain'),
				'singular_name' => __('article', 'textdomain'),
				'add_new'            => _x( 'Add New', 'article' ),
				'add_new_item'       => __( 'Add New Article' ),
				'edit_item'          => __( 'Edit article' ),
				'new_item'           => __( 'New article' ),
				'all_items'          => __( 'All articles' ),
				'view_item'          => __( 'View article' ),
				'search_items'       => __( 'Search articles' ),
				'not_found'          => __( 'No articles found' ),
				'not_found_in_trash' => __( 'No articles found in the Trash' ), 
				'parent_item_colon'  => '’',
				'menu_name'          => 'Статьи'
			),
			'supports' => array('title', 'editor', 'thumbnail'),
				'public'      => true,
				'has_archive' => true,
				
		),
	);
}
add_action('init', 'article_type');

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

/**
 * Get a post object by its post name (slug).
 *
 * @param string $slug      The post name value.
 * @param string $post_type The post type to fetch from. Default: 'post'.
 *
 * @return \WP_Post|bool The post object if found, false if not.
 */
function get_post_by_slug( $slug = '', $post_type = 'post' ) {
    $cache = wp_cache_get( $post_type . '_by_slug_' . $slug );
    if ( $cache ) {
        return $cache;
    }

    $posts = get_posts(
        [
            'name'           => $slug,
            'post_type'      => $post_type,
            'posts_per_page' => 1,
            'post_status'    => 'publish',
        ]
    );

    if ( ! empty( $posts ) ) {
        wp_cache_set( $post_type . '_by_slug_' . $slug, $posts[0] );
        return $posts[0];
    }

    return false;
}

/**
 * Clear the post by slug cache for a given post id before the new name is saved
 * or the post is deleted from WordPress.
 *
 * @param int $post_id The WP post id.
 */
function delete_post_by_slug_cache( $post_id ) {
    $saved = get_post( $post_id );
    if ( $saved ) {
        // Strip the trashed status that is inserted before any usable hook.
        $post_name = str_replace( '__trashed', '', $saved->post_name );

        wp_cache_delete( $saved->post_type . '_by_slug_' . $post_name );
    }
}
add_action( 'pre_post_update', 'delete_post_by_slug_cache' );
add_action( 'delete_post', 'delete_post_by_slug_cache' );

function keyword_replace($string, $replacement) {
	return preg_replace('~(\\{[^}]+\\})~', $replacement, $string);
}

