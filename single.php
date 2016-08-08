<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-9 col-xs-12 col-lg-9">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>

				</main><!-- .site-main -->
			</div>
		</div><!-- .content-area -->
		<div class="col-sm-3 col-md-3 col-xs-12 col-lg-3">
			<div id="sidebar-right">
				<?php dynamic_sidebar( 'sidebar-right' ); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
