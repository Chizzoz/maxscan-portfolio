<?php
/**
 * File to sanitize customizer field
 *
 * @package Logistico
 * @since 1.0.0
 */

/**
 * Sanitize checkbox value
 *
 * @since 1.0.1
 */
function logistico_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}


/**
 * Sanitize site layout
 *
 * @since 1.0.0
 */
function logistico_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'fullwidth_layout' => esc_html__( 'Fullwidth Layout', 'logistico' ),
        'boxed_layout'     => esc_html__( 'Boxed Layout', 'logistico' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function logistico_sanitize_switch_option( $input ) {
    $valid_keys = array(
        'show'  => esc_html__( 'Show', 'logistico' ),
        'hide'  => esc_html__( 'Hide', 'logistico' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since logistico 1.0.0
 * @see logistico_customize_register()
 *
 * @return void
 */
function logistico_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since logistico 1.0.0
 * @see logistico_customize_register()
 *
 * @return void
 */
function logistico_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since logistico 1.0.0
 * @see logistico_footer_settings_register()
 *
 * @return void
 */
function logistico_customize_partial_copyright() {
    return get_theme_mod( 'logistico_copyright_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since logistico 1.0.0
 * @see logistico_design_settings_register()
 *
 * @return void
 */
function logistico_customize_partial_related_title() {
    return get_theme_mod( 'logistico_related_posts_title' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since logistico 1.0.0
 * @see logistico_design_settings_register()
 *
 * @return void
 */
function logistico_customize_partial_archive_more() {
    return get_theme_mod( 'logistico_archive_read_more_text' );
}

/**
 * Active callback function for featured post section at top header
 *
 * @since 1.0.0
 */
function logistico_featured_posts_active_callback( $control ) {
    if ( $control->manager->get_setting( 'logistico_top_featured_option' )->value() == 'show' ) {
        return true;
    } else {
        return false;
    }
}


/**
 * Sanitize select and radio fields
 *
 * @since 1.0.0
 */
function logistico_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * check if related post options enable
 *
 * @since 1.0.0
 */
function logistico_is_related_shown( $control ) {
    if ( $control->manager->get_setting('logistico_related_posts_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * check if footer widget area options enable
 *
 * @since 1.0.0
 */
function logistico_is_footer_shown( $control ) {
    if ( $control->manager->get_setting('logistico_footer_widget_option')->value() == 'show' ) {
       return true;
    } else {
       return false;
    }
}

/**
 * Minimal html textarea
 *
 * @since 1.0.0
 */
function logistico_minimal_html_senitize( $input ) {

    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    );
    
    return wp_kses($input, $allowed_html);
}

