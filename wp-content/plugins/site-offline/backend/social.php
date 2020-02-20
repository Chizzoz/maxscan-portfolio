<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$sahu_so_social = unserialize(get_option('sahu_so_social'));	
?>
<table class="form-table">
	<tr>
		<th><?php _e('Facbook','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				
			
			<input type="text" class="pro_text" id="sahu_so_fb" name="sahu_so_fb" placeholder="<?php _e('Enter Facebook profile url','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_social['sahu_so_fb']; ?>" />
				<span style="color: #8e8e8e;"> Note : Enter complete profile url with "http://" example  : https://www.facebook.com/sahufb/</span>		
							
		</td>
		
	</tr>
	<tr>
		<th><?php _e('Twitter','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				
			
			<input type="text" class="pro_text" id="sahu_so_twit" name="sahu_so_twit" placeholder="<?php _e('Enter Twitter profile url','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_social['sahu_so_twit']; ?>" />
			<span style="color: #8e8e8e;">Note : Enter complete profile url with "http://" example  :https://twitter.com/sahu1</span>			
							
		</td>
		
	</tr>
		
		<tr>
			<th><?php _e('LinkedIn','SAHU_SO_TEXT_DOMAIN'); ?></th>
		</tr>
		<tr class="radio-span" >
			<td>
					
				
				<input type="text" class="pro_text" id="sahu_so_ln" name="sahu_so_ln" placeholder="<?php _e('Enter LinkedIn profile url','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_social['sahu_so_ln']; ?>" />
							
					<span style="color: #8e8e8e;">Note : Enter complete profile url with "http://" example  : https://www.linkedin.com/</span>			
			</td>
			
		</tr>
		
		<tr>
			<th> <?php _e('Instagram','SAHU_SO_TEXT_DOMAIN'); ?></th>
		</tr>
		<tr class="radio-span" >
			<td>
					
				
				<input type="text" class="pro_text" id="sahu_so_gp" name="sahu_so_gp" placeholder="<?php _e('Enter Instagram profile url ','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_social['sahu_so_gp']; ?>" />
				<span style="color: #8e8e8e;">Note : Enter complete profile url with "http://" </span>			
								
			</td>
			
		</tr>
		<tr class="radio-span" >
		<td>
				<button class="portfolio_read_more_btn "  onclick="sahu_save_data_social()"><?php _e('Save Settings','SAHU_SO_TEXT_DOMAIN'); ?></button>
				<button class="portfolio_demo_btn" onclick="sahu_reset_data_social()" ><?php _e('Reset Default Setting','SAHU_SO_TEXT_DOMAIN'); ?></button>
		</td>
		
	</tr>	
</table>

<script>
function sahu_save_data_social(){
 jQuery("#sahu_loding_image").show();
 var sahu_so_fb = jQuery("#sahu_so_fb").val();
 var sahu_so_twit = jQuery("#sahu_so_twit").val();
 var sahu_so_ln = jQuery("#sahu_so_ln").val();
 var sahu_so_gp = jQuery("#sahu_so_gp").val();
 
 
 	jQuery.ajax(
            {
	    	    type: "POST",
		        url: location.href,
	
		        data : {
			    'action_social':'sahu_sop_social',
			    'sahu_so_fb':sahu_so_fb,
			    'sahu_so_twit':sahu_so_twit,
			    'sahu_so_ln':sahu_so_ln,
			    'sahu_so_gp':sahu_so_gp,
			    
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
if(isset($_POST['action_social'])=="sahu_sop_social") {
$sahu_so_fb          = sanitize_text_field($_POST['sahu_so_fb']);
$sahu_so_twit          = sanitize_text_field($_POST['sahu_so_twit']);
$sahu_so_ln          = sanitize_text_field($_POST['sahu_so_ln']);
$sahu_so_gp          = sanitize_text_field($_POST['sahu_so_gp']);
			
			
$social = serialize( array(
	'sahu_so_fb' 		       => $sahu_so_fb,
	'sahu_so_twit' 		       => $sahu_so_twit,
	'sahu_so_ln' 		       => $sahu_so_ln,
	'sahu_so_gp'    		   => $sahu_so_gp,
	
	) );

update_option('sahu_so_social', $social);
}
 ?>
 
 
 <script>
 
	function sahu_reset_data_social(){
		if (confirm('Are you sure you want to reste this setting?')) {
    
		} else {
		   return;
		}
		jQuery("#sahu_loding_image").show();
		jQuery.ajax(
		{
			type: "POST",
			url: location.href,

			data : {
			'reset_action_social':'action_social_reset',
			
		   
				},
			success : function(data){
				jQuery("#sahu_loding_image").fadeOut();
				jQuery(".dialog-button").click();
				location.href='?page=sahu_coming_soon_wp';
		  
		   }			
		});
	 
	}
	
</script>

<?php
if(isset($_POST['reset_action_social'])=="action_social_reset") {
	
	
	$sahu_social = serialize( array(
	'sahu_so_fb' 		       => "#",
	'sahu_so_twit' 		       => "#",
	'sahu_so_ln' 		       => "#",
	'sahu_so_gp'    		   => "#",
	
	) );

	update_option('sahu_so_social', $sahu_social);
}
 ?>