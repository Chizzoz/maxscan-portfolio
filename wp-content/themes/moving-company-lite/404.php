<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Moving Company Lite
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','moving-company-lite' ), esc_html__( 'Not Found', 'moving-company-lite' ) ) ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'moving-company-lite' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'moving-company-lite' ); ?></p>
			<div class="more-btn">
		        <a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Go Back', 'moving-company-lite' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go Back','moving-company-lite' );?></span></a>
		    </div>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>