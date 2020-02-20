<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$sahu_so_design = unserialize(get_option('sahu_so_design'));	
?>
<Script>
	// Title Font Size Slider	
	jQuery(function() {
		jQuery( "#button-size-slider" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 120,
			min:10,
			slide: function( event, ui ) {
			jQuery( "#sahu_headline_ft_size" ).val( ui.value );
			}
		});
			
		jQuery( "#button-size-slider" ).slider("value",<?php if($sahu_so_design['sahu_headline_ft_size']!=""){ echo  $sahu_so_design['sahu_headline_ft_size']; } else { echo "18"; }?>  );
		jQuery( "#sahu_headline_ft_size" ).val( jQuery( "#button-size-slider" ).slider( "value") );

	});
</script>

<Script>
	//Description Fonts Size Slider
	jQuery(function() {
		jQuery( "#button-size-slider3" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 50,
			min:10,
			slide: function( event, ui ) {
			jQuery( "#sahu_desc_ft_size" ).val( ui.value );
			}
		});

	jQuery( "#button-size-slider3" ).slider("value",<?php if($sahu_so_design['sahu_desc_ft_size']!=""){ echo $sahu_so_design['sahu_desc_ft_size']; } else { echo "16"; }?> );
	jQuery( "#sahu_desc_ft_size" ).val( jQuery( "#button-size-slider3" ).slider( "value") );

	});
