<?php
/**
 * Logistico Page layout for archive/sing/blog, page and single blog post
 *
 * @package Logistico
 * @since 1.0.0
 */

add_action( 'customize_register', 'logistico_design_settings_register' );

function logistico_design_settings_register( $wp_customize ) {

	// Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'Logistico_Customize_Control_Radio_Image' );

	/**
     * Add Layout Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'logistico_layout_settings_panel',
	    array(
	        'priority'       => 25,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Layout Settings', 'logistico' ),
	    )
    );

    /**
     * Archive Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'logistico_archive_settings_section',
        array(
            'title'     => esc_html__( 'Archive/Blog Settings', 'logistico' ),
            'panel'     => 'logistico_layout_settings_panel',
            'priority'  => 5,
        )
    );      

    /**
     * Image Radio field for archive sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_archive_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'logistico_sanitize_select',
        )
    );
    $wp_customize->add_control( new Logistico_Customize_Control_Radio_Image(
        $wp_customize,
        'logistico_archive_sidebar',
            array(
                'label'    => esc_html__( 'Archive Sidebars', 'logistico' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'logistico' ),
                'section'  => 'logistico_archive_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Text field for archive read more
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_archive_read_more_text',
        array(
            'default'      => esc_html__( 'Read More', 'logistico' ),
            'transport'    => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'logistico_archive_read_more_text',
        array(
            'type'      	=> 'text',
            'label'        	=> esc_html__( 'Read More Text', 'logistico' ),
            'description'  	=> esc_html__( 'Enter read more button text for archive page.', 'logistico' ),
            'section'   	=> 'logistico_archive_settings_section',
            'priority'  	=> 15
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'logistico_archive_read_more_text', 
            array(
                'selector' => '.entry-footer > a.lgtico-icon-btn',
                'render_callback' => 'logistico_customize_partial_archive_more',
            )
    );

    /**
     * Page Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'logistico_page_settings_section',
        array(
            'title'     => esc_html__( 'Page Settings', 'logistico' ),
            'panel'     => 'logistico_layout_settings_panel',
            'priority'  => 10,
        )
    );      

    /**
     * Image Radio for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_default_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'logistico_sanitize_select',
        )
    );
    $wp_customize->add_control( new Logistico_Customize_Control_Radio_Image(
        $wp_customize,
        'logistico_default_page_sidebar',
            array(
                'label'    => esc_html__( 'Page Sidebars', 'logistico' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'logistico' ),
                'section'  => 'logistico_page_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Post Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'logistico_post_settings_section',
        array(
            'title'     => esc_html__( 'Post Settings', 'logistico' ),
            'panel'     => 'logistico_layout_settings_panel',
            'priority'  => 15,
        )
    );      

    /**
     * Image Radio for post sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_default_post_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'logistico_sanitize_select',
        )
    );
    $wp_customize->add_control( new Logistico_Customize_Control_Radio_Image(
        $wp_customize,
        'logistico_default_post_sidebar',
            array(
                'label'    => esc_html__( 'Post Sidebars', 'logistico' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'logistico' ),
                'section'  => 'logistico_post_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'logistico' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Switch option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_related_posts_option',
        array(
            'default' => 'show',
            'transport'  => 'refresh',
            'sanitize_callback' => 'logistico_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new logistico_Customize_Switch_Control(
        $wp_customize,
            'logistico_related_posts_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Related Post Option', 'logistico' ),
                'description'   => esc_html__( 'Show/Hide option for related posts section at single post page.', 'logistico' ),
                'section'   => 'logistico_post_settings_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'logistico' ),
                    'hide'  => esc_html__( 'Hide', 'logistico' )
                ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Text field for related post section title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'logistico_related_posts_title',
        array(
            'default'    => esc_html__( 'Related Posts', 'logistico' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'logistico_related_posts_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Related Post Section Title', 'logistico' ),
            'section'   => 'logistico_post_settings_section',
            'active_callback' => 'logistico_is_related_shown',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'logistico_related_posts_title', 
            array(
                'selector' => 'h2.logistico-related-title',
                'render_callback' => 'logistico_customize_partial_related_title',
            )
    );

    $wp_customize->add_setting( 
        'logistico_related_post_from', 
        array(
            'transport'  => 'refresh',
            'sanitize_callback' => 'logistico_sanitize_select',
            'default' => 'category',
        ) 
    );
  
  $wp_customize->add_control( 
      'logistico_related_post_from', array(
        'type' => 'select',
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        'section' => 'logistico_post_settings_section', // Add a default or your own section
        'label'     => esc_html__( 'Select Related Post Type', 'logistico' ),
        'active_callback' => 'logistico_is_related_shown',
        'description' => esc_html__( 'Select whish taxonomy you want to fetch related post', 'logistico' ),
        'choices' => array(
            'category' => esc_html__( 'Category', 'logistico' ),
            'tag' => esc_html__( 'Tag', 'logistico' ),
            ),
        )
    );

} // Layout panel closed