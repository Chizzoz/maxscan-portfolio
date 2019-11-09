<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Logistico
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function logistico_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// add a classs when box layout selected.
	$page_layout = get_theme_mod( 'logistic_site_layout', 'fullwidth_layout' );
	if ( 'boxed_layout' === $page_layout ) {
		$classes[] = 'box-layout-page';
	}

	return $classes;
}
add_filter( 'body_class', 'logistico_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function logistico_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'logistico_pingback_header' );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function logistico_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'logistico' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'logistico' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area', 'logistico' ),
			'id'            => 'footer-widget-area',
			'description'   => esc_html__( 'Add widgets here.', 'logistico' ),
			'before_widget' => '<section id="%1$s" class="logistico-footer-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'logistico_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function logistico_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'logistico-fonts', logistico_fonts_url(), array(), null );
	// Add Themify icons, used in the main stylesheet.
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/vendor/themify-icons/themify-icons.css', array(), wp_get_theme()->get( 'Version' ) );
	// Add Bootstrap styles files.
	wp_dequeue_style( 'bootstrap' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.css', array(), wp_get_theme()->get( 'Version' ) );
	// Add Meanmenu styles files.
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/vendor/meanmenu/meanmenu.css', array(), wp_get_theme()->get( 'Version' ) );
	// Add Dashicons.
	wp_enqueue_style( 'dashicons' );
	// Add Logistico main styles files.
	wp_enqueue_style( 'logistico-main', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	// Theme stylesheet.
	wp_enqueue_style( 'logistico-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	// Add Logistico mairesponsiven styles files.
	wp_enqueue_style( 'logistico-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'logistico-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/vendor/meanmenu/jquery.meanmenu.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'logistico-touch-navigation', get_template_directory_uri() . '/assets/js/touch-keyboard-navigation.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'logistico-config', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	wp_localize_script(
		'logistico-touch-navigation',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'logistico' ),
			'collapse' => __( 'collapse child menu', 'logistico' ),
		)
	);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$logistico_dynamic_css       = '';
	$logistico_header_bg         = get_header_image();
	$logistico_header_background = get_theme_mod( 'header_background_color' );
	$logistico_footer_background = get_theme_mod( 'footer_background_color', '#22304A' );
	$logistico_footer_text       = get_theme_mod( 'footer_text_color', '#FFFFFF' );
	$logistico_footer_anchor     = get_theme_mod( 'footer_anchor_color', '#666666' );

	$logistico_footer_bottom_background = get_theme_mod( 'footer_bottom_background_color', '#22304A' );
	$logistico_footer_bottom_text       = get_theme_mod( 'footer_bottom_text_color', '#FFFFFF' );
	$logistico_footer_bottom_anchor     = get_theme_mod( 'footer_bottom_anchor_color', '#fc414a' );

	if ( $logistico_header_bg ) {
		$logistico_dynamic_css .= '.lgtico-breadcrumb-section { background: url("' . esc_url( $logistico_header_bg ) . '") no-repeat scroll left top rgba(0, 0, 0, 0); position: relative; background-size: cover; }';
		$logistico_dynamic_css .= '.lgtico-breadcrumb-section::before {
			content: "";
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: rgba(255,255,255,0.5);
		}';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_header_background ) {
		$logistico_dynamic_css .= '.lgtico-breadcrumb-section { background-color: ' . esc_attr( $logistico_header_background ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_background ) {
		$logistico_dynamic_css .= '#colophon { background-color: ' . esc_attr( $logistico_footer_background ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_text ) {
		$logistico_dynamic_css .= '.logistico-footer-widget, .logistico-footer-widget li, .logistico-footer-widget p, .logistico-footer-widget h3, .logistico-footer-widget h4 { color: ' . esc_attr( $logistico_footer_text ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_anchor ) {
		$logistico_dynamic_css .= '.logistico-footer-widget a { color: ' . esc_attr( $logistico_footer_anchor ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_bottom_background ) {
		$logistico_dynamic_css .= '.lgtico-footer-bottom { background-color: ' . esc_attr( $logistico_footer_bottom_background ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_bottom_text ) {
		$logistico_dynamic_css .= '.lgtico-footer-bottom p, .lgtico-copywright, .lgtico-copywright li { color: ' . esc_attr( $logistico_footer_bottom_text ) . ' }';
		$logistico_dynamic_css .= "\n";
	}
	if ( $logistico_footer_bottom_anchor ) {
		$logistico_dynamic_css .= '.lgtico-footer-bottom a, .lgtico-copywright a, .lgtico-copywright li a { color: ' . esc_attr( $logistico_footer_bottom_anchor ) . ' }';
		$logistico_dynamic_css .= "\n";
	}

	$logistico_dynamic_css = logistico_css_strip_whitespace( $logistico_dynamic_css );

	wp_add_inline_style( 'logistico-style', $logistico_dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'logistico_scripts', 5 );

/**
 * Add an extra menu to our nav for our priority+ navigation to use
 *
 * @param object $nav_menu  Nav menu.
 * @param object $args      Nav menu args.
 * @return string More link for hidden menu items.
 */
function logistico_add_ellipses_to_nav( $nav_menu, $args ) {

	if ( 'menu-1' === $args->theme_location ) :

		$nav_menu .= '<div class="main-menu-more">';
		$nav_menu .= '<ul class="main-menu">';
		$nav_menu .= '<li class="menu-item menu-item-has-children">';
		$nav_menu .= '<button class="submenu-expand main-menu-more-toggle is-empty" tabindex="-1" aria-label="More" aria-haspopup="true" aria-expanded="false">';
		$nav_menu .= '<span class="screen-reader-text">' . esc_html__( 'More', 'logistico' ) . '</span>';
		// $nav_menu .= logistico_get_icon_svg( 'arrow_drop_down_ellipsis' );
		$nav_menu .= '</button>';
		$nav_menu .= '<ul class="sub-menu hidden-links">';
		$nav_menu .= '<li id="menu-item--1" class="mobile-parent-nav-menu-item menu-item--1">';
		$nav_menu .= '<button class="menu-item-link-return">';
		// $nav_menu .= logistico_get_icon_svg( 'chevron_left' );
		$nav_menu .= esc_html__( 'Back', 'logistico' );
		$nav_menu .= '</button>';
		$nav_menu .= '</li>';
		$nav_menu .= '</ul>';
		$nav_menu .= '</li>';
		$nav_menu .= '</ul>';
		$nav_menu .= '</div>';

	endif;

	return $nav_menu;
}
// add_filter( 'wp_nav_menu', 'logistico_add_ellipses_to_nav', 10, 2 );
/**
 * Get minified css and removed space
 *
 * @since 1.0.0
 */
function logistico_css_strip_whitespace( $css ) {
	$replace = array(
		'#/\*.*?\*/#s' => '',  // Strip C style comments.
		'#\s\s+#'      => ' ', // Strip excess whitespace.
	);
	$search  = array_keys( $replace );
	$css     = preg_replace( $search, $replace, $css );

	$replace = array(
		': '  => ':',
		'; '  => ';',
		' {'  => '{',
		' }'  => '}',
		', '  => ',',
		'{ '  => '{',
		';}'  => '}', // Strip optional semicolons.
		",\n" => ',', // Don't wrap multiple selectors.
		"\n}" => '}', // Don't wrap closing braces.
		'} '  => "}\n", // Put each rule on it's own line.
	);
	$search  = array_keys( $replace );
	$css     = str_replace( $search, $replace, $css );

	return trim( $css );
}


if ( ! function_exists( 'logistico_fonts_url' ) ) :

	/**
	 * Register Google fonts for Logistico.
	 *
	 * @return string Google fonts URL for the theme.
	 * @since 1.0.0
	 */

	function logistico_fonts_url() {
		$fonts_url = '';
		$fonts     = array();

		/* translators: If there are characters in your language that are not supported by Muli, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Muli font: on or off', 'logistico' ) ) {
			$fonts[] = 'Muli:300,400,600';
		}

		/* translators: If there are characters in your language that are not supported by Muli, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Saira Condensed font: on or off', 'logistico' ) ) {
			$fonts[] = 'Saira Condensed:400,500,600';
		}

		$fonts = apply_filters('logistico_google_fonts', $fonts);

		if ( $fonts ) {
			$query_args = array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( 'latin' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;




/**
 * Logo wrapper
 *
 * @since 1.0.0
 */
function logistico_logo_wrap() {
	?>
	<a class="logistico_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" itemprop="url">
		<?php echo logistico_logo(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</a>
	<?php
}



/**
 * Logistico Logo.
 *
 * @return string
 * @since 1.0.0
 */
function logistico_logo() {
	if ( get_theme_mod( 'custom_logo' ) ) {
		$logo          = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		$alt_attribute = get_post_meta( get_theme_mod( 'custom_logo' ), '_wp_attachment_image_alt', true );
		if ( empty( $alt_attribute ) ) {
			$alt_attribute = get_bloginfo( 'name' );
		}
		$logo = '<img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( $alt_attribute ) . '">';
	} else {
		$logo = '<h2>' . get_bloginfo( 'name' ) . '</h2>';
	}
	return $logo;
}


if ( !function_exists( 'logistico_content_wrap_calc' ) ) {
	/**
	 * Logistico content wrap classes list
	 *
	 */
	function logistico_content_wrap_calc( $type_layout ) {
		$wrap_class = array(
			'col-lg-8',
			'col-md-8',
			'col-sm-12',
			'content-area',
		);
		if ( 'no_sidebar' === $type_layout ) {
			$wrap_class = array(
				'col-lg-12',
				'col-md-12',
				'col-sm-12',
				'content-area',
			);
		} elseif ( 'left_sidebar' === $type_layout ) {
			$wrap_class[] = 'order-lg-2';
			$wrap_class[] = 'order-md-2';
		}
		return $wrap_class;
	}
}

if ( !function_exists( 'logistico_content_class' ) ) {
	/**
	 * Logistico content class init
	 */
	function logistico_content_class() {

		$archive_sidebar      = get_theme_mod( 'logistico_archive_sidebar', 'right_sidebar' );
		$post_default_sidebar = get_theme_mod( 'logistico_default_post_sidebar', 'right_sidebar' );
		$page_default_sidebar = get_theme_mod( 'logistico_default_page_sidebar', 'right_sidebar' );

		if ( is_single() ) {
			$content_class = logistico_content_wrap_calc( $post_default_sidebar );
		} elseif ( is_page_template('template-full.php') ) {
			$content_class = logistico_content_wrap_calc( 'no_sidebar' );
		} elseif ( is_page_template('template-full-width.php') ) {
			$content_class = logistico_content_wrap_calc( 'no_sidebar' );
		} elseif ( is_page() ) {
			$content_class = logistico_content_wrap_calc( $page_default_sidebar );
		} else {
			$content_class = logistico_content_wrap_calc( $archive_sidebar );
		}

		$content_class = apply_filters('logistico_content_class', $content_class);

		$content_class = implode( ' ', $content_class );
		return $content_class;
	}
}

if ( !function_exists( 'logistico_sidebar_wrap_calc' ) ) {
	/**
	 * Logistico sidebar classes list
	 */
	function logistico_sidebar_wrap_calc( $type_layout ) {
		$wrap_class = array(
			'col-lg-4 col-md-4',
			'col-md-4',
			'col-sm-12',
			'widget-area',
		);
		if ( 'left_sidebar' === $type_layout ) {
			$wrap_class[] = 'order-lg-1';
			$wrap_class[] = 'order-md-1';
		}
		
		return $wrap_class;
	}
}

if ( !function_exists( 'logistico_sidebar_class' ) ) {
	/**
	 * Logistico sidebar class init
	 */
	function logistico_sidebar_class() {

		$archive_sidebar      = get_theme_mod( 'logistico_archive_sidebar', 'right_sidebar' );
		$post_default_sidebar = get_theme_mod( 'logistico_default_post_sidebar', 'right_sidebar' );
		$page_default_sidebar = get_theme_mod( 'logistico_default_page_sidebar', 'right_sidebar' );

		if ( is_single() ) {
			$sidebar_class = logistico_sidebar_wrap_calc( $post_default_sidebar );
		} elseif ( is_page() ) {
			$sidebar_class = logistico_sidebar_wrap_calc( $page_default_sidebar );
		} else {
			$sidebar_class = logistico_sidebar_wrap_calc( $archive_sidebar );
		}

		$sidebar_class = apply_filters('logistico_sidebar_class', $sidebar_class);
		$sidebar_class = implode( ' ', $sidebar_class );
		return $sidebar_class;
	}
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function logistico_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 40;
}
add_filter( 'excerpt_length', 'logistico_custom_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function logistico_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '';
}
add_filter( 'excerpt_more', 'logistico_excerpt_more' );



if ( ! function_exists( 'logistico_related_posts' ) ) {
	/**
	 * Single blog post related posts list
	 */
	function logistico_related_posts( $the_post_id ) {

		// Define shared post arguments.
		$related_args      = array(
			'update_post_meta_cache'    => false,
			'update_post_term_cache'    => false,
			'ignore_sticky_posts'       => 1,
			'orderby'                   => 'rand',
			'post_type'                 => 'post',
			'post__not_in'              => array( $the_post_id ),
			'posts_per_page'            => 3,
		);
		$related_post_type = get_theme_mod( 'logistico_related_post_from', 'category' );
		// Related by tags.
		if ( $related_post_type == 'tag' ) {
			$tags = wp_get_post_tags( $the_post_id );
			if ( $tags ) {
				$first_tag               = $tags[0]->term_id;
				$related_args['tag__in'] = array( $first_tag );
			}
		} else {
			// Related by categories.
			$cats = wp_get_post_categories( $the_post_id );
			if ( $cats && isset($cats[0]) ) {
				$first_tag                    = ( isset($cats[0]->term_id) ) ? $cats[0]->term_id : $cats[0];
				$related_args['category__in'] = array( $first_tag );
			}
		}

		return $related_args;
	}
}


if ( ! function_exists( 'logistico_set_attributes' ) ) {
	/**
	 * Set dynamic attributes
	 */
	function logistico_set_attributes( $attributes ) {

		if ( !$attributes )
			return;

		$set_attr = array();
		foreach( $attributes as $key => $attr ) {
			$attr = (array)$attr;
			$attr = implode(" ", $attr);
			$set_attr[] = "{$key}='{$attr}'";
		}
		
		return implode(" ", $set_attr);
	}
}

/**
 * wp_body_open callback for backword Compatibility
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}