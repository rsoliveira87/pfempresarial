<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<section class="error-404 not-found">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404-image.png" class="img-responsive align-center" alt="Página 404">
							<header class="page-header text-center">
								<h1 class="page-title"><?php _e( 'Desculpe, mas a página que você está procurando não existe!', 'pfempresarial' ); ?></h1>
							</header><!-- .page-header -->
							<div class="text-center">
								<a href="<?php bloginfo( 'url' ); ?>" class="btn btn-primary btn-lg">
									<i class="fa fa-home"></i> Voltar para a Home
								</a>
							</div>
						</section>
					</main>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<h2><?php _e( 'Nossas últimas publicações', 'pfempresarial' ); ?></h2>
			</div>			
			<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
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
			<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
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
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<p><?php _e( 'Se ainda não encontrou o que deseja, faça uma busca através do formulário abaixo.', 'pfempresarial' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
