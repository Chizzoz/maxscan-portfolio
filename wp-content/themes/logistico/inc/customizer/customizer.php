<?php
/**
 * Logistico Theme Customizer
 *
 * @package Logistico
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function logistico_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_control("display_header_text");


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'logistico_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'logistico_customize_partial_blogdescription',
		) );
	}


}
add_action( 'customize_register', 'logistico_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function logistico_customize_preview_js() {
	wp_enqueue_script( 'logistico-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'logistico_customize_preview_js' );


/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function logistico_customize_backend_scripts() {

    wp_enqueue_style( 'logistico_admin_customizer_style', get_template_directory_uri() . '/assets/css/logistico-customizer-style.css' );

    wp_enqueue_script( 'logistico_admin_customizer', get_template_directory_uri() . '/assets/js/logistico-customizer-controls.js', array( 'jquery', 'customize-controls' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'logistico_customize_backend_scripts', 10 );


/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */

get_template_part('inc/customizer/logistico','custom-classes');         // Custom Classes
get_template_part('inc/customizer/logistico','customizer-sanitize');    // Customizer Sanitize
get_template_part('inc/customizer/logistico','general-panel');          // General Settings
get_template_part('inc/customizer/logistico','header-panel');  		    // Header Settings
get_template_part('inc/customizer/logistico','layout-panel');       	// Layout Settings
get_template_part('inc/customizer/logistico','footer-panel');           // Footer Settings


