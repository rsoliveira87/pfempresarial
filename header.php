<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<!-- Script Google Analytics -->
	<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo get_theme_mod('google_analytics_code', 'UA-69987472-1'); ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Script Google Analytics -->
</head>

<body <?php body_class(); ?>>
<div class="container-fluid header">
	<div class="row">
		<div class="col-sm-3 col-md-3 col-xs-8 col-lg-3 logo">
			<h3>
				<a href="<?php bloginfo( 'url' ); ?>">
					<strong>
						<?php bloginfo( 'name' ); ?>
					</strong>
				</a>
			</h3>
			<p>
				<?php bloginfo( 'description' ); ?>
			</p>
		</div>
		<div class="col-sm-8 col-md-8 col-xs-2 col-lg-8">
			<nav class="navbar pull-right">
				<div class="container-fluid">
					<div class="navbar-header">
						<button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<div class="top-nav-menu pull-left">
							<?php 
								if ( is_home() ) {
									$menu_class = 'nav-menu';
									$theme_location = 'primary';
								} else {
									$menu_class = 'secondary-menu';
									$theme_location = 'secondary';
								}
								wp_nav_menu( array(
									'theme_location' => $theme_location,
									'menu_class' => $menu_class
								) );
							?>
						</div>
					</div>
				</div>
			</nav>			
		</div>
		<div class="col-sm-1 col-md-1 col-xs-2 col-lg-1">
			<button type="button" class="button-search" id="active-search-form">
				<i class="fa fa-search"></i>
			</button>
			<div class="search-form hide">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>