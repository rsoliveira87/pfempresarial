<?php
/**
 * Twenty Fifteen Customizer functionality
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function pfempresarial_remove_customizer_sections() {
	global $wp_customize;
    
    $wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('background_color');
    $wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'pfempresarial_remove_customizer_sections', 20 );

function pfempresarial_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/* Default Settings */
	$wp_customize->add_setting( '_primary_color_scheme', array(
		'default' => '#1B374C',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_primary_color_scheme', array(
		'priority' => 1,
		'section' => 'colors',
		'label' => 'Cor primária do tema',
		'description' => __( 'Cor primária do tema' )
	) ) );

	$wp_customize->add_setting( '_secondary_color_scheme', array(
		'default' => '#ff6600',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_secondary_color_scheme', array(
		'priority' => 2,
		'section' => 'colors',
		'label' => 'Cor secundária do tema',
		'description' => __( 'Cor primária do tema' )
	) ) );

	$wp_customize->add_setting( 'google_analytics_code', array(
		'default'           => 'UA-69987472-1' ,
		'sanitize_callback' => 'pfempresarial_lite_sanitize_textarea',
	) );
    $wp_customize->add_control('google_analytics_code', array(
        'priority'          => 1,
		'section'           => 'title_tagline',
		'label'             => 'Código do Google Analytics',
        'description'       => 'Pegue o código no google analytics ou use o padrão que é o código do PFB', 
	));
}
add_action( 'customize_register', 'pfempresarial_customize_register', 11 );

function pfempresarial_customize_all_panels( $wp_customize ) {
	// Create Panel Home Page Options
	$wp_customize->add_panel( 'homepage_panel', array(
		'title' => 'Dados da Home Page',
		'priority' => 1,
		'active_callback' => 'is_front_page'
	) );
	// Sections Home Page
	$wp_customize->add_section( '_header_texto_chamada_section', array(
		'title' => 'Textos de Chamada',
		'priority' => 1,
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_header_img_bg', array(
		'title' => 'Imagem de plano de fundo',
		'priority' => 2,
		'panel' => 'homepage_panel',
		'description' => __( 'Faça o upload da imagem de plano de fundo' ) 
	) );

	$wp_customize->add_section( '_header_btn_section', array(
		'title' => 'Botão da Home',
		'priority' => 3,
		'panel' => 'homepage_panel',
		'description' => __( 'Texto e link de direcionamento do botão abaixo dos textos de chamada' ) 
	) );

	$wp_customize->add_section( '_escritorio_section', array(
		'title' => 'Escritório',
		'priority' => 4,
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_equipe_section', array(
		'title' => 'Equipe',
		'priority' => 5,
		'description' => __( 'Cadastre os membros da equipe no menu Equipe do painel de controle' ),
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_areas_atuacao_section', array(
		'title' => 'Áreas de Atuação',
		'priority' => 6,
		'description' => __( 'Cadastre as áreas no menu Áreas de atuação do painel de controle' ),
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_publicacoes_section', array(
		'title' => 'Publicações',
		'priority' => 7,
		'description' => __( 'Publique os artigos e notícias nos respectivos menus do painel de controle' ),
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_depoimentos_section', array(
		'title' => 'Depoimentos',
		'priority' => 8,
		'panel' => 'homepage_panel'
	) );

	$wp_customize->add_section( '_contato_section', array(
		'title' => 'Contato',
		'priority' => 9,
		'panel' => 'homepage_panel'
	) );

}
add_action( 'customize_register', 'pfempresarial_customize_all_panels');

