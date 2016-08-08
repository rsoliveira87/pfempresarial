<?php if ( get_theme_mod( '_publicacoes_ativar_section', 'ativar' ) == 'ativar' ) { ?>
	<section id="publicacoes">
		<div class="container-fluid container-section">
			<div class="row">
				<div class="col-sm-8 col-md-8 col-xs-12 col-lg-8">
					<h2 class="section-title">
						<?php echo esc_attr(get_theme_mod('_section_publications_title', 'NOSSAS PUBLICAÇÕES')); ?>
					</h2>
				</div>
				<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
					<div class="search-publications pull-right">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
					<div class="publications-tabs">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#noticias" data-toggle="tab">
									<?php echo esc_attr( get_theme_mod( '_section_publicacoes_tab1', 'NOTÍCIAS' ) ); ?>
								</a>
							</li>
							<li>
								<a href="#artigos" data-toggle="tab">
									<?php echo esc_attr( get_theme_mod( '_section_publicacoes_tab2', 'ARTIGOS' ) ); ?>
								</a>
							</li>
							<li>
								<a href="#news" data-toggle="tab">
									<?php echo esc_attr( get_theme_mod( '_section_publicacoes_tab3', 'NEWSLETTERS' ) ); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div id="noticias" class="tab-pane fade in active">
					<div class="row">
						<?php
							$args = array(
								'post_type' => 'noticias',
								'posts_per_page' => 6
							);
							$loop = new WP_Query( $args );
							$count = 1;
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
									<div class="article">
										<div class="row">
											<div class="col-sm-4 col-md-3 col-lg-3 col-xs-3">
												<span class="article-month">
													<?php echo get_the_date( 'M' ); // month 3 letters ?> 
												</span>
											</div>
											<div class="col-sm-8 col-md-9 col-lg-9 col-xs-9">
												<h3 class="article-title">
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php the_title(); ?>
													</a>
												</h3>
												<span class="article-date">
													<i class="fa fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); // date 99/99/9999 ?>
												</span>
												<a href="<?php the_permalink(); ?>" class="pull-right">
													<i class="fa fa-plus"></i> Ver notícia
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php
								if ( $count == 3 ) {
									echo '</div>'; // close div row
									echo '<div class="row">'; // open new class row
									$count = 1;
								} else {
									$count++;
								}
							endwhile;
						?>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
							<a href="#" class="alls">
								<span class="pointer"></span> VER TODAS AS NOTÍCIAS
							</a>
						</div>
					</div>
				</div>
				<div id="artigos" class="tab-pane fade">
					<div class="row">
						<?php
							$args = array(
								'post_type' => 'artigos',
								'posts_per_page' => 6
							);
							$loop = new WP_Query( $args );
							$count = 1;
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
									<div class="article">
										<div class="row">
											<div class="col-sm-4 col-md-3 col-lg-3 col-xs-3">
												<span class="article-month">
													<?php echo get_the_date( 'M' ); // month 3 letters ?>
												</span>
											</div>
											<div class="col-sm-8 col-md-9 col-lg-9 col-xs-9">
												<h3 class="article-title">
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php the_title(); ?>
													</a>
												</h3>
												<span class="article-date">
													<i class="fa fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); // date 99/99/9999 ?>
												</span>
												<a href="<?php the_permalink(); ?>" class="pull-right">
													<i class="fa fa-plus"></i> Ver artigo
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php
								if ( $count == 3 ) {
									echo '</div>'; // close div row
									echo '<div class="row">'; // open new class row
									$count = 1;
								} else {
									$count++;
								}
							endwhile;
						?>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
							<a href="#" class="alls">
								<span class="pointer"></span> VER TODOS OS ARTIGOS
							</a>
						</div>
					</div>
				</div>
				<div id="news" class="tab-pane fade">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
							<div class="form-newsletter">
								<h4>RECEBA NOSSAS PUBLICAÇÕES EM SEU E-MAIL GRATUITAMENTE!</h4>
								<form class="form-inline">
									<div class="form-group">
										<label for="name">
											Nome <span class="required">*</span>
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input type="text" class="form-control" id="name" placeholder="Digite seu nome">
										</div>								
									</div>
									<div class="form-group">
										<label for="email">
											E-mail <span class="required">*</span>
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</div>
											<input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-send"></i> ENVIAR
									</button>
								</form>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }
