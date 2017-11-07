<?php
/**
 * Daneh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Daneh
 */

if ( ! function_exists( 'daneh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function daneh_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Daneh, use a find and replace
	 * to change 'daneh' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'daneh', get_template_directory() . '/languages' );

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
	add_image_size( 'thumbs', 500, 500, true );
	add_image_size( 'collection', 500, 900, true );
	add_image_size( 'press', 370, 666, true );
	add_image_size( 'video', 600, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'daneh' ),
		'menu-2' => esc_html__( 'Footer', 'daneh' ),
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
		'width'       => 45,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'daneh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function daneh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'daneh_content_width', 1920 );
}
add_action( 'after_setup_theme', 'daneh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function daneh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'daneh' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'daneh' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'daneh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function daneh_anal() {
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109301372-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109301372-1');
</script>
<?php
}
add_action( 'wp_head', 'daneh_anal', 99);


function daneh_scripts() {
	wp_enqueue_style( 'daneh-style', get_stylesheet_uri() );
	wp_enqueue_style( 'featherlight-css', '//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.min.css' );
	wp_enqueue_style( 'featherlight-gallery-css', '//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.gallery.min.css' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'font-awesome', '//use.fontawesome.com/9abff3b772.js', '', '', true );
	wp_enqueue_script( 'featherlight-ks', '//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.min.js', array( 'jquery' ), '1.7.8', true );
	wp_enqueue_script( 'featherlight-gallery-js', '//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.gallery.min.js', array( 'jquery' ), '1.7.8', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', '', '', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', '', '', true );
	wp_enqueue_script( 'daneh-app', get_template_directory_uri() . '/assets/js/app.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'daneh_scripts' );

/**
 * Enqueue Tylekit.
 */
function daneh_typekit() {
?>
<script>
  (function(d) {
    var config = {
      kitId: 'afb4pre',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php
}
add_action( 'wp_head', 'daneh_typekit', 99 );

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
 * WooCommerce.
 */
// require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