</script>


		<table class="form-table">
			<tr>
				<th><?php _e('Select Background','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>
					<span style="margin-bottom:10px;display: block;">
						<input type="radio" name="sahu_so_select_bg" value="0" id="sahu_so_select_bg" <?php if($sahu_so_design['sahu_so_select_bg'] == "0") { echo "checked"; } ?> />&nbsp;<?php _e('Color Background','SAHU_SO_TEXT_DOMAIN'); ?><br>
					</span>
					<span>	
						<input type="radio" name="sahu_so_select_bg" value="1" id="sahu_so_select_bg" <?php if($sahu_so_design['sahu_so_select_bg'] == "1") { echo "checked"; } ?>  />&nbsp;<?php _e('Image Background','SAHU_SO_TEXT_DOMAIN'); ?><br>
					</span>
				</td>
			</tr>
			<tr>
				<th><?php _e('Background Color','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>						
					<input id="sahu_so_bg_clr" name="sahu_so_bg_clr" type="text" value="<?php echo $sahu_so_design['sahu_so_bg_clr']; ?>" class="my-color-field" data-default-color="#ffffff" />

				</td>				
			</tr>
			<tr>
				<th><?php _e('Background Image','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>						
						<img src="<?php echo $sahu_so_design['sahu_so_bg_img'] ?>" class="sahu-csw-admin-img" />
						<input type="button" id="upload-background" name="upload-background" value="Upload Image" class="button-primary rcsp_media_upload"  />
						<input type="hidden" id="sahu_so_bg_img" name="sahu_so_bg_img" class="rcsp_label_text"  value="<?php echo $sahu_so_design['sahu_so_bg_img'] ?>"  readonly="readonly" placeholder="No Media Selected" />
						
				</td>				
			</tr>
			<tr>
				<th><?php _e('Headline Color','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>						
					<input id="sahu_headeline_ft_clr" name="sahu_headeline_ft_clr" type="text" value="<?php echo $sahu_so_design['sahu_headeline_ft_clr'] ?>" class="my-color-field" data-default-color="#ffffff" />

				</td>				
			</tr>

			<tr>
				<th><?php _e('Description Color','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>						
					<input id="sahu_desc_ft_clr" name="sahu_desc_ft_clr" type="text" value="<?php echo $sahu_so_design['sahu_desc_ft_clr'] ?>" class="my-color-field" data-default-color="#ffffff" />

				</td>				
			</tr>

			<tr>
				<th><?php _e('Countdown Color','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>
						
					<input id="sahu_cnt_ft_clr" name="sahu_cnt_ft_clr" type="text" value="<?php echo $sahu_so_design['sahu_cnt_ft_clr'] ?>" class="my-color-field" data-default-color="#ffffff" />

				</td>
				
			</tr>			

			<tr>
				<th><?php _e('Social Icon Color','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>
						
					<input id="sahu_social_clr" name="sahu_social_clr" type="text" value="<?php echo $sahu_so_design['sahu_social_clr'] ?>" class="my-color-field" data-default-color="#ffffff" />

				</td>
				
			</tr>	

			<tr>
				<th><?php _e('Headline Font Size','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr  >
				<td class="text-and-color-panel">
					<div id="button-size-slider" class="size-slider" style="width: 25%;display:inline-block"></div>
					<input type="text" class="range-slider-font" id="sahu_headline_ft_size" name="sahu_headline_ft_size"  readonly="readonly">
					<span class="slider-text-span">Px</span>
				</td>
				
			</tr>
			<tr>
				<th><?php _e('Description Font Size','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr>
				<td class="text-and-color-panel">
					<div id="button-size-slider3" class="size-slider" style="width: 25%;display:inline-block"></div>
					<input type="text" class="range-slider-font" id="sahu_desc_ft_size" name="sahu_desc_ft_size"  readonly="readonly">
					<span class="slider-text-span">Px</span>
				</td>
				
			</tr>

			<tr>
				<th> <?php _e('Font Family','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr>
				<?php $sahu_ft_st = $sahu_so_design['sahu_ft_st']; ?>

				<td class="text-and-color-panel">
					<label class="sahu-dropdown">
						<select id="sahu_ft_st" class="sahu-standard-dropdown" name="sahu_ft_st"  >
							<optgroup label="Default Fonts">
								<option value="Arial"           <?php if($sahu_ft_st == 'Arial' ) { echo "selected"; } ?>>Arial</option>
								<option value="Arial Black"    <?php if($sahu_ft_st == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
								<option value="Courier New"     <?php if($sahu_ft_st == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
								<option value="Georgia"         <?php if($sahu_ft_st == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
								<option value="Grande"          <?php if($sahu_ft_st == 'Grande' ) { echo "selected"; } ?>>Grande</option>
								<option value="Helvetica" 	<?php if($sahu_ft_st == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
								<option value="Impact"         <?php if($sahu_ft_st == 'Impact' ) { echo "selected"; } ?>>Impact</option>
								<option value="Lucida"         <?php if($sahu_ft_st == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
								<option value="Lucida Grande"         <?php if($sahu_ft_st == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
								<option value="Open Sans"   <?php if($sahu_ft_st == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
								<option value="OpenSansBold"   <?php if($sahu_ft_st == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
								<option value="Palatino Linotype"       <?php if($sahu_ft_st == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
								<option value="Sans"           <?php if($sahu_ft_st == 'Sans' ) { echo "selected"; } ?>>Sans</option>
								<option value="sans-serif"           <?php if($sahu_ft_st == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
								<option value="Tahoma"         <?php if($sahu_ft_st == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
								<option value="Times New Roman"          <?php if($sahu_ft_st == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
								<option value="Trebuchet"      <?php if($sahu_ft_st == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
								<option value="Verdana"        <?php if($sahu_ft_st == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
							</optgroup>
						</select>
					</label>	
				</td>
				
			</tr>
		<tr>
				<th> <?php _e('Custom CSS','SAHU_SO_TEXT_DOMAIN'); ?></th>
			</tr>
			<tr class="radio-span" >
				<td>
						<textarea rows="6"  class="pro_text" id="sahu_so_custom_css" name="sahu_so_custom_css" placeholder="<?php _e('Enter Your custom CSS Here',''); ?>"><?php echo $sahu_so_design['sahu_so_custom_css']; ?></textarea>
			
				</td>
				
			</tr>	
			<tr class="radio-span" >
				<td>
						<button class="portfolio_read_more_btn "  onclick="sahu_save_data_design()"><?php _e('Save Settings','SAHU_SO_TEXT_DOMAIN'); ?></button>
						<button class="portfolio_demo_btn" onclick="sahu_reset_data_design()" ><?php _e('Reset Default Setting','SAHU_SO_TEXT_DOMAIN'); ?></button>
				</td>
				
			</tr>	


		</table>
	
					
<script>
function sahu_save_data_design(){
	jQuery("#sahu_loding_image").show();
	var sahu_so_select_bg = jQuery('input:radio[name="sahu_so_select_bg"]:checked').val();
	var sahu_so_bg_clr = jQuery("#sahu_so_bg_clr").val();
	var sahu_so_bg_img = jQuery("#sahu_so_bg_img").val();
	var sahu_headeline_ft_clr = jQuery("#sahu_headeline_ft_clr").val();
	var sahu_desc_ft_clr = jQuery("#sahu_desc_ft_clr").val();
	var sahu_cnt_ft_clr = jQuery("#sahu_cnt_ft_clr").val();
	var sahu_social_clr = jQuery("#sahu_social_clr").val();
	var sahu_headline_ft_size = jQuery("#sahu_headline_ft_size").val();
	var sahu_desc_ft_size = jQuery("#sahu_desc_ft_size").val();
	var sahu_so_custom_css = jQuery("#sahu_so_custom_css").val();
	var sahu_ft_st = jQuery('#sahu_ft_st option:selected').val();

 
 
 	jQuery.ajax(
            {
	    	    type: "POST",
		        url: location.href,
	
		        data : {
			    'action_design':'sahu_sop_design',
			    'sahu_so_select_bg':sahu_so_select_bg,
			    'sahu_so_bg_clr':sahu_so_bg_clr,
			    'sahu_so_bg_img':sahu_so_bg_img,
			    'sahu_headeline_ft_clr':sahu_headeline_ft_clr,
			    'sahu_desc_ft_clr':sahu_desc_ft_clr,
			    'sahu_cnt_ft_clr':sahu_cnt_ft_clr,
			    'sahu_social_clr':sahu_social_clr,
			    'sahu_headline_ft_size':sahu_headline_ft_size,
			    'sahu_desc_ft_size':sahu_desc_ft_size,
			    'sahu_ft_st':sahu_ft_st,
			    'sahu_so_custom_css':sahu_so_custom_css,
			   
			   
			        },
                success : function(data){
					jQuery("#sahu_loding_image").fadeOut();
					jQuery(".dialog-button").click();
					// location.href='?page=sahu_coming_soon_wp';
			  
			   }			
            });
 
}
</script>
<?php
if(isset($_POST['action_design'])=="sahu_sop_design") {
$sahu_so_select_bg       = sanitize_option('sahu_so_select_bg', $_POST['sahu_so_select_bg']);
$sahu_so_bg_clr          = sanitize_text_field($_POST['sahu_so_bg_clr']);
$sahu_so_bg_img          = sanitize_text_field($_POST['sahu_so_bg_img']);
$sahu_headeline_ft_clr          = sanitize_text_field($_POST['sahu_headeline_ft_clr']);
$sahu_desc_ft_clr          = sanitize_text_field($_POST['sahu_desc_ft_clr']);
$sahu_cnt_ft_clr          = sanitize_text_field($_POST['sahu_cnt_ft_clr']);
$sahu_social_clr          = sanitize_text_field($_POST['sahu_social_clr']);
$sahu_headline_ft_size          = sanitize_text_field($_POST['sahu_headline_ft_size']);
$sahu_desc_ft_size          = sanitize_text_field($_POST['sahu_desc_ft_size']);
$sahu_ft_st          = sanitize_text_field($_POST['sahu_ft_st']);
$sahu_so_custom_css          = stripslashes($_POST['sahu_so_custom_css']);

			
			
$design = serialize( array(
	'sahu_so_select_bg' 		       => $sahu_so_select_bg,
	'sahu_so_bg_clr' 		       => $sahu_so_bg_clr,
	'sahu_so_bg_img' 		       => $sahu_so_bg_img,
	'sahu_headeline_ft_clr' 		       => $sahu_headeline_ft_clr,
	'sahu_desc_ft_clr' 		       => $sahu_desc_ft_clr,
	'sahu_cnt_ft_clr' 		       => $sahu_cnt_ft_clr,
	'sahu_social_clr' 		       => $sahu_social_clr,
	'sahu_headline_ft_size' 		       => $sahu_headline_ft_size,
	'sahu_desc_ft_size' 		       => $sahu_desc_ft_size,
	'sahu_ft_st' 		       => $sahu_ft_st,
	'sahu_so_custom_css' 		       => $sahu_so_custom_css,
	
	) );

update_option('sahu_so_design', $design);
}
 ?>
 
 
 <script>
 
	function sahu_reset_data_design(){
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
			'reset_action_design':'action_design_reset',
			
		   
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
if(isset($_POST['reset_action_design'])=="action_design_reset") {
	
	$default_url =  SAHU_SO_PLUGIN_URL.'assets/img/bg.jpg'; 
	
	$sahu_design = serialize( array(
	'sahu_so_select_bg' 		       => "1",
	'sahu_so_bg_clr' 		       => "#1e73be",
	'sahu_so_bg_img' 		       => $default_url,
	'sahu_headeline_ft_clr' 		       => "#ffffff",
	'sahu_desc_ft_clr' 		       => "#ffffff",
	'sahu_social_clr' 		       => "#ffffff",
	'sahu_headline_ft_size' 		       => "80",
	'sahu_desc_ft_size' 		       => "21",
	'sahu_ft_st' 		       => "Verdana",
	'sahu_so_custom_css' 		       => "",
	
	) );

	update_option('sahu_so_design', $sahu_design);
}
 ?>