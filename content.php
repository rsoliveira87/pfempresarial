<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			// Post thumbnail.
			pfempresarial_post_thumbnail();
		?>
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		</header><!-- .entry-header -->
		<ul class="post-information">
			<li>
				<i class="fa fa-user"></i> 
				<?php the_author_posts_link(); ?>
			</li>
			<li>
				<i class="fa fa-calendar"></i> 
				<?php echo get_the_date( 'd/m/Y' ); ?>
			</li>
			<?php 
				if ( has_category() ) { ?>
					<li>
						<i class="fa fa-list"></i> 
						<?php the_category( ', ' ); ?>
					</li>
					<?php
				}
				if ( has_tag() ) { ?>
					<li> 
						<?php the_tags( '<i class="fa fa-tags"></i> ', ', ' ); ?>
					</li>
					<?php
				}
			?>					
		</ul>
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'pfempresarial' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pfempresarial' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pfempresarial' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
			<ul class="social-media-share">
				<li>
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="facebook" title="Compartilhe no Facebook" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" class="twitter" title="Compartilhe no Twitter" target="_blank">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo( 'name' ); ?>" class="linkedin" title="Compartilhe no Linkedin" target="_blank">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="http://plus.google.com/share?url=<?php the_permalink(); ?>" class="google-plus" title="Compartilhe no Google+" target="_blank">
						<i class="fa fa-google-plus"></i>
					</a>
				</li>
				<li>
					<a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>" class="whatsapp" title="Compartilhe no WhatsApp">
						<i class="fa fa-whatsapp"></i>
					</a>
				</li>
			</ul>
		</div><!-- .entry-content -->
		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
	</article><!-- #post-## -->
