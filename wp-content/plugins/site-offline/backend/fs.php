<?php
if ( ! defined( 'ABSPATH' ) ) exit;
 ?>
<script>
	(function() {
		var dlgtrigger = document.querySelector( '[data-dialog]' ),
			somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
			// svg..
			morphEl = somedialog.querySelector( '.morph-shape' ),
			s = Snap( morphEl.querySelector( 'svg' ) ),
			path = s.select( 'path' ),
			steps = { 
				open : morphEl.getAttribute( 'data-morph-open' ),
				close : morphEl.getAttribute( 'data-morph-close' )
			},
			dlg = new DialogFx( somedialog, {
				onOpenDialog : function( instance ) {
					// animate path
					setTimeout(function() {
						path.stop().animate( { 'path' : steps.open }, 1500, mina.elastic );
					}, 250 );
				},
				onCloseDialog : function( instance ) {
					// animate path
					path.stop().animate( { 'path' : steps.close }, 250, mina.easeout );
				}
			} );
		dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );
	})();
</script>
		
		
