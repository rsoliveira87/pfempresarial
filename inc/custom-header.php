<?php
/**
 * Custom Header functionality for Twenty Fifteen
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses pfempresarial_header_style()
 */
function pfempresarial_custom_header_setup() {
	$color_scheme        = pfempresarial_get_color_scheme();
	$default_text_color  = trim( $color_scheme[4], '#' );

	/**
	 * Filter Twenty Fifteen custom-header support arguments.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'pfempresarial_custom_header_args', array(
		'default-text-color'     => $default_text_color,
		'width'                  => 954,
		'height'                 => 1300,
		'wp-head-callback'       => 'pfempresarial_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'pfempresarial_custom_header_setup' );

/**
 * Convert HEX to RGB.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function pfempresarial_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

if ( ! function_exists( 'pfempresarial_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see pfempresarial_custom_header_setup()
 */
function pfempresarial_header_style() { ?>
	
	<style type="text/css" id="pfempresarial-header-css">
	.header-wrapper {
		background-image: url(<?php echo esc_url( get_theme_mod( '_header_bg_image', get_template_directory_uri().'/assets/img/home/coaching-corporativo.jpg' ) ); ?>);
	}
	</style>
	<?php
}
endif; // pfempresarial_header_style

/**
 * Enqueues front-end CSS for the header background color.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function pfempresarial_header_background_color_css() {
	$color_scheme            = pfempresarial_get_color_scheme();
	$default_color           = $color_scheme[1];
	$header_background_color = get_theme_mod( 'header_background_color', $default_color );

	// Don't do anything if the current color is the default.
	if ( $header_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Header Background Color */
		body:before,
		.site-header {
			background-color: %1$s;
		}

		@media screen and (min-width: 59.6875em) {
			.site-header,
			.secondary {
				background-color: transparent;
			}

			.widget button,
			.widget input[type="button"],
			.widget input[type="reset"],
			.widget input[type="submit"],
			.widget_calendar tbody a,
			.widget_calendar tbody a:hover,
			.widget_calendar tbody a:focus {
				color: %1$s;
			}
		}
	';

	wp_add_inline_style( 'pfempresarial-style', sprintf( $css, $header_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'pfempresarial_header_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the sidebar text color.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_sidebar_text_color_css() {
	$color_scheme       = pfempresarial_get_color_scheme();
	$default_color      = $color_scheme[4];
	$sidebar_link_color = get_theme_mod( 'sidebar_textcolor', $default_color );

	// Don't do anything if the current color is the default.
	if ( $sidebar_link_color === $default_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	$sidebar_link_color_rgb     = pfempresarial_hex2rgb( $sidebar_link_color );
	$sidebar_text_color         = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $sidebar_link_color_rgb );
	$sidebar_border_color       = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $sidebar_link_color_rgb );
	$sidebar_border_focus_color = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $sidebar_link_color_rgb );

	$css = '
		/* Custom Sidebar Text Color */
		.site-title a,
		.site-description,
		.secondary-toggle:before {
			color: %1$s;
		}

		.site-title a:hover,
		.site-title a:focus {
			color: %1$s; /* Fallback for IE7 and IE8 */
			color: %2$s;
		}

		.secondary-toggle {
			border-color: %1$s; /* Fallback for IE7 and IE8 */
			border-color: %3$s;
		}

		.secondary-toggle:hover,
		.secondary-toggle:focus {
			border-color: %1$s; /* Fallback for IE7 and IE8 */
			border-color: %4$s;
		}

		.site-title a {
			outline-color: %1$s; /* Fallback for IE7 and IE8 */
			outline-color: %4$s;
		}

		@media screen and (min-width: 59.6875em) {
			.secondary a,
			.dropdown-toggle:after,
			.widget-title,
			.widget blockquote cite,
			.widget blockquote small {
				color: %1$s;
			}

			.widget button,
			.widget input[type="button"],
			.widget input[type="reset"],
			.widget input[type="submit"],
			.widget_calendar tbody a {
				background-color: %1$s;
			}

			.textwidget a {
				border-color: %1$s;
			}

			.secondary a:hover,
			.secondary a:focus,
			.main-navigation .menu-item-description,
			.widget,
			.widget blockquote,
			.widget .wp-caption-text,
			.widget .gallery-caption {
				color: %2$s;
			}

			.widget button:hover,
			.widget button:focus,
			.widget input[type="button"]:hover,
			.widget input[type="button"]:focus,
			.widget input[type="reset"]:hover,
			.widget input[type="reset"]:focus,
			.widget input[type="submit"]:hover,
			.widget input[type="submit"]:focus,
			.widget_calendar tbody a:hover,
			.widget_calendar tbody a:focus {
				background-color: %2$s;
			}

			.widget blockquote {
				border-color: %2$s;
			}

			.main-navigation ul,
			.main-navigation li,
			.secondary-toggle,
			.widget input,
			.widget textarea,
			.widget table,
			.widget th,
			.widget td,
			.widget pre,
			.widget li,
			.widget_categories .children,
			.widget_nav_menu .sub-menu,
			.widget_pages .children,
			.widget abbr[title] {
				border-color: %3$s;
			}

			.dropdown-toggle:hover,
			.dropdown-toggle:focus,
			.widget hr {
				background-color: %3$s;
			}

			.widget input:focus,
			.widget textarea:focus {
				border-color: %4$s;
			}

			.sidebar a:focus,
			.dropdown-toggle:focus {
				outline-color: %4$s;
			}
		}
	';

	wp_add_inline_style( 'pfempresarial-style', sprintf( $css, $sidebar_link_color, $sidebar_text_color, $sidebar_border_color, $sidebar_border_focus_color ) );
}
add_action( 'wp_enqueue_scripts', 'pfempresarial_sidebar_text_color_css', 11 );
