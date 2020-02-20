<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
function sahu_site_offline_wp_script()
{
	wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
	wp_enqueue_style('thickbox');
	wp_enqueue_style('sahu_so-bootstrap_sos', SAHU_SO_PLUGIN_URL.'assets/css/bootstrap.css');
	wp_enqueue_style('sahu_so-font-awesome_min', SAHU_SO_PLUGIN_URL.'assets/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('sahu_so-rsop_jquery-ui', SAHU_SO_PLUGIN_URL.'assets/css/rcsp_jquery-ui.css');
	wp_enqueue_style('sahu_so-backend', SAHU_SO_PLUGIN_URL.'assets/css/backend.css');
	
	//dailog pop so
	wp_enqueue_style('sahu_so-dialog', SAHU_SO_PLUGIN_URL.'assets/css/dialog/dialog.css');
	wp_enqueue_style('sahu_so-dialog-box-style', SAHU_SO_PLUGIN_URL.'assets/css/dialog/dialog-box-style.css');
	wp_enqueue_style('sahu_so-dialog-wilma', SAHU_SO_PLUGIN_URL.'assets/css/dialog/dialog-jamie.css');
	
	
	wp_enqueue_script('theme-preview');
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script('sahu_so-media-uploads',SAHU_SO_PLUGIN_URL.'assets/js/media-upload-script.js',array('media-upload','thickbox','jquery'));
	wp_enqueue_script('sahu_so-time-picker', SAHU_SO_PLUGIN_URL.'assets/js/jquery-ui-timepicker.js',array('jquery','jquery-ui-datepicker'));
	wp_enqueue_script('sahu_so-my-color-picker-script', SAHU_SO_PLUGIN_URL.'assets/js/my-color-picker-script.js', array( 'wp-color-picker' ), false, true );
	wp_enqueue_script('sahu_so-bootstrap_min_js',SAHU_SO_PLUGIN_URL.'assets/js/bootstrap.min.js');
	
	//dailog pop js
	wp_enqueue_script('sahu_so-snap-svg-min',SAHU_SO_PLUGIN_URL.'assets/js/dialog/snap.svg-min.js');
	wp_enqueue_script('sahu_so-modernizr-custom',SAHU_SO_PLUGIN_URL.'assets/js/dialog/modernizr.custom.js');
	wp_enqueue_script('sahu_so-classie',SAHU_SO_PLUGIN_URL.'assets/js/dialog/classie.js');
	wp_enqueue_script('sahu_so-dialogFx',SAHU_SO_PLUGIN_URL.'assets/js/dialog/dialogFx.js'); 
	
}
add_action( 'admin_notices', 'sahu_siteoff_line_review' );
function sahu_siteoff_line_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'sahu_siteoff_line_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('sahu_siteoff_line_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible wpsm-siteoff-line-review-notice">
		<div style="float:left;margin-right:10px;margin-bottom:5px;">
			<img style="width:100%;width: 100px;height: auto;" src="<?php echo SAHU_SO_PLUGIN_URL.'assets/images/icon-show.png'; ?>" />
		</div>
		<p style="font-size:17px;">'Hi! We saw you have been using <strong>Site Offline plugin</strong> for a few days and wanted to ask for your help to <strong>make the plugin better</strong>.We just need a minute of your time to rate the plugin. Thank you!</p>
		<p style="font-size:17px;"><strong><?php _e( '~ Chandra Shekhar Sahu', '' ); ?></strong></p>
		<p style="font-size:18px;"> 
			<a style="color: #fff;background: #ef4238;padding: 3px 11px 7px 11px;border-radius: 4px;text-decoration:none" href="https://wordpress.org/support/plugin/site-offline/reviews/?filter=5#new-post" class="wpsm-siteoff-line-dismiss-review-notice wpsm-siteoff-line-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a style="color: #fff;background: #27d63c;padding: 3px 11px 7px 11px;border-radius: 4px;text-decoration:none" href="#"  class="wpsm-siteoff-line-dismiss-review-notice wpsm-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a style="color: #fff;background: #31a3dd;padding: 3px 11px 7px 11px;border-radius: 4px;text-decoration:none" href="#" class="wpsm-siteoff-line-dismiss-review-notice wpsm-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.wpsm-siteoff-line-dismiss-review-notice', function( event ) {
				if ( $(this).hasClass('wpsm-siteoff-line-review-out') ) {
					var wpsm_rate_data_val = "1";
				}
				if ( $(this).hasClass('wpsm-rate-later') ) {
					var wpsm_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('wpsm-rated') ) {
					var wpsm_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'sahu_siteoff_line_dismiss_review',
					sahu_rate_data_siteoff_line : wpsm_rate_data_val
				});
				
				$('.wpsm-siteoff-line-review-notice').hide();
				//location.reload();
			});
			
			$(document).on('click', ' .wpsm-siteoff-line-review-notice .notice-dismiss', function( event ) {
			//alert("hello");
				var wpsm_rate_data_val = "2";

				$.post( ajaxurl, {
					action: 'sahu_siteoff_line_dismiss_review',
					sahu_rate_data_siteoff_line : wpsm_rate_data_val
				});
				
				$('.wpsm-siteoff-line-review-notice').hide();
				//location.reload();
			});
			
			
		});
	</script>
	<?php
}

add_action( 'wp_ajax_sahu_siteoff_line_dismiss_review', 'sahu_siteoff_line_dismiss_review' );
function sahu_siteoff_line_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['sahu_rate_data_siteoff_line']=="1"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['sahu_rate_data_siteoff_line']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['sahu_rate_data_siteoff_line']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		
	}
	update_option( 'sahu_siteoff_line_review', $review );
	die;
}
?>