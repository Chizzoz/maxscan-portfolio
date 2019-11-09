<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Logistico
 */
$logistico_classes = array(
	"logistico-default-hentry",
	"logistico-default-hentry",
	"lgtico-blog-wrap"
);
if ( !has_post_thumbnail() ) {
	$logistico_classes[] = "logistico-hentry-without-thumbnail";
} 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($logistico_classes); ?>>

	<div class="entry-media">
		<?php logistico_post_thumbnail(); ?>
		<?php if ( is_sticky() ) : ?>
			<span class="dashicons dashicons-admin-post"></span>
		<?php endif; ?>
	</div>
	
	<div class="lgtico-blog-content lgtico-blog-content-2">
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					logistico_posted_on();
					logistico_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif;

			if ( is_singular() ) :
				the_title( '<h1 class="entry-title lgtico-blog-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title lgtico-blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php if( !has_post_thumbnail() && is_sticky() ) :?>
				<span class="dashicons dashicons-admin-post"></span>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			if ( is_singular() ) :
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'logistico' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			else :
				echo '<p>' . get_the_excerpt() . '</p>';
			endif;
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'logistico' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php logistico_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
