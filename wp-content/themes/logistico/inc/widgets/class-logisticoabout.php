<?php
/**
 * Logistico class-logistico-short-about.php widget class file
 *
 * @package Logistico
 */

/**
 * LogisticoContacts widget.
 */
class LogisticoAbout extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'logistico_about', // Base ID
			esc_html__( 'Logistico About', 'logistico' ), // Name
			array( 'description' => esc_html__( 'Display Footer Short About Info', 'logistico' ) ) // Args
		);

		// Enqueue Styles and Scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts($hook) {

		if( $hook != 'widgets.php' ) 
			return;

		wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/vendor/themify-icons/themify-icons.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'logistico-widget-js', LOGISTICO_ASSETS_URL . 'js/widget.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), wp_get_theme()->get( 'Version' ), true );

		// Localize the script with new data
		$translation_array = array(
			'select_icon' => __( 'Select an Icon', 'logistico' ),
			'upload' => __( 'Upload Thumbnail', 'logistico' ),
			'select_img' => __( 'Select Image', 'logistico' ),
			'remove_img' => __( 'Remove Image', 'logistico' ),
			'item' => __( 'Item', 'logistico' ),
			'delete' => __( 'Delete', 'logistico' ),
			'home_url' => esc_url( home_url('/') ),
		);
		wp_localize_script( 'logistico-widget-js', 'logisticoWLocalize', $translation_array );

		
		wp_enqueue_style( 'logistico-widget-style', LOGISTICO_ASSETS_URL . 'css/widget-style.css', array(), null );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		$social_links = ( ! empty( $instance['social_links'] ) ) ? $instance['social_links'] : array();
		$description  = isset( $instance['description'] ) ? $instance['description'] : '';
		$thumb        = isset( $instance['thumb'] ) ? $instance['thumb'] : '';
		?>
		<div class="logistico-footer-about-wrap">
			<?php if ( ! empty( $thumb ) && ! empty( $thumb ) ) : ?>
				<a href="<?php esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
			<?php endif; ?>
			<?php if ( ! empty( $description ) && ! empty( $description ) ) : ?>
			<p class="text-lgtico-manatee"><p><?php echo wp_kses_post( $description ); ?></p>
			<?php endif ?>
			<div class="lgtico-social-icon">
				<?php if ( ! empty( $social_links ) && is_array( $social_links ) && ! empty( $social_links[0] ) ) : ?>
				<ul class="list-inline m-0">
					<?php
					foreach ( $social_links as $info ) :
						if ( ! empty( $info['thumb'] ) ) :
							?>
							<li><a href="<?php echo ( ! empty( $info['title'] ) ) ? esc_url( $info['title'] ) : '#'; ?>" title="<?php echo esc_attr( $info['title'] ); ?>"><i class="<?php echo esc_attr( $info['thumb'] ); ?>" aria-hidden="true"></i></a></li>
							<?php
						endif;
					endforeach;
					?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function shorten_text( $text, $max_length = 25, $cut_off = '...', $keep_word = false ) {
		if ( strlen( $text ) <= $max_length ) {
			return $text;
		}
		if ( strlen( $text ) > $max_length ) {
			if ( $keep_word ) {
				$text = substr( $text, 0, $max_length + 1 );
				if ( $last_space = strrpos( $text, ' ' ) ) {
					$text  = substr( $text, 0, $last_space );
					$text  = rtrim( $text );
					$text .= $cut_off;
				}
			} else {
				$text  = substr( $text, 0, $max_length );
				$text  = rtrim( $text );
				$text .= $cut_off;
			}
		}

		return $text;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance                = $old_instance;
		$instance['thumb']       = isset( $new_instance['thumb'] ) ? strip_tags( $new_instance['thumb'] ) : '';
		$instance['description'] = isset( $new_instance['description'] ) ? strip_tags( $new_instance['description'] ) : '';
		$social_links            = array();
		if ( ! empty( $new_instance['social_links'] ) ) :
			$i = 0;
			foreach ( (array) $new_instance['social_links'] as $info ) {
				$social_links[ $i ]['thumb'] = sanitize_text_field( $info['thumb'] );
				$social_links[ $i ]['title'] = sanitize_text_field( $info['title'] );
				$i++;
			}
		endif;
		$instance['social_links'] = ( ! empty( $new_instance['social_links'] ) ) ? $social_links : '';

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$thumb        = isset( $instance['thumb'] ) ? $instance['thumb'] : '';
		$description  = isset( $instance['description'] ) ? $instance['description'] : '';
		$social_links = ( ! empty( $instance['social_links'] ) ) ? $instance['social_links'] : array();
		?>
		<div id="fa_all_markup_wrap" style="display: none;">
			<div class="fa-all-thing-wrapper">
				<div class="themify-icon-search">
					<input type="text" class="themify_search" placeholder="<?php echo esc_attr_e('Search themify icon', 'logistico'); ?>">
				</div>
				<div class="themify-icon-list-wrap">
					<ul>
					<?php
					if ( function_exists( 'logistico_get_social_icons' ) ) :
						$themify_icons = logistico_get_social_icons();
						foreach ( $themify_icons as $key ) :
							?>
						<li class="fa_grab_init" data-icon="<?php echo esc_attr( $key ); ?>"><i class="<?php echo esc_attr( $key ); ?>" aria-hidden="true"></i></li>
						<?php endforeach; ?>
					<?php endif; ?>
					</ul>
				</div>
				<button class="fa_tb_close button-primary"><?php esc_html_e( 'Insert Icon', 'logistico' ); ?></button>
			</div>
		</div>
		<p>
			<div class="single-widget-uploader">
				<label for="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>">
					<input type="hidden" id="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb' ) ); ?>" class="sl_media_input" value="<?php echo esc_attr( $thumb ); ?>"/>
				</label>
					<button class="sl-widget-up-btn button" data-url="<?php echo esc_url( get_site_url() ); ?>"><?php echo esc_html__( 'Upload image', 'logistico' ); ?></button>
					<?php $thumnbnail = ! empty( $thumb ) ? esc_attr( $thumb ) : ''; ?>
					<button <?php echo ( ! empty( $thumnbnail ) ) ? 'style="display: inline-block;"' : ''; ?> class="sl-widget-media-remove button" data-url="<?php echo esc_url( get_site_url() ); ?>"><?php echo esc_html__( 'Remove image', 'logistico' ); ?></button>
					<br><br>
				<?php
				if ( ! empty( $thumnbnail ) ) :
					?>
				<img style="max-width: 100%;" class="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>" src="<?php echo esc_url( $thumb ); ?> "/>
				<?php endif; ?>
			</div>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'logistico' ); ?></label>
			<textarea name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" cols="30" rows="5" style="width: 100%;"><?php echo wp_kses_post( $description ); ?></textarea> 
		</p>
		<div class="logistico-repeater-info-wrapper" data-id-name="logistico_about" data-field-id="social_links" data-placeholder="<?php esc_attr_e("Social Page Url", "logistico"); ?>">
			<div id="sl_repeater_main" class="logistico-repeater-info">
			<?php
			$index = 0;
			foreach ( $social_links as $item ) :
				?>
			<div class="single-repeater-field-wrap">
				<div class="single-repater-title">
				<?php
				if ( empty( $item['title'] ) ) {
					?>
					 <?php esc_html_e( 'Item', 'logistico' ); ?> #<span class="repeater_num"><?php echo esc_html( $index + 1 ); ?></span>
					<?php
				} else {
					echo esc_html( $this->shorten_text( $item['title'], 25 ) ); }
				?>
				</div>
				<div class="single-repater-content">
					<div class="single-widget-icon-wrapper">
						<label for="<?php echo esc_attr( $this->get_field_id( 'social_links' ) . '[' . esc_attr( $index ) . '][thumb-id]' ); ?>">
							<a class="button thickbox_special"><span>
							<?php
							if ( ! empty( $item['thumb'] ) ) {
								?>
								 <i class="fa <?php echo esc_attr( $item['thumb'] ); ?>" aria-hidden="true"></i>
								<?php
							} else {
								esc_html_e( 'Select an Icon', 'logistico' ); }
							?>
							</span></a>
							<input class="widefat fa_sepcial_wfield" id="<?php echo esc_attr( $this->get_field_id( 'social_links' ) . '-' . esc_attr( $index ) . '-thumb-id' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_links' ) . '[' . esc_attr( $index ) . '][thumb]' ); ?>" type="hidden" value="<?php echo esc_attr( $item['thumb'] ); ?>"/>
							<div class="fa_append_element" id="themify_icon-<?php echo esc_attr( $this->get_field_id( 'social_links' ) . '[' . esc_attr( $index ) . '][thumb-id]' ); ?>" style="display: none"></div>
						</label>
						<br>
						<br>
					</div>
					<input class="sl-repater-title-in" type="text" placeholder="<?php esc_attr_e('Social Page Url', 'logistico'); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_links' ) . '[' . esc_attr( $index ) . '][title]' ); ?>" value="<?php echo ( ! empty( $item['title'] ) ) ? esc_attr( $item['title'] ) : ''; ?>">
					<div class="repater-alighment">
						<button type="button" class="button-link button-link-delete repeater-control-remove"><?php esc_html_e('Delete', 'logistico'); ?></button>
					</div>
				</div>
			</div>
				<?php
				$index++;
			endforeach;
			?>
			</div>
			<a class="button logistico-widget-add-item" data-widget-type="contact_info"><?php esc_html_e( 'Add Social Link', 'logistico' ); ?></a>
		</div>
		<?php
	}



} // class LogisticoAbout




if ( ! function_exists( 'logistico__about_widget_init' ) ) {
	function logistico__about_widget_init() {
		register_widget( 'LogisticoAbout' );
	}
}
add_action( 'widgets_init', 'logistico__about_widget_init' );
