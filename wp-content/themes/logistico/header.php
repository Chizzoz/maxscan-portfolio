<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Logistico
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * logistico_before_page hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_before_page' );

/**
 * logistico_header_top_bar hook
 *
 * @since 1.0.0
 */
do_action( 'logistico_header_top_bar' );

/**
 * logistico_header_section hook
 *
 * @hooked - logistico_header_start - 10
 * @hooked - logistico_header_wrap - 20
 * @hooked - logistico_header_end - 30
 * 
 * @since 1.0.0
 */
do_action( 'logistico_header_section' );

/**
 * logistico_banner_section hook
 *
 * @hooked - logistico_banner_section_start - 10
 * @hooked - logistico_banner_title - 20
 * @hooked - logistico_banner_section_end - 30
 *
 * @since 1.0.0
 */
do_action( 'logistico_banner_section' );

/**
 * logistico_content_start hook
 *
 *
 * @since 1.0.0
 */
do_action( 'logistico_content_start' );
