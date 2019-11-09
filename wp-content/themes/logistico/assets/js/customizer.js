/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-branding h2' ).text( to );
		} );
	} );
	
	wp.customize( 'header_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.lgtico-breadcrumb-section' ).css( {
				'background-color': to
			} );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.lgtico-breadcrumb-content-wrap h1.logistico-breadcrumb-title, .lgtico-breadcrumb-content-wrap h5.post_meta_output' ).css( {
					'color': '#202427'
				} );
			} else {
				$( '.lgtico-breadcrumb-content-wrap h1.logistico-breadcrumb-title, .lgtico-breadcrumb-content-wrap h5.post_meta_output' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	
	wp.customize( 'footer_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#colophon' ).css( {
					'background-color': '#22304A'
				} );
			} else {
				$( '#colophon' ).css( {
					'background-color': to
				} );
			}
		} );
	} );

	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.logistico-footer-widget, .logistico-footer-widget li, .logistico-footer-widget p, .logistico-footer-widget h3,  .logistico-footer-widget h4' ).css( {
					'color': '#FFFFFF'
				} );
			} else {
				$( '.logistico-footer-widget, .logistico-footer-widget li, .logistico-footer-widget p, .logistico-footer-widget h3, .logistico-footer-widget h4' ).css( {
					'color': to
				} );
			}
		} );
	} );


	wp.customize( 'footer_anchor_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.logistico-footer-widget a' ).css( {
					'color': '#666666'
				} );
			} else {
				$( '.logistico-footer-widget a' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	
	wp.customize( 'footer_bottom_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.lgtico-footer-bottom' ).css( {
					'background-color': '#22304A'
				} );
			} else {
				$( '.lgtico-footer-bottom' ).css( {
					'background-color': to
				} );
			}
		} );
	} );

	wp.customize( 'footer_bottom_text_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.lgtico-footer-bottom p, .lgtico-copywright, .lgtico-copywright li' ).css( {
					'color': '#FFFFFF'
				} );
			} else {
				$( '.lgtico-footer-bottom p, .lgtico-copywright, .lgtico-copywright li' ).css( {
					'color': to
				} );
			}
		} );
	} );


	wp.customize( 'footer_bottom_anchor_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.lgtico-footer-bottom a, .lgtico-copywright a, .lgtico-copywright li a' ).css( {
					'color': '#666666'
				} );
			} else {
				$( '.lgtico-footer-bottom a, .lgtico-copywright a, .lgtico-copywright li a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	wp.customize( 'logistic_site_layout', function( value ) {
		value.bind( function( to ) {
			if ( 'boxed_layout' === to ) {
				$( 'body' ).addClass('box-layout-page');
			} else {
				$( 'body' ).removeClass('box-layout-page');
			}
		} );
	} );



} )( jQuery );
