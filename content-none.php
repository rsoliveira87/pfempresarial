<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section class="no-results not-found">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404-image.png" class="img-responsive align-center" alt="Página 404">
	<header class="page-header text-center">
		<h1 class="page-title"><?php _e( 'Desculpe, mas a página que você está procurando não existe!', 'pfempresarial' ); ?></h1>
	</header><!-- .page-header -->
	<div class="text-center">
		<a href="<?php bloginfo( 'url' ); ?>" class="btn btn-primary btn-lg">
			<i class="fa fa-home"></i> Voltar para a Home
		</a>
	</div>

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pfempresarial' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<h2><?php _e( 'Nossas últimas publicações', 'pfempresarial' ); ?></h2>
			<div class="row">
				<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
					<h3>Notícias</h3>
					<ul>
						<?php 
							$args = array( 
								'post_type' => 'noticias', 
								'posts_per_page' => 5,
								'post_status' => 'publish'
							);
							$loop = new WP_Query( $args );
							while( $loop->have_posts() ) : $loop->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
								<?php
							endwhile;
						?>
					</ul>
				</div>
				<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
					<h3>Artigos</h3>
					<ul>
						<?php 
							$args = array( 
								'post_type' => 'artigos', 
								'posts_per_page' => 5,
								'post_status' => 'publish'
							);
							$loop = new WP_Query( $args );
							while( $loop->have_posts() ) : $loop->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
								<?php
							endwhile;
						?>
					</ul>
				</div>
			</div>
			<p><?php _e( 'Se ainda não encontrou o que deseja, faça uma busca através do formulário abaixo.', 'pfempresarial' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pfempresarial' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
