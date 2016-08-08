<?php if ( get_theme_mod( '_escritorio_ativar_section', 'ativar' ) == 'ativar' ) { ?>	
	<section id="escritorio">
		<div class="container-fluid container-section gray">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
					<h2 class="section-title">
						<?php echo esc_attr(get_theme_mod('_section_escritorio_title', 'NOSSO ESCRITÓRIO')); ?>
					</h2>
					<div class="section-space">
						<a href="#" class="alls">
							<span class="pointer"></span> RECONHECIMENTO
						</a>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
					<div class="presentation">
						<h3 class="presentation-title">
							<?php echo esc_attr(get_theme_mod('_presentation_title', 'APRESENTAÇÃO')); ?>
						</h3>
						<?php echo wpautop( wp_kses_post(get_theme_mod('_presentation_content', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.') ) ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }
