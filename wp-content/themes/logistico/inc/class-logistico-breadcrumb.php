<?php
/**
 * Creates a breadcrumbs the site based on the current page that's being viewed by the user.
 *
 * @since  1.0.0
 * @access public
 */
if ( ! class_exists( 'Logistico_BreadCrumb' ) ) {
	class Logistico_BreadCrumb {

		/**
		 * Header content display.
		 *
		 * @access public
		 */
		public function init() {
			$title = apply_filters('logistico_breadcrumb_title', $this->breadcrumb_title());
			$subtitle = apply_filters('logistico_breadcrumb_subtitle', $this->breadcrumb_description());
			$breadcrumb  = '';
			$breadcrumb .= $title;
			$breadcrumb .= $subtitle;
			return $breadcrumb;
		}

		/**
		 * Breadcrumb title
		 *
		 * @access public
		 */
		private function breadcrumb_title() {
			if ( is_404() ) {
				$breadcrumb_title = '<h1 class="logistico-breadcrumb-title">' . esc_html__( 'Oops! That page can&rsquo;t be found.', 'logistico' ) . '</h1>';
				return $breadcrumb_title;
			}
			if ( is_archive() ) {
				$title = get_the_archive_title();
				$breadcrumb_title = '';
				if ( ! empty( $title ) ) {
					$breadcrumb_title .= '<h1 class="logistico-breadcrumb-title">' . wp_kses($title, wp_kses_allowed_html( 'post' )) . '</h1>';
				}
				return $breadcrumb_title;
			}
			if ( is_search() ) {
				$breadcrumb_title = '<h1 class="logistico-breadcrumb-title">';
				/* translators: search result */
				$breadcrumb_title .= sprintf( esc_html__( 'Search Results for: %s', 'logistico' ), get_search_query() );
				$breadcrumb_title .= '</h1>';
				return $breadcrumb_title;
			}

			$disabled_frontpage = get_theme_mod( 'disable_frontpage_sections', false );
			if ( is_front_page() && get_option( 'show_on_front' ) === 'page' && true === (bool) $disabled_frontpage ) {
				$breadcrumb_title = '<h1 class="logistico-breadcrumb-title">' . single_post_title( '', false ) . '</h1>';
				return $breadcrumb_title;
			}

			if ( is_front_page() && get_option( 'show_on_front' ) === 'posts' ) {
				$breadcrumb_title = '<h1 class="logistico-breadcrumb-title">' . get_bloginfo( 'description' ) . '</h1>';
				return $breadcrumb_title;
			}

			$entry_class = '';
			if ( ! is_page() ) {
				$entry_class = 'entry-title';
			}
			$breadcrumb_title = '<h1 class="logistico-breadcrumb-title ' . $entry_class . '">' . single_post_title( '', false ) . '</h1>';

			return $breadcrumb_title;
		}

		/**
		 * Breadcrumb Description
		 *
		 * @access public
		 */
		private function breadcrumb_description() {

			if ( is_archive() ) {
				$description_output = '';

				$description = get_the_archive_description();
				if ( $description ) {
					$description_output = '<h5 class="logistico-breadcrumb-desc">' . wp_kses( $description, wp_kses_allowed_html( 'post' ) ) . '</h5>';
				}
				return $description_output;
			}
			if ( is_single() ) {
				if ( class_exists( 'WooCommerce' ) ) {
					if ( is_product() ) {
						return '';
					}
				}

				global $post;
				$post_meta_output = '';
				$author_id        = $post->post_author;
				$author_name      = get_the_author_meta( 'display_name', $author_id );
				$author_posts_url = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );

				$post_meta_output .= apply_filters(
					'logistico_single_post_meta',
					sprintf(
						/* translators: %1$s is Author name wrapped, %2$s is Date*/
						esc_html__( 'Published by %1$s on %2$s', 'logistico' ),
						/* translators: %1$s is Author name, %2$s is Author link*/
						sprintf(
							'<a href="%2$s" class="vcard author"><strong class="fn">%1$s</strong></a>',
							esc_html( $author_name ),
							esc_url( $author_posts_url )
						),
						$this->get_time_tags()
					)
				);

				$description_output = '';

				if ( $post_meta_output ) {
					$description_output = '<h5 class="post_meta_output">' . $post_meta_output . '</h5>';
				}

				return $description_output;
			}

		}


		/**
		 * Get time tags
		 *
		 * @access public
		 */
		public function get_time_tags() {
			$time = '';

			$time .= '<time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" content="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">';
			$time .= esc_html( get_the_time( get_option( 'date_format' ) ) );
			$time .= '</time>';
			if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
				return $time;
			}
			$time .= '<time class="updated hestia-hidden" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">';
			$time .= esc_html( get_the_time( get_option( 'date_format' ) ) );
			$time .= '</time>';

			return $time;
		}

	}
}