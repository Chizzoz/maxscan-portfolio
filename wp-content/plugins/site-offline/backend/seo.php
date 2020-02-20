<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$sahu_so_seo = unserialize(get_option('sahu_so_seo'));	
?>
<table class="form-table">
							
	<tr>
		<th><?php _e('Favicon Icon','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				
				<img src="<?php echo $sahu_so_seo['sahu_so_favicon']; ?>" class="sahu-csw-admin-img" />
				
				<input type="button" id="upload-background" name="upload-background" value="Upload Image" class="button-primary rcsp_media_upload"  />
				<input type="hidden" id="sahu_so_favicon" name="sahu_so_favicon" class="rcsp_label_text"  value="<?php echo $sahu_so_seo['sahu_so_favicon']; ?>"  readonly="readonly" placeholder="No Media Selected" />
				
		</td>
		
	</tr>
	
	
	<tr>
		<th><?php _e('SEO Title','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				<input type="text" class="pro_text" id="sahu_so_seo_title" name="sahu_so_seo_title" placeholder="<?php _e('Enter Your SEO Title Here...','SAHU_SO_TEXT_DOMAIN'); ?>" size="56" value="<?php echo $sahu_so_seo['sahu_so_seo_title']; ?>" />
	
		</td>
		
	</tr>

	<tr>
		<th><?php _e('SEO Description','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				<textarea rows="6"  class="pro_text" id="sahu_so_seo_desc" name="sahu_so_seo_desc" placeholder="<?php _e('Enter Your SEO Description Here...','SAHU_SO_TEXT_DOMAIN'); ?>"><?php echo $sahu_so_seo['sahu_so_seo_desc']; ?></textarea>
	
		</td>
		
	</tr>

	<tr>
		<th><?php _e('Google Analytiso Script','SAHU_SO_TEXT_DOMAIN'); ?></th>
	</tr>
	<tr class="radio-span" >
		<td>
				<textarea rows="6"  class="pro_text" id="sahu_so_seo_analytiso" name="sahu_so_seo_analytiso" placeholder="<?php _e('Enter Your Google Analytiso Script Here','SAHU_SO_TEXT_DOMAIN'); ?>"><?php echo $sahu_so_seo['sahu_so_seo_analytiso']; ?></textarea>
	
		</td>
		
	</tr>
<tr class="radio-span" >
		<td>
				<button class="portfolio_read_more_btn "  onclick="sahu_save_data_seo()"><?php _e('Save Settings','SAHU_SO_TEXT_DOMAIN'); ?></button>
				<button class="portfolio_demo_btn" onclick="sahu_reset_data_seo()" ><?php _e('Reset Default Setting','SAHU_SO_TEXT_DOMAIN'); ?></button>
		</td>
		
	</tr>		
	
</table>



<script>
function sahu_save_data_seo(){
 jQuery("#sahu_loding_image").show();
 var sahu_so_favicon = jQuery("#sahu_so_favicon").val();
 var sahu_so_seo_title = jQuery("#sahu_so_seo_title").val();
 var sahu_so_seo_desc = jQuery("#sahu_so_seo_desc").val();
 var sahu_so_seo_analytiso = jQuery("#sahu_so_seo_analytiso").val();
 
 
 	jQuery.ajax(
            {
	    	    type: "POST",
		        url: location.href,
	
		        data : {
			    'action_seo':'sahu_sop_seo',
			    'sahu_so_favicon':sahu_so_favicon,
			    'sahu_so_seo_title':sahu_so_seo_title,
			    'sahu_so_seo_desc':sahu_so_seo_desc,
			    'sahu_so_seo_analytiso':sahu_so_seo_analytiso,
			   
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
if(isset($_POST['action_seo'])=="sahu_sop_seo") {
$sahu_so_favicon          = sanitize_text_field($_POST['sahu_so_favicon']);
$sahu_so_seo_title          = stripslashes(sanitize_text_field($_POST['sahu_so_seo_title']));
$sahu_so_seo_desc          = stripslashes($_POST['sahu_so_seo_desc']);
$sahu_so_seo_analytiso          = stripslashes($_POST['sahu_so_seo_analytiso']);
			
			
$seo = serialize( array(
	'sahu_so_favicon' 		       => $sahu_so_favicon,
	'sahu_so_seo_title' 		       => $sahu_so_seo_title,
	'sahu_so_seo_desc' 		       => $sahu_so_seo_desc,
	'sahu_so_seo_analytiso' 		       => $sahu_so_seo_analytiso,
	
	) );

update_option('sahu_so_seo', $seo);
}
 ?>
 
 
  <script>
 
	function sahu_reset_data_seo(){
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
			'reset_action_seo':'action_seo_reset',
			
		   
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
if(isset($_POST['reset_action_seo'])=="action_seo_reset") {
	
	$default_url2 =  SAHU_SO_PLUGIN_URL.'assets/img/logo.png'; 
	
	
	$sahu_seo = serialize( array(
	'sahu_so_favicon' 		       => $default_url2,
	'sahu_so_seo_title' 		   => "Coming Soon",
	'sahu_so_seo_desc' 		       => "",
	'sahu_so_seo_analytiso' 	   => "",
	
	) );

	update_option('sahu_so_seo', $sahu_seo);
}
 ?>