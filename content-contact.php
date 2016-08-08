<section id="contato">
	<div class="container-fluid container-section">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<h2 class="section-title">
					<?php echo esc_attr(get_theme_mod('_section_contact_title', 'CONTATO')); ?>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
				<ul class="contact-info">
					<li>
						<i class="icon color1 fa fa-map-marker"></i>
						<strong>ENDEREÇO: <?php echo esc_attr(get_theme_mod('_contact_address', 'Av. Brigadeiro Faria Lima, 2639, cj. 10A')); ?></strong>
					</li>
					<li>
						<i class="icon color2 fa fa-phone"></i> 
						<strong>TELEFONE: <?php echo esc_attr(get_theme_mod('_contact_telphone', '(11) 2776-7416')); ?></strong>
					</li>
					<li>
						<i class="icon color3 fa fa-envelope"></i> 
						<strong>E-MAIL: <a href="mailto:<?php echo esc_attr(get_theme_mod('_contact_email', 'karina.odajima@aleah.com.br')); ?>"><?php echo esc_attr(get_theme_mod('_contact_email', 'karina.odajima@aleah.com.br')); ?></a></strong>
					</li>
					<li>
						<i class="icon color4 fa fa-globe"></i> 
						<strong>WEB: <a href="http://<?php echo esc_attr(get_theme_mod('_contact_website', 'www.planofunerariofamiliar.com.br')) ;?>" target="_blank"><?php echo esc_attr(get_theme_mod('_contact_website', 'www.planofunerariofamiliar.com.br')) ;?></a></strong>
					</li>
					<li>
						<i class="icon color5 fa fa-facebook"></i> 
						<strong>FACEBOOK: <a href="https://<?php echo esc_attr(get_theme_mod('_contact_facebook', 'www.facebook.com/planofunerariofamiliar/')) ;?>" target="_blank"><?php echo esc_attr(get_theme_mod('_contact_facebook', 'www.facebook.com/planofunerariofamiliar/')) ;?></a></strong>
					</li>
				</ul>
			</div>
			<div class="col-sm-6 col-md-6 col-xs-12 col-lg-6">
				<div class="form-contact">
					<?php echo do_shortcode( '[contact-form-7 id="77" title="Contato"]' ); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6J4HCdnHX6kE2Y2LC5Kj8Wwd-2s0FrJ4&callback=initMap" async defer></script>
            <div id="contactmap" class="location_map"></div>
		</div>
	</div>		
</section>