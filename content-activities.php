<?php if ( get_theme_mod( '_atuacao_ativar_section', 'ativar' ) == 'ativar' ) { ?>
	<section id="atuacao">
		<div class="container-fluid container-section gray">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
					<h2 class="section-title">
						<?php echo esc_attr(get_theme_mod('_section_atuacao_title', 'NOSSA ATUAÇÃO')); ?>
					</h2>
				</div>
				<div class="activities-areas" id="accordion">
					<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
						<h3 class="subtitle"><?php echo esc_attr(get_theme_mod('_activities_area', 'Áreas')); ?></h3>
						<ul class="activities-list-areas">
							<?php 
								$args = array(
									'post_type' => 'areas',
									'orderby' => 'ID',
									'order' => 'ASC'
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<li>
										<a href="#collapse-<?php echo the_ID(); ?>" data-toggle="collapse" data-parent="#accordion">
											<?php the_title(); ?>
										</a>
									</li>
									<?php
								endwhile;
							?>
						</ul>
					</div>
					<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
						<?php 
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div id="collapse-<?php echo the_ID(); ?>" class="activities-box collapse">
									<div class="activities-box-heading">
										<h4>
											<?php the_title(); ?>
										</h4>
									</div>
									<?php the_content(); ?>
								</div>
								<?php
							endwhile;
						?>
					</div>				
				</div>
			</div>
		</div>
	</section>
<?php }
