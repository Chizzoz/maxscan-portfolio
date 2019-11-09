<?php
/**
 * Define customizer custom classes
 *
 * @package Logistico
 * @since 1.0.0
 */

if( class_exists( 'WP_Customize_Control' ) ) {

/**
 * Switch button customize control.
 *
 * @since 1.0.0
 * @access public
 */
class Logistico_Customize_Switch_Control extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'switch';

    /**
     * Displays the control content.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render_content() {
?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
            <div class="switch_options">
                <?php 
                    $show_choices = $this->choices;
                    foreach ( $show_choices as $key => $value ) {
                        echo '<span class="switch_part '.esc_attr( $key ).'" data-switch="'.esc_attr( $key ).'">'. esc_html( $value ).'</span>';
                    }
                ?>
                <input type="hidden" id="mt_switch_option" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
            </div>
        </label>
<?php
    }
} // end Logistico_Customize_Switch_Control


/**
 * Radio image customize control.
 *
 * @since  1.0.0
 * @access public
 */
class Logistico_Customize_Control_Radio_Image extends WP_Customize_Control {
    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'radio-image';

    /**
     * Loads the jQuery UI Button script and custom scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
        wp_enqueue_script( 'jquery-ui-button' );
    }

    /**
     * Add custom JSON parameters to use in the JS template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function to_json() {
        parent::to_json();

        // We need to make sure we have the correct image URL.
        foreach ( $this->choices as $value => $args )
            $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();
        $this->json['value']   = $this->value();
        $this->json['id']      = $this->id;
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

        <div class="buttonset">

            <# for ( key in data.choices ) { #>

                <input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #> /> 

                <label for="{{ data.id }}-{{ key }}">
                    <span class="screen-reader-text">{{ data.choices[ key ]['label'] }}</span>
                    <img src="{{ data.choices[ key ]['url'] }}" title="{{ data.choices[ key ]['label'] }}" alt="{{ data.choices[ key ]['label'] }}" />
                </label>
            <# } #>

        </div><!-- .buttonset -->
    <?php }
} // end Logistico_Customize_Control_Radio_Image


} //end WP_Customize_Control