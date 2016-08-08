<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( '1 comentário em &ldquo;%2$s&rdquo;', '%1$s comentários em &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'pfempresarial' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php pfempresarial_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php pfempresarial_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'pfempresarial' ); ?></p>
	<?php endif; ?>

	<?php 
		$args = array(
			'comment_field' => '<div class="form-group">' .
								'<label for="comment">Comentário <span class="required">*</span></label>' .
								'<textarea id="comment" name="comment" class="form-control" aria-required="true" placeholder="Deixe seu comentário"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="form-group">' .
							'<label for="author">Nome <span class="required">*</span></label>' .
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
							'" class="form-control" placeholder="Digite seu nome"></div>',

				'email' => '<div class="form-group">' .
							'<label for="email">E-mail (não será publicado) <span class="required">*</span></label>' .
							'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .
							'" class="form-control" placeholder="Digite seu e-mail"></div>',

				'url' => '<div class="form-group">' .
						'<label for="url">Site</label>' .
						'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
						'" class="form-control" placeholder="Digite o endereço do seu site"></div>'
			) ),

			'submit_button' => '<input type="submit" id="submit" name="submit" class="btn btn-primary btn-lg" value="Publicar comentário">'
		);
		comment_form( $args );
	?>

</div><!-- .comments-area -->
