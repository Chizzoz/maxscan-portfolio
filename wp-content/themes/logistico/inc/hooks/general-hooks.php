<?php
/**
 * Page Start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_page_wrap_start' ) ) :
	function logistico_page_wrap_start() {
        $page_attr = array(
			'class' => array('site', 'logisitco_page_wrap'),
			'id' => 'page'
        );
        $page_attr = apply_filters('logistico_page_attr', $page_attr);
        echo '<div '. logistico_set_attributes( $page_attr ) .'>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<a class="skip-link screen-reader-text" href="#content">'. esc_html__('Skip to content', 'logistico') . '</a>';
	}
endif;


/**
 * Page End
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_page_wrap_end' ) ) :
	function logistico_page_wrap_end() {
		echo '</div><!-- #page -->';
	}
endif;


/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_content_start' ) ) :
	function logistico_content_start() {
        echo '<div id="content" class="site-content">';
    }
endif;


/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_content_end' ) ) :
	function logistico_content_end() {
        echo '</div><!-- #content -->';
    }
endif;


/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_content_inner_start' ) ) :
	function logistico_content_inner_start() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template('elementor_canvas') )
            return;

        echo '<div class="container">';
        echo '<div class="row">';
    }
endif;

/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_content_inner_end' ) ) :
	function logistico_content_inner_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;

        echo '</div> <!-- .container -->';
        echo '</div> <!-- .row -->';
    }
endif;



/**
 * Custom hooks functions are define about general section.
 *
 * @package Logistico
 * @since 1.0.0
 */

/**
 * Header section wrap
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_header_wrap' ) ) :
	function logistico_header_wrap() {
        ?>
        <div class="col-lg-3 col-md-12 col-sm-6 col-xs-6 d-flex align-items-center">
            <div class="site-branding">
                <?php logistico_logo_wrap(); ?>
            </div><!-- .site-branding -->
            <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'logistico' ); ?></button>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-6 col-xs-6 d-flex align-items-center justify-content-end">
            <div class="lgtico-nav-wrap lgtico-nav-wrap-2 lgtico-nav-wrap-3 lgtico-nav-wrap-4">
                <div id="site-header-menu" class="site-header-menu">
                    <?php 
                    $nav_attr = array(
                        'id' => 'site-navigation',
                        'class' => array(
                            'main-navigation',
                            'lgtico-menu',
                            'lgtico-menu-4',
                            'lgtico-responsive-menu',
                            'main-navigation'
                        ),
                        'aria-label' => esc_attr__( 'Top Menu', 'logistico' )
                    );
                    $nav_attr = apply_filters('logistico_nav_attr', $nav_attr);
                    ?>
                    <nav <?php echo logistico_set_attributes($nav_attr); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <?php do_action( 'logistico_nav_before' ); ?>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'main-menu',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ) );
                        ?>
                        <?php do_action( 'logistico_nav_after' ); ?>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div> <!-- .col-lg-9 -->
        <?php
    }
endif;

/**
 * Header section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_header_start' ) ) :
	function logistico_header_start() {
        echo '<header id="masthead" class="site-header">';
        echo '<div class="container">';
        echo '<div class="row">';
    }
endif;


/**
 * Header section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_header_end' ) ) :
	function logistico_header_end() {
        echo '</div><!-- .row -->';
        echo '</div><!-- .container -->';
        echo '</header><!-- .side-header -->';
    }
endif;


/**
 * Header banner section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_banner_section_start' ) ) :
	function logistico_banner_section_start() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;
        $breadcrumb_attr = array(
            'class' => array(
                'lgtico-breadcrumb-section',
                'p-t-b-55'
            )
        );
        $breadcrumb_attr = apply_filters('logistico_breadcrumb_class', $breadcrumb_attr);
        echo '<section '. logistico_set_attributes( $breadcrumb_attr ) .'>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<div class="container breadcrumb-container">';
        echo '<div class="lgtico-breadcrumb-content-wrap lgtico-breadcrumb-content-wrap-3 text-center">';
    }
endif;


/**
 * Header banner title
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_banner_title' ) ) :
	function logistico_banner_title() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;

        $breadcrumb = new Logistico_BreadCrumb();
        echo wp_kses_post( $breadcrumb->init() );
    }
endif;


/**
 * Header banner section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_banner_section_end' ) ) :
	function logistico_banner_section_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') )
            return;
            
		echo '</div>';
		echo '</div>';
		echo '</section><!-- .lgtico-breadcrumb-section-->';
	}
endif;



/**
 * Footer section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_footer_section_start' ) ) :
	function logistico_footer_section_start() {
        echo '<footer id="colophon" class="site-footer lgtico-section bg-cloud-burst">';
	}
endif;



/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_footer_section_widgets' ) ) :
	function logistico_footer_section_widgets() {
        if ( is_active_sidebar( 'footer-widget-area' ) ) :
        $footer_layout = get_theme_mod('footer_widget_layout', 'column_four');
        ?>
        <div class="lgtico-footer-top p-t-b-95 p-sm-t-b-70 logistic-footer-<?php echo esc_attr($footer_layout); ?>">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!--.lgtico-footer-top -->
        <?php
        endif;
	}
endif;


/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_footer_section_bottom' ) ) :
	function logistico_footer_section_bottom() {
        ?>
        <div class="lgtico-footer-bottom lgtico-footer-border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex d-lg-flex d-md-flex d-sm-block d-xs-block align-items-center justify-content-lg-start justify-content-md-center">
                        <?php 
                        $copyright = get_theme_mod( 'logistico_copyright_text' );
                        if( $copyright ) :
                        $allowed_html = array(
                            'a' => array(
                                'href' => array(),
                                'title' => array()
                            ),
                            'br' => array(),
                            'em' => array(),
                            'strong' => array(),
                        );
                        ?>
                        <p class="lgtico-copywright lgtico-font-14 m-0 lgtico-text-sm-center m-sm-b-10">
                            <?php echo wp_kses($copyright, $allowed_html); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex d-lg-flex d-md-flex d-sm-block d-xs-block justify-content-lg-end justify-content-md-center">
                        <div class="lgtico-footer-extra-menu lgtico-text-sm-center">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-2',
                                    'menu_id'        => 'footer-menu',
                                ) );
                            ?>
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .lgtico-footer-bottom -->
        <?php
	}
endif;


/**
 * Footer section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'logistico_footer_section_end' ) ) :
	function logistico_footer_section_end() {
		echo '</footer><!-- #colophon-->';
	}
endif;





/**
 * Page Wrapper
 *
 * @since 1.0.0
 */
