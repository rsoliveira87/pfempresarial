<?php get_header(); ?>

<div class="container container-post">
	<div class="row">
		<div class="testimonials text-center">	
			<div class="col-sm-3 col-md-3 col-xs-12 col-lg-3">
				<div class="testimonial-author-photo">
					<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
				</div>
				<div class="testimonial-author-name">
					<h4>
						<?php the_title(); ?>
					</h4>
					<?php 
						$name_company = get_post_meta( get_the_ID(), '_name_company', true );
						$site_company = get_post_meta( get_the_ID(), '_site_company', true );
												
						if ( !empty( $name_company ) ) { 

							if ( !empty( $site_company ) ) {
								echo '<span class="company-name"><strong><a href="' . $site_company . '" target="_blank">';
								echo $name_company;
								echo '</a></strong></span>';
							} else {
								echo '<span class="company-name"><strong>' . $name_company . '</strong></span>';
							}

						}
					?>
				</div>
			</div>
			<div class="col-sm-9 col-md-9 col-xs-12 col-lg-9">										
				<div class="testimonial-content">
					<?php the_content(); ?>								
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 text-center">
				<a href="<?php bloginfo( 'url' ); ?>" class="btn btn-primary btn-lg">
					<i class="fa fa-home"></i> Voltar para a Home
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
