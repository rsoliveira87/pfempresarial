<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<div class="container-fluid footer">
		<div class="row">
			<div class="footer-widgets">
				<div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
					<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
					<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid copyright">
		<div class="row">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
					<div class="site-info">
						<a href="<?php bloginfo( 'url' ); ?>">
							<?php bloginfo( 'name' ); ?> 
						</a>
						- Todos os direitos reservados © 2016
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 text-right">
					Um projeto da <a href="http://www.aleah.com.br/" target="_blank">Aleah Brasil</a>
				</div>
			</footer>
		</div>
	</div>
	<a href="#" class="back-to-top" id="back-to-top" title="<?php echo __( 'Voltar ao topo' ); ?>">
		<i class="fa fa-chevron-up"></i>
	</a>

<?php wp_footer(); ?>

</body>
</html>
