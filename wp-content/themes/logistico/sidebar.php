<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Logistico
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$logistico_archive_sidebar      = get_theme_mod( 'logistico_archive_sidebar', 'right_sidebar' );
$logistico_post_default_sidebar = get_theme_mod( 'logistico_default_post_sidebar', 'right_sidebar' );
$logistico_page_default_sidebar = get_theme_mod( 'logistico_default_page_sidebar', 'right_sidebar' );

if ( is_single() ) {
	if ( 'no_sidebar' === $logistico_post_default_sidebar ) {
		return;
	}
} elseif ( is_page() ) {
	if ( 'no_sidebar' === $logistico_page_default_sidebar ) {
		return;
	}
} else {
	if ( 'no_sidebar' === $logistico_archive_sidebar ) {
		return;
	}
}
?>

<aside id="secondary" class="<?php echo esc_attr( logistico_sidebar_class() ); ?>">
	<div class="logistico-sidebar-wrap">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->
