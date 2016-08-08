<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="team-info">	
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
				<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>								
				<h2><?php the_title();?></h2>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php get_footer();
