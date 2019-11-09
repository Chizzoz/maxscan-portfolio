<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Moving_Company_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'moving-company-lite' ),
				'family'      => esc_html__( 'Font Family', 'moving-company-lite' ),
				'size'        => esc_html__( 'Font Size',   'moving-company-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'moving-company-lite' ),
				'style'       => esc_html__( 'Font Style',  'moving-company-lite' ),
				'line_height' => esc_html__( 'Line Height', 'moving-company-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'moving-company-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'moving-company-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'moving-company-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'moving-company-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'moving-company-lite' ),
        'Acme' => __( 'Acme', 'moving-company-lite' ),
        'Anton' => __( 'Anton', 'moving-company-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'moving-company-lite' ),
        'Arimo' => __( 'Arimo', 'moving-company-lite' ),
        'Arsenal' => __( 'Arsenal', 'moving-company-lite' ),
        'Arvo' => __( 'Arvo', 'moving-company-lite' ),
        'Alegreya' => __( 'Alegreya', 'moving-company-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'moving-company-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'moving-company-lite' ),
        'Bangers' => __( 'Bangers', 'moving-company-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'moving-company-lite' ),
        'Bad Script' => __( 'Bad Script', 'moving-company-lite' ),
        'Bitter' => __( 'Bitter', 'moving-company-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'moving-company-lite' ),
        'BenchNine' => __( 'BenchNine', 'moving-company-lite' ),
        'Cabin' => __( 'Cabin', 'moving-company-lite' ),
        'Cardo' => __( 'Cardo', 'moving-company-lite' ),
        'Courgette' => __( 'Courgette', 'moving-company-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'moving-company-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'moving-company-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'moving-company-lite' ),
        'Cuprum' => __( 'Cuprum', 'moving-company-lite' ),
        'Cookie' => __( 'Cookie', 'moving-company-lite' ),
        'Chewy' => __( 'Chewy', 'moving-company-lite' ),
        'Days One' => __( 'Days One', 'moving-company-lite' ),
        'Dosis' => __( 'Dosis', 'moving-company-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'moving-company-lite' ),
        'Economica' => __( 'Economica', 'moving-company-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'moving-company-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'moving-company-lite' ),
        'Francois One' => __( 'Francois One', 'moving-company-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'moving-company-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'moving-company-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'moving-company-lite' ),
        'Handlee' => __( 'Handlee', 'moving-company-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'moving-company-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'moving-company-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'moving-company-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'moving-company-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'moving-company-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'moving-company-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'moving-company-lite' ),
        'Kanit' => __( 'Kanit', 'moving-company-lite' ),
        'Lobster' => __( 'Lobster', 'moving-company-lite' ),
        'Lato' => __( 'Lato', 'moving-company-lite' ),
        'Lora' => __( 'Lora', 'moving-company-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'moving-company-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'moving-company-lite' ),
        'Merriweather' => __( 'Merriweather', 'moving-company-lite' ),
        'Monda' => __( 'Monda', 'moving-company-lite' ),
        'Montserrat' => __( 'Montserrat', 'moving-company-lite' ),
        'Muli' => __( 'Muli', 'moving-company-lite' ),
        'Marck Script' => __( 'Marck Script', 'moving-company-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'moving-company-lite' ),
        'Open Sans' => __( 'Open Sans', 'moving-company-lite' ),
        'Overpass' => __( 'Overpass', 'moving-company-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'moving-company-lite' ),
        'Oxygen' => __( 'Oxygen', 'moving-company-lite' ),
        'Orbitron' => __( 'Orbitron', 'moving-company-lite' ),
        'Patua One' => __( 'Patua One', 'moving-company-lite' ),
        'Pacifico' => __( 'Pacifico', 'moving-company-lite' ),
        'Padauk' => __( 'Padauk', 'moving-company-lite' ),
        'Playball' => __( 'Playball', 'moving-company-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'moving-company-lite' ),
        'PT Sans' => __( 'PT Sans', 'moving-company-lite' ),
        'Philosopher' => __( 'Philosopher', 'moving-company-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'moving-company-lite' ),
        'Poiret One' => __( 'Poiret One', 'moving-company-lite' ),
        'Quicksand' => __( 'Quicksand', 'moving-company-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'moving-company-lite' ),
        'Raleway' => __( 'Raleway', 'moving-company-lite' ),
        'Rubik' => __( 'Rubik', 'moving-company-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'moving-company-lite' ),
        'Russo One' => __( 'Russo One', 'moving-company-lite' ),
        'Righteous' => __( 'Righteous', 'moving-company-lite' ),
        'Slabo' => __( 'Slabo', 'moving-company-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'moving-company-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'moving-company-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'moving-company-lite' ),
        'Sacramento' => __( 'Sacramento', 'moving-company-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'moving-company-lite' ),
        'Tangerine' => __( 'Tangerine', 'moving-company-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'moving-company-lite' ),
        'VT323' => __( 'VT323', 'moving-company-lite' ),
        'Varela Round' => __( 'Varela Round', 'moving-company-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'moving-company-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'moving-company-lite' ),
        'Volkhov' => __( 'Volkhov', 'moving-company-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'moving-company-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'moving-company-lite' ),
			'100' => esc_html__( 'Thin',       'moving-company-lite' ),
			'300' => esc_html__( 'Light',      'moving-company-lite' ),
			'400' => esc_html__( 'Normal',     'moving-company-lite' ),
			'500' => esc_html__( 'Medium',     'moving-company-lite' ),
			'700' => esc_html__( 'Bold',       'moving-company-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'moving-company-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'moving-company-lite' ),
			'normal'  => esc_html__( 'Normal', 'moving-company-lite' ),
			'italic'  => esc_html__( 'Italic', 'moving-company-lite' ),
			'oblique' => esc_html__( 'Oblique', 'moving-company-lite' )
		);
	}
}
