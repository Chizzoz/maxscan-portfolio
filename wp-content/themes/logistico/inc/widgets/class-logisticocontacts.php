<?php
/**
 * Logistico class-logistoco-contact.php widget class file
 *
 * @package Logistico
 */


/**
 * LogisticoContacts widget.
 */

class LogisticoContacts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'logistico_contacts', // Base ID
			esc_html__( 'Logistico Contacts', 'logistico' ), // Name
			array( 'description' => esc_html__( 'Display Contact information', 'logistico' ) ) // Args
		);

		// Enqueue Styles and Scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts($hook) {

		if( $hook != 'widgets.php' ) 
			return;

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
		$contact_infos = array();
		if ( ! empty( $instance['contact_infos'] ) ) {
			$i = 0;
			foreach ( (array) $instance['contact_infos'] as $info ) {
				$contact_infos[$i]['thumb']     = $info['thumb'];
				$contact_infos[$i]['title']     = $info['title'];
				$contact_infos[$i]['sub_title'] = $info['sub_title'];
				$i++;
			}
		}
		?>
		<?php
		if ( ! empty( $instance['title'] ) ) {
			$widget_title = $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			echo wp_kses_post( $widget_title );
		}
		?>
		<div class="lgtico-contact-info lgtico-contact-info-2">
			<?php if ( ! empty( $contact_infos ) && is_array( $contact_infos ) && ! empty( $contact_infos[0] ) ) : ?>

			<ul class="list-inline m-0">
				<?php foreach ( $contact_infos as $info ) : ?>
				<li class="logistico-single-list-item<?php echo ( ! empty( $info['thumb'] ) ) ? ' item-has-thumb' : ''; ?>">
					<?php if ( ! empty( $info['thumb'] ) ) : ?>
					<div class="info-icon">
						<img src="<?php echo esc_url( $info['thumb'] ); ?>" alt="">
					</div>
					<?php endif; ?>
					<?php echo ( ! empty( $info['title'] ) ) ? '<h6 class="lgtico-font-14 text-lgtico-manatee m-0">' . esc_html( $info['title'] ) . '</h6>' : ''; ?>
					<?php echo ( ! empty( $info['sub_title'] ) ) ? '<h4 class="font-weight-semi-bold m-0 lgtico-font-lg-20 text-uppercase">' . esc_html( $info['sub_title'] ) . '</h4>' : ''; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Strip title text length
	 */
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

		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$contact_infos = array();
		if ( ! empty( $new_instance['contact_infos'] ) ) :
			$i = 0;
			foreach ( (array) $new_instance['contact_infos'] as $info ) {
				$contact_infos[ $i ]['thumb']     = sanitize_text_field( $info['thumb'] );
				$contact_infos[ $i ]['title']     = sanitize_text_field( $info['title'] );
				$contact_infos[ $i ]['sub_title'] = sanitize_text_field( $info['sub_title'] );
				$i++;
			}
		endif;
		$instance['contact_infos'] = ( ! empty( $new_instance['contact_infos'] ) ) ? $contact_infos : '';

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
		$title         = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$contact_infos = ( ! empty( $instance['contact_infos'] ) ) ? $instance['contact_infos'] : array();
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'logistico' ); ?></label> 
			<input class="widefat logistico_special-wfield" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<div class="logistico-repeater-info-wrapper" data-id-name="logistico_contacts" data-field-id="contact_infos" data-placeholder="<?php esc_attr_e( 'Info Title', 'logistico' ); ?>" data-subtitle-placeholder="<?php esc_attr_e( 'Sub Title', 'logistico' ); ?>">
			<div id="sl_repeater_main" class="logistico-repeater-info">
			<?php
			$index = 0;
			foreach ( $contact_infos as $item ) :
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
							<label for="<?php echo esc_attr( $this->get_field_id( 'contact_infos' ) . '[' . esc_attr( $index ) . '][thumb-id]' ); ?>">
								<?php if ( ! empty( $item['thumb'] ) ) : ?>
									<div class="repeater-thumb-wrap"><img src="<?php echo esc_url( $item['thumb'] ); ?>"></div>
								<?php endif; ?>
								<a class="button thickbox_special"><span><?php esc_html_e( 'Select an Icon', 'logistico' ); ?></span></a>
								<?php if ( ! empty( $item['thumb'] ) ) : ?>
								<button style="display: inline-block;" class="sl-widget-media-remove button"><?php esc_html_e( 'Remove image', 'logistico' ); ?></button>
								<?php endif; ?>
								<input class="widefat fa_sepcial_wfield sl_media_input" id="<?php echo esc_attr( $this->get_field_id( 'contact_infos' ) . '-' . esc_attr( $index ) . '-thumb-id' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_infos' ) . '[' . esc_attr( $index ) . '][thumb]' ); ?>" type="hidden" value="<?php echo esc_attr( $item['thumb'] ); ?>"/>
								<div class="fa_append_element" id="contact_info_icon-<?php echo esc_attr( $this->get_field_id( 'contact_infos' ) . '[' . esc_attr( $index ) . '][thumb-id]' ); ?>" style="display: none"></div>
							</label>
							<br>
							<br>
						</div>
						<input class="sl-repater-title-in" type="text" placeholder="<?php esc_attr_e( 'Info Title', 'logistico' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_infos' ) . '[' . esc_attr( $index ) . '][title]' ); ?>" value="<?php echo ( ! empty( $item['title'] ) ) ? esc_attr( $item['title'] ) : ''; ?>">
						<input class="sl-repater-sub_title-in" type="text" placeholder="<?php esc_attr_e( 'Info Title', 'logistico' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_infos' ) . '[' . esc_attr( $index ) . '][sub_title]' ); ?>" value="<?php echo ( ! empty( $item['sub_title'] ) ) ? esc_attr( $item['sub_title'] ) : ''; ?>">
						<div class="repater-alighment">
							<button type="button" class="button-link button-link-delete repeater-control-remove"><?php esc_html_e( 'Delete', 'logistico' ); ?></button>
						</div>
					</div>
				</div>
				<?php
				$index++;
				endforeach;
			?>
			</div>
			<a class="button logistico-widget-add-item" data-widget-type="contact_info"><?php esc_html_e( 'Add Info', 'logistico' ); ?></a>
		</div>
		<?php
	}

} // class LogisticoContacts


if ( ! function_exists( 'logistico_widget_init' ) ) {
	function logistico_widget_init() {
		register_widget( 'LogisticoContacts' );
	}
}
add_action( 'widgets_init', 'logistico_widget_init' );