function pfempresarial_customize_home_page( $wp_customize ) {
	$wp_customize->add_setting( '_homepage_text_1', array(
		'default' => 'A partir de R$XX,XX mensais!',
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_homepage_text_1', array(
		'section' => '_header_texto_chamada_section',
		'label' => 'Linha 1'
	) );

	$wp_customize->add_setting( '_homepage_text_2', array(
		'default' => 'Plano Funerário Empresarial',
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_homepage_text_2', array(
		'section' => '_header_texto_chamada_section',
		'label' => 'Linha 2'
	) );

	$wp_customize->add_setting( '_homepage_text_3', array(
		'default' => 'Coberturas para todo o Brasil',
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_homepage_text_3', array(
		'section' => '_header_texto_chamada_section',
		'label' => 'Linha 3'
	) );

	$wp_customize->add_setting( '_homepage_text_4', array(
		'default' => 'Lorem Ipsum',
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_homepage_text_4', array(
		'section' => '_header_texto_chamada_section',
		'label' => 'Linha 4'
	) );

	$wp_customize->add_setting( '_homepage_button_text', array(
		'default' => 'Assista ao Vídeo',
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_homepage_button_text', array(
		'section' => '_header_btn_section',
		'label' => 'Texto do botão'
	) );

	$wp_customize->add_setting( '_homepage_button_link', array(
		'default' => 'https://www.youtube.com/embed/9gL2LUPyHLI?autoplay=1&rel=0',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( '_homepage_button_link', array(
		'section' => '_header_btn_section',
		'label' => 'Link do botão (com http ou https)'
	) );

	$wp_customize->add_setting( '_header_bg_image', array(
		'default' => get_template_directory_uri().'/assets/img/home/coaching-corporativo.jpg',
		'section' => '_header_img_bg',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '_header_bg_image', array(
		'section' => '_header_img_bg',
		'label' => 'Imagem de plano de fundo',
		'description' => __( 'Dimensões recomendadas 1600x1200px' )
	) ) );
}
add_action( 'customize_register', 'pfempresarial_customize_home_page');

function pfempresarial_customize_section_escritorio( $wp_customize ) {
	$wp_customize->add_setting( '_escritorio_ativar_section', array(
		'default' => 'ativar',
		'sanitize_callback' => 'pfempresarial_sanitize_on_off'
	) );
	$wp_customize->add_control( '_escritorio_ativar_section', array(
		'type' => 'radio',
		'section' => '_escritorio_section',
		'label' => 'Ativar/Desativar Seção',
		'description' => __( 'Ativa ou desativa a seção Escritório na Home. Se desativar, lembre-se de também retirar o link no menu' ),
		'choices' => array(
			'ativar' => 'ATIVAR',
			'desativar' => 'DESATIVAR'
		),
	) );

	$wp_customize->add_setting( '_section_escritorio_title', array(
		'default' => __( 'NOSSO ESCRITÓRIO' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_escritorio_title', array(
		'section' => '_escritorio_section',
		'label' => 'Título da Seção'
	) );

	$wp_customize->add_setting( '_presentation_title', array(
		'default' => __( 'APRESENTAÇÃO' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_presentation_title', array(
		'section' => '_escritorio_section',
		'label' => 'Título da apresentação'
	) );

	$wp_customize->add_setting( '_presentation_content', array(
		'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_presentation_content', array(
		'type' => 'textarea',
		'description' => 'Tecle ENTER uma vez para quebra de linha, duas vezes para parágrafo',
		'section' => '_escritorio_section',
		'label' => 'Texto da apresentação'
	) );
}
add_action( 'customize_register', 'pfempresarial_customize_section_escritorio');

function pfempresarial_customize_section_equipe( $wp_customize ) {
	$wp_customize->add_setting( '_equipe_ativar_section', array(
		'default' => 'ativar',
		'sanitize_callback' => 'pfempresarial_sanitize_on_off'
	) );
	$wp_customize->add_control( '_equipe_ativar_section', array(
		'type' => 'radio',
		'section' => '_equipe_section',
		'label' => 'Ativar/Desativar Seção',
		'description' => __( 'Ativa ou desativa a seção Equipe na Home. Se desativar, lembre-se de também retirar o link no menu' ),
		'choices' => array(
			'ativar' => 'ATIVAR',
			'desativar' => 'DESATIVAR'
		),
	) );

	$wp_customize->add_setting( '_section_team_title', array(
		'default' => __( 'EQUIPE OPERACIONAL' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_team_title', array(
		'section' => '_equipe_section',
		'label' => 'Título da seção'
	) );
}
add_action( 'customize_register', 'pfempresarial_customize_section_equipe');

function pfempresarial_customize_section_areas_atuacao( $wp_customize ) {
	$wp_customize->add_setting( '_atuacao_ativar_section', array(
		'default' => 'ativar',
		'sanitize_callback' => 'pfempresarial_sanitize_on_off'
	) );
	$wp_customize->add_control( '_atuacao_ativar_section', array(
		'type' => 'radio',
		'section' => '_areas_atuacao_section',
		'label' => 'Ativar/Desativar Seção',
		'description' => __( 'Ativa ou desativa a seção Atuação na Home. Se desativar, lembre-se de também retirar o link no menu' ),
		'choices' => array(
			'ativar' => 'ATIVAR',
			'desativar' => 'DESATIVAR'
		),
	) );

	$wp_customize->add_setting( '_section_atuacao_title', array(
		'default' => __( 'NOSSA ATUAÇÃO' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_atuacao_title', array(
		'section' => '_areas_atuacao_section',
		'label' => 'Título da seção'
	) );

	$wp_customize->add_setting( '_activities_area', array(
		'default' => __( 'Áreas' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_activities_area', array(
		'section' => '_areas_atuacao_section',
		'label' => 'Subtítulo'
	) );
}
add_action( 'customize_register', 'pfempresarial_customize_section_areas_atuacao');

function pfempresarial_customize_section_publicacoes( $wp_customize ) {
	$wp_customize->add_setting( '_publicacoes_ativar_section', array(
		'default' => 'ativar',
		'sanitize_callback' => 'pfempresarial_sanitize_on_off'
	) );
	$wp_customize->add_control( '_publicacoes_ativar_section', array(
		'type' => 'radio',
		'section' => '_publicacoes_section',
		'label' => 'Ativar/Desativar Seção',
		'description' => __( 'Ativa ou desativa a seção Publicações na Home. Se desativar, lembre-se de também retirar o link no menu' ),
		'choices' => array(
			'ativar' => 'ATIVAR',
			'desativar' => 'DESATIVAR'
		),
	) );

	$wp_customize->add_setting( '_section_publicacoes_title', array(
		'default' => __( 'NOSSAS PUBLICAÇÕES' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_publicacoes_title', array(
		'section' => '_publicacoes_section',
		'label' => 'Título da seção'
	) );

	$wp_customize->add_setting( '_section_publicacoes_tab1', array(
		'default' => __( 'NOTÍCIAS' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_publicacoes_tab1', array(
		'section' => '_publicacoes_section',
		'label' => 'Texto da primeira aba'
	) );

	$wp_customize->add_setting( '_section_publicacoes_tab2', array(
		'default' => __( 'ARTIGOS' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_publicacoes_tab2', array(
		'section' => '_publicacoes_section',
		'label' => 'Texto da segunda aba'
	) );

	$wp_customize->add_setting( '_section_publicacoes_tab3', array(
		'default' => __( 'NEWSLETTERS' ),
		'sanitize_callback' => 'pfempresarial_sanitize_textarea'
	) );
	$wp_customize->add_control( '_section_publicacoes_tab3', array(
		'section' => '_publicacoes_section',
		'label' => 'Texto da terceira aba'
	) );
}
add_action( 'customize_register', 'pfempresarial_customize_section_publicacoes');

// Sanitizers
function pfempresarial_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function pfempresarial_sanitize_on_off( $input ) {
	$valid = array(
		'ativar' => 'ATIVAR',
		'desativar'=> 'DESATIVAR',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Twenty Fifteen 1.5
 * @see pfempresarial_customize_register()
 *
 * @return void
 */
function pfempresarial_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Fifteen 1.5
 * @see pfempresarial_customize_register()
 *
 * @return void
 */
function pfempresarial_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Register color schemes for Twenty Fifteen.
 *
 * Can be filtered with {@see 'pfempresarial_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Sidebar Background Color.
 * 3. Box Background Color.
 * 4. Main Text and Link Color.
 * 5. Sidebar Text and Link Color.
 * 6. Meta Box Background Color.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return array An associative array of color scheme options.
 */
function pfempresarial_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with Twenty Fifteen.
	 *
	 * The default schemes include 'default', 'dark', 'yellow', 'pink', 'purple', and 'blue'.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, sidebar
	 *                              background, box background, main text and link, sidebar text and link,
	 *                              meta box background.
	 *     }
	 * }
	 */
	return apply_filters( 'pfempresarial_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'pfempresarial' ),
			'colors' => array(
				'#f1f1f1',
				'#ffffff',
				'#ffffff',
				'#333333',
				'#333333',
				'#f7f7f7',
			),
		),
		'dark'    => array(
			'label'  => __( 'Dark', 'pfempresarial' ),
			'colors' => array(
				'#111111',
				'#202020',
				'#202020',
				'#bebebe',
				'#bebebe',
				'#1b1b1b',
			),
		),
		'yellow'  => array(
			'label'  => __( 'Yellow', 'pfempresarial' ),
			'colors' => array(
				'#f4ca16',
				'#ffdf00',
				'#ffffff',
				'#111111',
				'#111111',
				'#f1f1f1',
			),
		),
		'pink'    => array(
			'label'  => __( 'Pink', 'pfempresarial' ),
			'colors' => array(
				'#ffe5d1',
				'#e53b51',
				'#ffffff',
				'#352712',
				'#ffffff',
				'#f1f1f1',
			),
		),
		'purple'  => array(
			'label'  => __( 'Purple', 'pfempresarial' ),
			'colors' => array(
				'#674970',
				'#2e2256',
				'#ffffff',
				'#2e2256',
				'#ffffff',
				'#f1f1f1',
			),
		),
		'blue'   => array(
			'label'  => __( 'Blue', 'pfempresarial' ),
			'colors' => array(
				'#e9f2f9',
				'#55c3dc',
				'#ffffff',
				'#22313f',
				'#ffffff',
				'#f1f1f1',
			),
		),
	) );
}

if ( ! function_exists( 'pfempresarial_get_color_scheme' ) ) :
/**
 * Get the current Twenty Fifteen color scheme.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return array An associative array of either the current or default color scheme hex values.
 */
function pfempresarial_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = pfempresarial_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // pfempresarial_get_color_scheme

if ( ! function_exists( 'pfempresarial_get_color_scheme_choices' ) ) :
/**
 * Returns an array of color scheme choices registered for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return array Array of color schemes.
 */
function pfempresarial_get_color_scheme_choices() {
	$color_schemes                = pfempresarial_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // pfempresarial_get_color_scheme_choices

if ( ! function_exists( 'pfempresarial_sanitize_color_scheme' ) ) :
/**
 * Sanitization callback for color schemes.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function pfempresarial_sanitize_color_scheme( $value ) {
	$color_schemes = pfempresarial_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		$value = 'default';
	}

	return $value;
}
endif; // pfempresarial_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function pfempresarial_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = pfempresarial_get_color_scheme();

	// Convert main and sidebar text hex color to rgba.
	$color_textcolor_rgb         = pfempresarial_hex2rgb( $color_scheme[3] );
	$color_sidebar_textcolor_rgb = pfempresarial_hex2rgb( $color_scheme[4] );
	$colors = array(
		'background_color'            => $color_scheme[0],
		'header_background_color'     => $color_scheme[1],
		'box_background_color'        => $color_scheme[2],
		'textcolor'                   => $color_scheme[3],
		'secondary_textcolor'         => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_textcolor_rgb ),
		'border_color'                => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_textcolor_rgb ),
		'border_focus_color'          => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_textcolor_rgb ),
		'sidebar_textcolor'           => $color_scheme[4],
		'sidebar_border_color'        => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_sidebar_textcolor_rgb ),
		'sidebar_border_focus_color'  => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_sidebar_textcolor_rgb ),
		'secondary_sidebar_textcolor' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_sidebar_textcolor_rgb ),
		'meta_box_background_color'   => $color_scheme[5],
	);

	$color_scheme_css = pfempresarial_get_color_scheme_css( $colors );

	wp_add_inline_style( 'pfempresarial-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'pfempresarial_color_scheme_css' );

/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', pfempresarial_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'pfempresarial_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_customize_preview_js() {
	wp_enqueue_script( 'pfempresarial-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'pfempresarial_customize_preview_js' );

/**
 * Returns CSS for the color schemes.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function pfempresarial_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'            => '',
		'header_background_color'     => '',
		'box_background_color'        => '',
		'textcolor'                   => '',
		'secondary_textcolor'         => '',
		'border_color'                => '',
		'border_focus_color'          => '',
		'sidebar_textcolor'           => '',
		'sidebar_border_color'        => '',
		'sidebar_border_focus_color'  => '',
		'secondary_sidebar_textcolor' => '',
		'meta_box_background_color'   => '',
	) );

	$css = <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}

	/* Sidebar Background Color */
	body:before,
	.site-header {
		background-color: {$colors['header_background_color']};
	}

	/* Box Background Color */
	.post-navigation,
	.pagination,
	.secondary,
	.site-footer,
	.hentry,
	.page-header,
	.page-content,
	.comments-area,
	.widecolumn {
		background-color: {$colors['box_background_color']};
	}

	/* Box Background Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus,
	.sticky-post {
		color: {$colors['box_background_color']};
	}

	/* Main Text Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.page-links a,
	.sticky-post {
		background-color: {$colors['textcolor']};
	}

	/* Main Text Color */
	body,
	blockquote cite,
	blockquote small,
	a,
	.dropdown-toggle:after,
	.image-navigation a:hover,
	.image-navigation a:focus,
	.comment-navigation a:hover,
	.comment-navigation a:focus,
	.widget-title,
	.entry-footer a:hover,
	.entry-footer a:focus,
	.comment-metadata a:hover,
	.comment-metadata a:focus,
	.pingback .edit-link a:hover,
	.pingback .edit-link a:focus,
	.comment-list .reply a:hover,
	.comment-list .reply a:focus,
	.site-info a:hover,
	.site-info a:focus {
		color: {$colors['textcolor']};
	}

	/* Main Text Color */
	.entry-content a,
	.entry-summary a,
	.page-content a,
	.comment-content a,
	.pingback .comment-body > a,
	.author-description a,
	.taxonomy-description a,
	.textwidget a,
	.entry-footer a:hover,
	.comment-metadata a:hover,
	.pingback .edit-link a:hover,
	.comment-list .reply a:hover,
	.site-info a:hover {
		border-color: {$colors['textcolor']};
	}

	/* Secondary Text Color */
	button:hover,
	button:focus,
	input[type="button"]:hover,
	input[type="button"]:focus,
	input[type="reset"]:hover,
	input[type="reset"]:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a:hover,
	.page-links a:focus {
		background-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		background-color: {$colors['secondary_textcolor']};
	}

	/* Secondary Text Color */
	blockquote,
	a:hover,
	a:focus,
	.main-navigation .menu-item-description,
	.post-navigation .meta-nav,
	.post-navigation a:hover .post-title,
	.post-navigation a:focus .post-title,
	.image-navigation,
	.image-navigation a,
	.comment-navigation,
	.comment-navigation a,
	.widget,
	.author-heading,
	.entry-footer,
	.entry-footer a,
	.taxonomy-description,
	.page-links > .page-links-title,
	.entry-caption,
	.comment-author,
	.comment-metadata,
	.comment-metadata a,
	.pingback .edit-link,
	.pingback .edit-link a,
	.post-password-form label,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.no-comments,
	.site-info,
	.site-info a,
	.wp-caption-text,
	.gallery-caption,
	.comment-list .reply a,
	.widecolumn label,
	.widecolumn .mu_register label {
		color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		color: {$colors['secondary_textcolor']};
	}

	/* Secondary Text Color */
	blockquote,
	.logged-in-as a:hover,
	.comment-author a:hover {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['secondary_textcolor']};
	}

	/* Border Color */
	hr,
	.dropdown-toggle:hover,
	.dropdown-toggle:focus {
		background-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		background-color: {$colors['border_color']};
	}

	/* Border Color */
	pre,
	abbr[title],
	table,
	th,
	td,
	input,
	textarea,
	.main-navigation ul,
	.main-navigation li,
	.post-navigation,
	.post-navigation div + div,
	.pagination,
	.comment-navigation,
	.widget li,
	.widget_categories .children,
	.widget_nav_menu .sub-menu,
	.widget_pages .children,
	.site-header,
	.site-footer,
	.hentry + .hentry,
	.author-info,
	.entry-content .page-links a,
	.page-links > span,
	.page-header,
	.comments-area,
	.comment-list + .comment-respond,
	.comment-list article,
	.comment-list .pingback,
	.comment-list .trackback,
	.comment-list .reply a,
	.no-comments {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['border_color']};
	}

	/* Border Focus Color */
	a:focus,
	button:focus,
	input:focus {
		outline-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		outline-color: {$colors['border_focus_color']};
	}

	input:focus,
	textarea:focus {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['border_focus_color']};
	}

	/* Sidebar Link Color */
	.secondary-toggle:before {
		color: {$colors['sidebar_textcolor']};
	}

	.site-title a,
	.site-description {
		color: {$colors['sidebar_textcolor']};
	}

	/* Sidebar Text Color */
	.site-title a:hover,
	.site-title a:focus {
		color: {$colors['secondary_sidebar_textcolor']};
	}

	/* Sidebar Border Color */
	.secondary-toggle {
		border-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['sidebar_border_color']};
	}

	/* Sidebar Border Focus Color */
	.secondary-toggle:hover,
	.secondary-toggle:focus {
		border-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['sidebar_border_focus_color']};
	}

	.site-title a {
		outline-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
		outline-color: {$colors['sidebar_border_focus_color']};
	}

	/* Meta Background Color */
	.entry-footer {
		background-color: {$colors['meta_box_background_color']};
	}

	@media screen and (min-width: 38.75em) {
		/* Main Text Color */
		.page-header {
			border-color: {$colors['textcolor']};
		}
	}

	@media screen and (min-width: 59.6875em) {
		/* Make sure its transparent on desktop */
		.site-header,
		.secondary {
			background-color: transparent;
		}

		/* Sidebar Background Color */
		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a,
		.widget_calendar tbody a:hover,
		.widget_calendar tbody a:focus {
			color: {$colors['header_background_color']};
		}

		/* Sidebar Link Color */
		.secondary a,
		.dropdown-toggle:after,
		.widget-title,
		.widget blockquote cite,
		.widget blockquote small {
			color: {$colors['sidebar_textcolor']};
		}

		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a {
			background-color: {$colors['sidebar_textcolor']};
		}

		.textwidget a {
			border-color: {$colors['sidebar_textcolor']};
		}

		/* Sidebar Text Color */
		.secondary a:hover,
		.secondary a:focus,
		.main-navigation .menu-item-description,
		.widget,
		.widget blockquote,
		.widget .wp-caption-text,
		.widget .gallery-caption {
			color: {$colors['secondary_sidebar_textcolor']};
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
			background-color: {$colors['secondary_sidebar_textcolor']};
		}

		.widget blockquote {
			border-color: {$colors['secondary_sidebar_textcolor']};
		}

		/* Sidebar Border Color */
		.main-navigation ul,
		.main-navigation li,
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
			border-color: {$colors['sidebar_border_color']};
		}

		.dropdown-toggle:hover,
		.dropdown-toggle:focus,
		.widget hr {
			background-color: {$colors['sidebar_border_color']};
		}

		.widget input:focus,
		.widget textarea:focus {
			border-color: {$colors['sidebar_border_focus_color']};
		}

		.sidebar a:focus,
		.dropdown-toggle:focus {
			outline-color: {$colors['sidebar_border_focus_color']};
		}
	}
CSS;

	return $css;
}

/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 * @since Twenty Fifteen 1.0
 */
function pfempresarial_color_scheme_css_template() {
	$colors = array(
		'background_color'            => '{{ data.background_color }}',
		'header_background_color'     => '{{ data.header_background_color }}',
		'box_background_color'        => '{{ data.box_background_color }}',
		'textcolor'                   => '{{ data.textcolor }}',
		'secondary_textcolor'         => '{{ data.secondary_textcolor }}',
		'border_color'                => '{{ data.border_color }}',
		'border_focus_color'          => '{{ data.border_focus_color }}',
		'sidebar_textcolor'           => '{{ data.sidebar_textcolor }}',
		'sidebar_border_color'        => '{{ data.sidebar_border_color }}',
		'sidebar_border_focus_color'  => '{{ data.sidebar_border_focus_color }}',
		'secondary_sidebar_textcolor' => '{{ data.secondary_sidebar_textcolor }}',
		'meta_box_background_color'   => '{{ data.meta_box_background_color }}',
	);
	?>
	<script type="text/html" id="tmpl-pfempresarial-color-scheme">
		<?php echo pfempresarial_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'pfempresarial_color_scheme_css_template' );