add_action('logistico_before_page', 'logistico_page_wrap_start' );
add_action('logistico_after_page', 'logistico_page_wrap_end' );


/**
 * Main content wrapper
 *
 * @since 1.0.0
 */
add_action( 'logistico_content_start', 'logistico_content_start', 10 );
add_action( 'logistico_content_start', 'logistico_content_inner_start', 20 );
add_action( 'logistico_content_end', 'logistico_content_inner_end', 10 );
add_action( 'logistico_content_end', 'logistico_content_end', 20 );



/**
 * Managed functions for Header section hooking
 *
 * @since 1.0.0
 */
add_action( 'logistico_header_section', 'logistico_header_start', 10 );
add_action( 'logistico_header_section', 'logistico_header_wrap', 20 );
add_action( 'logistico_header_section', 'logistico_header_end', 30 );


/**
 * Managed functions for top banner hook
 *
 * @since 1.0.0
 */
add_action( 'logistico_banner_section', 'logistico_banner_section_start', 10 );
add_action( 'logistico_banner_section', 'logistico_banner_title', 20 );
add_action( 'logistico_banner_section', 'logistico_banner_section_end', 30 );


/**
 * Managed functions for footer area hook
 *
 * @since 1.0.0
 */
add_action( 'logistico_footer_before', 'logistico_footer_section_start' );
add_action( 'logistico_footer_section', 'logistico_footer_section_widgets' );
add_action( 'logistico_footer_bottom', 'logistico_footer_section_bottom' );
add_action( 'logistico_footer_after', 'logistico_footer_section_end' );
