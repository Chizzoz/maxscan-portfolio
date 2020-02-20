<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$sahu_so_countdown = unserialize(get_option('sahu_so_countdown'));	
?>
<script>
jQuery(document).ready(function() {
		
		jQuery('#countdown_date').datepicker({dateFormat: 'yy/mm/dd',minDate: '0'});
		
	});
</script>

<table class="form-table">
	
	<tr>
		<th><?php _e('Enable Countdown','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>	
	<tr class="radio-span" style="border-bottom:none;">
		<tr class="radio-span" >
		<td>
			<span style="margin-bottom:10px;display: block;">
				<input type="radio" name="cnt_enable" value="yes" id="cnt_enable" <?php if($sahu_so_countdown['cnt_enable'] == "yes") { echo "checked"; } ?> />&nbsp;<?php _e('Yes','SAHU_SO_TEXT_DOMAIN'); ?><br>
			</span>
			<span>	
				<input type="radio" name="cnt_enable" value="no" id="cnt_enable" <?php if($sahu_so_countdown['cnt_enable'] == "no") { echo "checked"; } ?>  />&nbsp;<?php _e('No','SAHU_SO_TEXT_DOMAIN'); ?><br>
			</span>
		</td>
	</tr>
	</tr>
	
	<tr>
		<th><?php _e('End Date','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
		<input type="text" class="pro_text" id="countdown_date" name="countdown_date" readonly placeholder="<?php _e('Select Your Countdown Start date','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_countdown['countdown_date']; ?>" />
		</td>
	</tr>
	
	<tr class="radio-span" >
		<td>
				<button class="portfolio_read_more_btn "  onclick="sahu_save_data_countdown()"><?php _e('Save Settings','SAHU_SO_TEXT_DOMAIN'); ?></button>
				<button class="portfolio_demo_btn"  onclick="sahu_reset_data_countdown()"><?php _e('Reset Default Settings','SAHU_SO_TEXT_DOMAIN'); ?></button>
		</td>
		
	</tr>							
	
</table>


<script>
function sahu_save_data_countdown(){
 jQuery("#sahu_loding_image").show();
 var cnt_enable = jQuery('input:radio[name="cnt_enable"]:checked').val();
 var countdown_date = jQuery("#countdown_date").val();
 
 
 
 
 	jQuery.ajax(
            {
	    	    type: "POST",
		        url: location.href,
	
		        data : {
			    'action_countdown':'sahu_sop_countdown',
			    'cnt_enable':cnt_enable,
			    'countdown_date':countdown_date,
			   
			        },
                success : function(data){
									jQuery("#sahu_loding_image").fadeOut();	
									jQuery(".dialog-button").click();
                                   //location.href='?page=sahu_coming_soon_wp';
								  
                                   }			
            });
 
}
</script>	
<?php
if(isset($_POST['action_countdown'])=="sahu_sop_countdown") {
$cnt_enable       = sanitize_option('cnt_enable', $_POST['cnt_enable']);
$countdown_date          = stripslashes(sanitize_text_field($_POST['countdown_date']));
			
$countdown = serialize( array(
	'cnt_enable' 		       => $cnt_enable,
	'countdown_date' 		       => $countdown_date,
	
	) );

update_option('sahu_so_countdown', $countdown);
}
 ?>
 
 
  <script>
 
	function sahu_reset_data_countdown(){
		if (confirm('Are you sure you want to reset this setting?')) {
    
		} else {
		   return;
		}
		jQuery("#sahu_loding_image").show();
		jQuery.ajax(
		{
			type: "POST",
			url: location.href,

			data : {
			'reset_action_countdown':'action_seo_countdown',
			
		   
				},
			success : function(data){
				jQuery("#sahu_loding_image").fadeOut();
				jQuery(".dialog-button").click();
				location.href='?page=sahu_site_offline_wp';
		  
		   }			
		});
	 
	}
	
</script>

<?php
if(isset($_POST['reset_action_countdown'])=="action_seo_countdown") {
	
	$sahu_countdown = serialize( array(
	
	'cnt_enable' 		       => "yes",
	'countdown_date' 		       => "01/12/2019",
	'days' 		                   => "days",
	'hours' 		               => "hours",
	'minutes' 		               => "minutes",
	'seconds' 		               => "seconds",
	
	) );

	update_option('sahu_so_countdown', $sahu_countdown);
}
 ?>