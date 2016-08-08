<?php if ( get_theme_mod( '_equipe_ativar_section', 'ativar' ) == 'ativar' ) { ?>
	<section id="equipe">
		<div class="container-fluid container-section">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
					<h2 class="section-title">
						<?php echo esc_attr(get_theme_mod('_section_team_title', 'EQUIPE OPERACIONAL')); ?>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
					<div class="team-tabs">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#socios" data-toggle="tab">
									SÓCIOS
								</a>
							</li>
							<li>
								<a href="#associados" data-toggle="tab">
									ASSOCIADOS
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div id="socios" class="tab-pane fade in active">
					<div id="accordion" class="team">
						<div class="row">
							<?php 
								$args = array(
									'post_type' => 'team',
									'posts_per_page' => 6,
									'orderby' => 'ID',
									'order' => 'ASC'
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div class="col-sm-3 col-md-3 col-xs-12 col-lg-2">
										<div class="team-content">
											<div class="team-photo">
												<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
											</div>
											<div class="team-name">
												<h3><?php the_title(); ?></h3>
											</div>
											<div class="team-more-info">
												<a href="#collapse-<?php echo the_ID(); ?>" data-toggle="collapse" data-parent="#accordion">
													<i class="fa fa-plus"></i> INFO
												</a>
											</div>
										</div>
									</div>
									<?php
								endwhile;
							?>
						</div>
						<div class="row">
							<?php
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div id="collapse-<?php echo the_ID(); ?>" class="collapse team-info">	
										<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">									
											<h2><?php the_title();?></h2>
										</div>
										<?php the_content(); ?>
									</div>
									<?php
								endwhile;
							?>
						</div>
					</div>
				</div>
				<div id="associados" class="tab-pane fade">
					<p>Teste aba associados</p>
				</div>
			</div>
		</div>
	</section>
<?php }
