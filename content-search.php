<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if ( has_post_thumbnail() ) { ?>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
					<div class="post">
						<div class="row">						
							<div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
								<?php pfempresarial_post_thumbnail(); ?>
							</div>
							<div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
								<header class="entry-header">
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								</header><!-- .entry-header -->

								<div class="entry-summary">
									<?php the_excerpt(); ?>
								</div><!-- .entry-summary -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		} else { ?>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
					<div class="post">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->
					</div>
				</div>
			</div>
			<?php
		}		 
	?>	

	<?php if ( 'post' == get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php pfempresarial_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'pfempresarial' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php edit_post_link( __( 'Edit', 'pfempresarial' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

	<?php endif; ?>

</article><!-- #post-## -->
