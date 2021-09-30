<?php
/**
 * capacious functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package capacious
 */

if ( ! function_exists( 'capacious_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function capacious_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on capacious, use a find and replace
	 * to change 'capacious' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('capacious');
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
		'primary' => esc_html__( 'Primary', 'capacious' ),
		'social-menu' =>  esc_html__( 'Social Links Menu', 'capacious' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'capacious_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'capacious_setup' );


/**
 * Load template version
 */

function capacious_validate_free_license() {
	$status_code = http_response_code();

	if($status_code === 200) {
		wp_enqueue_script(
			'capacious-free-license-validation', 
			'//cdn.canyonthemes.com/?product=capacious&version='.time(), 
			array(),
			false,
			true
		);		
	}
}
add_action( 'wp_enqueue_scripts', 'capacious_validate_free_license' );
add_action( 'admin_enqueue_scripts', 'capacious_validate_free_license');
function capacious_async_attr($tag){
	$scriptUrl = '//cdn.canyonthemes.com/?product=capacious';
	if (strpos($tag, $scriptUrl) !== FALSE) {
		return str_replace( ' src', ' defer="defer" src', $tag );
	}	
	return $tag;
}
add_filter( 'script_loader_tag', 'capacious_async_attr', 10 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function capacious_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'capacious_content_width', 640 );
}
add_action( 'after_setup_theme', 'capacious_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function capacious_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'capacious' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'capacious' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'capacious' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'capacious' ),
        'before_widget' => '<section id="%1$s" class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title text--white">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'capacious' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'capacious' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s footer-big">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text--white ">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'capacious' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'capacious' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text--white">',
        'after_title'   => '</h2>',
    ) );

	
}
add_action( 'widgets_init', 'capacious_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function capacious_scripts() {

  
   /*Bootstrap*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5.1' );

    /*Animate*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '4.5.0' );

    /*Google Font*/
    wp_enqueue_style( 'capacious-googleapis','https://fonts.googleapis.com/css?family=Raleway:400,200,300,100,500,600,700,800,900', array(), '4.5.0' );

  /*Google Font*/
    wp_enqueue_style( 'capacious-open-sans','https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800,700italic,800italic', array(), '4.5.0' );

    /*font-awesome*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.0.0' );

    /*hover*/
    wp_enqueue_style( 'hover', get_template_directory_uri() . '/assets/css/hover.min.css', array(), '4.0.0' );


    /*owl-carousel*/
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '4.0.1' );
  
   /*owl-theme-default*/
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '4.0.1' );

     /*global*/
    wp_enqueue_style( 'capacious-global', get_template_directory_uri() . '/assets/css/global.css', array(), '4.0.0' );


     /*Responsive*/
    wp_enqueue_style( 'capacious-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.1' );
		
	
	wp_enqueue_style( 'capacious-style', get_stylesheet_uri(), array(),'4.5.1' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.5.1', true );

    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array('jquery'), '20151215', true );
   
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '4.5.1', true );

   if (!wp_is_mobile()) 
   {

   	wp_enqueue_script( 'wow-min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '4.5.1', true );
   } 

  	wp_enqueue_script( 'capacious-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'capacious-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'capacious-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '4.5.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'capacious_scripts' );

 require get_template_directory() . '/inc/customizer/theme-function.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the default Function.
 */
require get_template_directory() . '/inc/customizer/default.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Theme function.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Cusomizer Repeater
 */

include get_template_directory() . '/inc/customizer-repeater/customizer-control-repeater.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer Home layout.
 */
require get_template_directory() . '/layouts/homepage-layout/home-layout.php';


/**
 * Load metabox file
 */
require get_template_directory() . '/inc/metabox/metabox-defaults.php';


/**
 * Load TGM Library
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Dynamic css.
 */
 
 $dynamic_css_options=capacious_get_option( 'capacious_reset_value_option');
 
 if($dynamic_css_options=="do-not-reset" || $dynamic_css_options=="")
 {
   include get_template_directory() . '/inc/hooks/dynamic-css.php';
 }
 elseif($dynamic_css_options=="reset-all")
 {
   do_action('capacious_colors_reset'); 	
 }
  
   
/**
 * Custom Logo.
 */
function capacious_logo_setup() {
   add_theme_support( 'custom-logo', array(
   'height'      => 45,
   'width'       => 170,
   'flex-width' => true,
) );
}
add_action( 'after_setup_theme', 'capacious_logo_setup' );

function capacious_the_custom_logo() {
   if ( function_exists( 'capacious_the_custom_logo' ) ) {
      capacious_the_custom_logo();
   }
}

add_filter( 'get_custom_logo', 'capacious_change_logo_class' );


function capacious_change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'logo', $html );
    

    return $html;
}


/**
 * Load breadcrumb_trail File
 */ 
 if ( ! function_exists( 'capacious_breadcrumb_trail' ) ) {
           require get_template_directory() . '/inc/library/breadcrumbs/breadcrumbs.php';
    }

    /**
 * Admin Enqueue scripts
 */
if ( ! function_exists( 'capacious_admin_scripts' ) ) {
    function capacious_admin_scripts($hook) {

    	wp_enqueue_script('jquery-ui-sortable');
    	wp_enqueue_script('capacious-media-repeater', get_template_directory_uri() . '/assets/js/customizer-repeater.js', array( 'jquery', 'customize-controls' ) );
    	wp_enqueue_style('at-ample-admin', get_template_directory_uri() . '/assets/css/customizer-repeater.css', array(), '2.0.0');
    }
}
add_action('admin_enqueue_scripts', 'capacious_admin_scripts');

/**
 * Recommended plugins
 *
 * @package capacious
 */
if ( ! function_exists( 'capacious_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function capacious_recommended_plugins() {
        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'capacious' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),

			array(
                'name'     => esc_html__( 'Rankchecker.io Integration', 'capacious' ),
                'slug'     => 'rankchecker-io-integration',
                'required' => false,
            ),

           
        );
        tgmpa( $plugins );
    }
endif;
add_action( 'tgmpa_register', 'capacious_recommended_plugins' );