<section id="depoimentos">
	<div class="container-fluid container-section gray">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<h2 class="section-title">
					<?php echo esc_attr(get_theme_mod('_section_testimonials_title', 'DEPOIMENTOS')); ?>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<div id="carousel-example-generic" class="testimonials carousel slide text-center" data-ride="carousel">	
					<div class="carousel-inner" role="listbox">	
						<?php
							$args = array(
								'post_type' => 'depoimentos'
							);
							$loop = new WP_Query( $args );
							$count = 1;
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="item">
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
											<?php the_excerpt(); ?>								
										</div>
									</div>
								</div>
									
								<?php	
							endwhile;
						?>
					</div>	
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<i class="fa fa-chevron-left"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<i class="fa fa-chevron-right"></i>
					    <span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>