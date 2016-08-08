<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'pfempresarial_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pfempresarial, use a find and replace
	 * to change 'pfempresarial' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pfempresarial', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pfempresarial' ),
		'secondary' => __( 'Secondary Menu', 'pfempresarial' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = pfempresarial_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pfempresarial_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', pfempresarial_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // pfempresarial_setup
add_action( 'after_setup_theme', 'pfempresarial_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pfempresarial_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'pfempresarial' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Footer 1', 'pfempresarial' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Footer 2', 'pfempresarial' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Footer 3', 'pfempresarial' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Footer 4', 'pfempresarial' ),
		'id'            => 'footer-sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'pfempresarial_widgets_init' );

if ( ! function_exists( 'pfempresarial_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function pfempresarial_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'pfempresarial' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'pfempresarial' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'pfempresarial' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'pfempresarial' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function pfempresarial_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'pfempresarial_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'pfempresarial-fonts', pfempresarial_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'pfempresarial-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'pfempresarial-ie', get_template_directory_uri() . '/css/ie.css', array( 'pfempresarial-style' ), '20141010' );
	wp_style_add_data( 'pfempresarial-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'pfempresarial-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'pfempresarial-style' ), '20141010' );
	wp_style_add_data( 'pfempresarial-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'pfempresarial-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'pfempresarial-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'pfempresarial-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'pfempresarial-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'pfempresarial' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'pfempresarial' ) . '</span>',
	) );

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '20160726', true );	

	// Bootstrap CSS
	wp_enqueue_style( 'boostrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array( 'pfempresarial-style' ) );

	// My script
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '20160726', true );

	// Font Awesome
	wp_enqueue_style( 'fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array( 'pfempresarial-style' ) );
}
add_action( 'wp_enqueue_scripts', 'pfempresarial_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function pfempresarial_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'pfempresarial-style', $css );
}
add_action( 'wp_enqueue_scripts', 'pfempresarial_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function pfempresarial_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'pfempresarial_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function pfempresarial_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'pfempresarial_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

add_action( 'init', 'pfempresarial_create_cpt_team' );

function pfempresarial_create_cpt_team() {
    $labels = array(
        'name' => __( 'Equipe' ),
        'singular_name' => __( 'Equipe' ),
        'menu_name' => __( 'Equipe' ),
        'all_items' => __( 'Todos Membros' ),
        'view_item' => __( 'Ver Membro' ),
        'add_new_item' => __( 'Adicionar Novo Membro' ),
        'add_new' => __( 'Adicionar Novo Membro' ),
        'edit_item' => __( 'Editar Membro' ),
        'update_item' => __( 'Atualizar Membro' ),
        'search_items' => __( 'Pesquisar Membro' ),
        'not_found' => __( 'Não Encontrado' )
    );
     
    $args = array(
        'label' => __( 'Equipe' ),
        'description' => __( 'Equipe da Aleah Brasil' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => 'team',
        'rewrite' => array(
            'slug' => 'team',
            'with_front' => true
        ),
        'capability_type' => 'post',        
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups'
    ); 
    
    register_post_type( 'team', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'pfempresarial_create_cpt_areas' );

function pfempresarial_create_cpt_areas() {
    $labels = array(
        'name' => __( 'Áreas' ),
        'singular_name' => __( 'Área' ),
        'menu_name' => __( 'Áreas de atuação' ),
        'all_items' => __( 'Todas as Áreas' ),
        'view_item' => __( 'Ver Área' ),
        'add_new_item' => __( 'Adicionar Nova Área' ),
        'add_new' => __( 'Adicionar Nova' ),
        'edit_item' => __( 'Editar Área' ),
        'update_item' => __( 'Atualizar Área' ),
        'search_items' => __( 'Pesquisar Área' ),
        'not_found' => __( 'Não Encontrado' )
    );
     
    $args = array(
        'label' => __( 'Áreas' ),
        'description' => __( 'Áreas de atuação da Aleah Brasil' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'author' ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => 'area',
        'rewrite' => array(
            'slug' => 'area',
            'with_front' => true
        ),
        'capability_type' => 'post',        
        'menu_position' => null,
        'menu_icon' => 'dashicons-hammer'
    ); 
    
    register_post_type( 'areas', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'pfempresarial_create_cpt_news' );

function pfempresarial_create_cpt_news() {
    $labels = array(
        'name' => __( 'Notícias' ),
        'singular_name' => __( 'Notícia' ),
        'menu_name' => __( 'Notícias' ),
        'all_items' => __( 'Todas as Notícias' ),
        'view_item' => __( 'Ver Notícia' ),
        'add_new_item' => __( 'Adicionar Nova Notícia' ),
        'add_new' => __( 'Adicionar Notícia' ),
        'edit_item' => __( 'Editar Notícia' ),
        'update_item' => __( 'Atualizar Notícia' ),
        'search_items' => __( 'Pesquisar Notícia' ),
        'not_found' => __( 'Não Encontrado' )
    );
     
    $args = array(
        'label' => __( 'Notícias' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => 'noticia',
        'rewrite' => array(
            'slug' => 'noticia',
            'with_front' => true
        ),
        'capability_type' => 'post',        
        'menu_position' => null,
        'menu_icon' => 'dashicons-megaphone'
    ); 
    
    register_post_type( 'noticias', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'pfempresarial_create_taxonomy_news' );

function pfempresarial_create_taxonomy_news() {
	register_taxonomy( 'categoria-noticia', array( 'noticias' ), array(
			'hierarchical' => true,
			'label' => __( 'Categorias' ),
			'show_ui' => true,
			'show_in_tag_cloud' => true,
			'query_var' => true,
			'rewrite' => true
		) 
	);
}

add_action( 'init', 'pfempresarial_create_cpt_articles' );

function pfempresarial_create_cpt_articles() {
    $labels = array(
        'name' => __( 'Artigos' ),
        'singular_name' => __( 'Artigo' ),
        'menu_name' => __( 'Artigos' ),
        'all_items' => __( 'Todas os Artigos' ),
        'view_item' => __( 'Ver Artigo' ),
        'add_new_item' => __( 'Adicionar Novo Artigo' ),
        'add_new' => __( 'Adicionar Artigo' ),
        'edit_item' => __( 'Editar Artigo' ),
        'update_item' => __( 'Atualizar Artigo' ),
        'search_items' => __( 'Pesquisar Artigo' ),
        'not_found' => __( 'Não Encontrado' )
    );
     
    $args = array(
        'label' => __( 'Artigos' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => 'artigo',
        'rewrite' => array(
            'slug' => 'artigo',
            'with_front' => true
        ),
        'capability_type' => 'post',        
        'menu_position' => null,
        'menu_icon' => 'dashicons-media-text'
    ); 
    
    register_post_type( 'artigos', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'pfempresarial_create_taxonomy_articles' );

function pfempresarial_create_taxonomy_articles() {
	register_taxonomy( 'categoria-artigo', array( 'artigos' ), array(
			'hierarchical' => true,
			'label' => __( 'Categorias' ),
			'show_ui' => true,
			'show_in_tag_cloud' => true,
			'query_var' => true,
			'rewrite' => true
		) 
	);
}

add_action( 'init', 'pfempresarial_create_cpt_testimonials' );

function pfempresarial_create_cpt_testimonials() {
    $labels = array(
        'name' => __( 'Depoimentos' ),
        'singular_name' => __( 'Depoimento' ),
        'menu_name' => __( 'Depoimentos' ),
        'all_items' => __( 'Todos Depoimentos' ),
        'view_item' => __( 'Ver Depoimento' ),
        'add_new_item' => __( 'Adicionar Novo Depoimento' ),
        'add_new' => __( 'Adicionar Novo' ),
        'edit_item' => __( 'Editar Depoimento' ),
        'update_item' => __( 'Atualizar Depoimento' ),
        'search_items' => __( 'Pesquisar Depoimento' ),
        'not_found' => __( 'Não Encontrado' )
    );
     
    $args = array(
        'label' => __( 'Depoimentos' ),
        'description' => __( 'Depoimentos dos clientes do Plano Funerário Empresarial' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => 'depoimento',
        'rewrite' => array(
            'slug' => 'depoimento',
            'with_front' => true
        ),
        'capability_type' => 'post',        
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-quote'
    ); 
    
    register_post_type( 'depoimentos', $args );
    flush_rewrite_rules();
}

add_action( 'add_meta_boxes', 'pfempresarial_create_meta_box_testimonials' );

function pfempresarial_create_meta_box_testimonials() {
	add_meta_box( 'testimonials-meta-box', __( 'Outras Informações', 'pfempresarial' ), 'display_meta_box_testimonials', 'depoimentos', 'side', 'low' );
}

function display_meta_box_testimonials( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'testimonials_nonce' );

	$name_company = get_post_meta( $post->ID, '_name_company', true );
	$site_company = get_post_meta( $post->ID, '_site_company', true );

	echo '<div class="inside">';
	echo '<p>';
	echo '<label for="name_company">Nome da Empresa</label>';
	echo '<input type="text" name="name_company" id="name_company" value="' . $name_company . '">';
	echo '</p>';
	echo '<p>';
	echo '<label for="site_company">Site da Empresa (com http ou https)</label>';
	echo '<input type="text" name="site_company" id="site_company" value="' . $site_company . '">';
	echo '</p>';
	echo '</div>';
}

add_action( 'save_post_depoimentos', 'save_meta_box_testimonials_data' );

function save_meta_box_testimonials_data( $post_id ) {
	if( !isset( $_POST['testimonials_nonce'] ) || !wp_verify_nonce( $_POST['testimonials_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	if ( isset( $_REQUEST['name_company'] ) ) {
		update_post_meta( $post_id, '_name_company', sanitize_text_field( $_POST['name_company'] ) );
	}

	if ( isset( $_REQUEST['site_company'] ) ) {
		update_post_meta( $post_id, '_site_company', sanitize_text_field( $_POST['site_company'] ) );
	}
}
