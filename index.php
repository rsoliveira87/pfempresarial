<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="container-fluid header-wrapper">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6 text-center">
				<div class="homepage">
					<h1 class="homepage-text1">
						<?php echo esc_attr(get_theme_mod('_homepage_text_1', 'A partir de R$XX,XX mensais!')); ?>
					</h1>
					<h2 class="homepage-text2">
						<?php echo esc_attr(get_theme_mod('_homepage_text_2', 'Plano Funerário Empresarial')); ?>
					</h2>
					<h3>
						<?php echo esc_attr(get_theme_mod('_homepage_text_3', 'Coberturas para todo o Brasil')); ?>
					</h3>
					<h3>
						<?php echo esc_attr(get_theme_mod('_homepage_text_4', 'Lorem Ipsum')); ?>
					</h3>
					<a class="homepage-button" href="<?php echo esc_attr( get_theme_mod( '_homepage_button_link', 'https://www.youtube.com/embed/9gL2LUPyHLI?autoplay=1&rel=0' ) ); ?>">
						<?php echo esc_attr(get_theme_mod('_homepage_button_text', 'Assista ao Vídeo')); ?> 
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
				<div class="homepage-form">
					<?php echo do_shortcode('[contact-form-7 id="10" title="Interesse"]'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
	// content-escritorio.php
	get_template_part( 'content', 'escritorio' );

	// content-team.php
	get_template_part( 'content', 'team' );

	// content-activities.php
	get_template_part( 'content', 'activities' );

	// content-activities.php
	get_template_part( 'content', 'publications' );

	// content-testimonials.php
	get_template_part( 'content', 'testimonials' );

	// content-contact.php
	get_template_part( 'content', 'contact' );

	?>

<?php get_footer();
