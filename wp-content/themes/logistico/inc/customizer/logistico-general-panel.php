<?php
/**
 * Logistic General Settings panel at Theme Customizer
 *
 * @package Logistic
 * @since 1.0.0
 */

add_action( 'customize_register', 'logistico_general_settings_register' );

function logistico_general_settings_register( $wp_customize ) {

    $wp_customize->get_section( 'title_tagline' )->panel = 'logistico_general_settings_panel';
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'colors' )->panel = 'logistico_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'background_image' )->panel = 'logistico_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';
    $wp_customize->get_section( 'static_front_page' )->panel = 'logistico_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';

    $wp_customize->add_setting(
        'header_background_color',
        array(
            'default' => '#F8F8F8',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'header_background_color', 
        array(
            'label'      => esc_html__( 'Header Background Color', 'logistico' ),
            'section'    => 'colors',
            'priority'   => 20,
        ) ) 
    );
    
    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'logistico_general_settings_panel',
	    array(
	        'priority'       => 5,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'General Settings', 'logistico' ),
	    )
    );


/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'logistico_website_layout_section',
        array(
            'title'         => esc_html__( 'Website Layout', 'logistico' ),
            'description'   => esc_html__( 'Choose a site to display your website more effectively.', 'logistico' ),
            'priority'      => 55,
            'panel'         => 'logistico_general_settings_panel',
        )
    );
    
    $wp_customize->add_setting(
        'logistico_site_layout',
        array(
            'default'           => 'fullwidth_layout',
            'sanitize_callback' => 'logistico_sanitize_select',
            'transport'=> 'postMessage',
        )       
    );
    $wp_customize->add_control(
        'logistico_site_layout',
        array(
            'type' => 'radio',
            'priority'    => 5,
            'label' => esc_html__( 'Site Layout', 'logistico' ),
            'section' => 'logistico_website_layout_section',
            'choices' => array(
                'fullwidth_layout' => esc_html__( 'FullWidth Layout', 'logistico' ),
                'boxed_layout' => esc_html__( 'Boxed Layout', 'logistico' )
            ),
        )
    );

} // General panel closed