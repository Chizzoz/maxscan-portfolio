<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Logistico
 */

?>

<?php
/**
 * logistico_content_end hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_content_end' );

/**
 * logistico_footer_before hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_footer_before' );

$logistico_footer_layout = get_theme_mod( 'logistico_footer_widget_option', 'show' );
if ( 'show' === $logistico_footer_layout ) :
	/**
	 * logistico_footer_section hook
	 *
	 * @since 1.0.0
	 */
	do_action( 'logistico_footer_section' );
endif;

/**
 * logistico_footer_bottom hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_footer_bottom' );

/**
 * logistico_footer_after hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_footer_after' );


/**
 * logistico_after_page
 * 
 * @since 1.0.0
 */
do_action( 'logistico_after_page' );


wp_footer(); ?>

</body>
</html>
