<?php
if ( ! defined( 'ABSPATH' ) ) exit;
 ?>
<style>
#TB_ajaxContent{
		width:100% !important;
	}
	#TB_window {
		height: auto !important;
		width:98% !important;
		margin-left: 10px!important;
		left: 10px;
	}
	#TB_iframeContent{
		width:100% !important;
	}
	
</style>
<div>

		<div class="sahu_acc_hi ">
			<div class="texture-layer">				
					<div class="sahu_acc_hb"><a class="btn btn-danger btn-lg " href="https://goo.gl/4rSmH6" target="_blank">Buy Coming Soon Pro Now</a><a class="btn btn-success btn-lg " href="https://goo.gl/E6J2Tp" target="_blank">View Demo</a></div>
					<div style="overflow:hidden;display:block;width:100%;text-align:center">
						<h1 style="color:#fff;font-size:30px;text-transform:uppercase;margin-bottom:20px;">Check Pro version Features</h1>
					</div>
					<div style="overflow:hidden;display:block;width:100%">
						<div class="col-md-3">
							<ul>
								<li> <i class="fa fa-check"></i>8 Coming Soon Design Templates </li>
								<li> <i class="fa fa-check"></i>User White list Access  </li>
								<li> <i class="fa fa-check"></i>Landing Pages access </li>
								<li> <i class="fa fa-check"></i>Ip access </li>
								<li> <i class="fa fa-check"></i>Contact Form integrated  </li>
								<li> <i class="fa fa-check"></i>Google Map integrated</li>
								<li><i class="fa fa-check"></i> 17+ Social Profiles Integrated</li>
								
							</ul>
						</div>
						<div class="col-md-3">							
						<ul>
								
								<li> <i class="fa fa-check"></i>Countdown Auto Launch </li>
								<li> <i class="fa fa-check"></i>5+ Additional Pages </li>
								<li> <i class="fa fa-check"></i>10+ Slide show Background images </li>
								<li> <i class="fa fa-check"></i>Service Section with 10+ services </li>
								<li> <i class="fa fa-check"></i>About Us Section </li>
								<li> <i class="fa fa-check"></i>Team Section </li>
								<li> <i class="fa fa-check"></i>500+ Google Font integrated</li>							
								
							</ul>
						</div>
						<div class="col-md-3">
							<ul>
								
								<li> <i class="fa fa-check"></i>Subscriber List Integrated</li>
								<li> <i class="fa fa-check"></i>8+ Email Newsletter Services </li>
								<li> <i class="fa fa-check"></i>Subscriber list view & export</li>
								<li> <i class="fa fa-check"></i>Drag & drop Social position </li>
								<li> <i class="fa fa-check"></i>Redirect to another website</li>
								<li> <i class="fa fa-check"></i>Mailchimp Newsletter Integrated</li>
								
								<li> <i class="fa fa-check"></i>Madmimi Newsletter Integrated</li>
							</ul>
						</div>
						<div class="col-md-3">
							<ul>
								
								<li> <i class="fa fa-check"></i>Icontact Newsletter Integrated</li>
								<li> <i class="fa fa-check"></i>Constant Contact Integrated</li>
								<li> <i class="fa fa-check"></i>Campaign Monitor Integrated</li>
								<li> <i class="fa fa-check"></i>GetResponse  Integrated</li>
								<li> <i class="fa fa-check"></i>Export Subscriber Email List</li>
								<li> <i class="fa fa-check"></i>All Wordpress Themes Supported</li>
								<li> <i class="fa fa-check"></i>High Priority Support</li>
							</ul>
						</div>			
						
					</div>
				
			</div>
						
		</div>
	<div style="display:block;width:100%;padding-top: 25px;">
		<h2 style="padding-left: 32px;		
		font-size: 45px;
		text-transform: uppercase;
		font-weight: 400;
		display: inline-block;
		letter-spacing: 0.02em;
		margin-right: 10px;">Site Offline Or Coming Soon</h2>
	</div>
	<div class="col-md-8">
		<div class="sahu-wp-panel">
	        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('Dashboard','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('dashboard.php'); ?>  
						</div>
                    </div>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('SEO','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsetwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('seo.php'); ?> 
						</div>
                    </div>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('Design','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsethree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('design.php'); ?>
						</div>
                    </div>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('Countdown','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsefour" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('countdown-setting.php'); ?>
						</div>
                    </div>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                               <?php _e('Social','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <?php require_once('social.php'); ?> 
						</div>
                    </div>
                </div>
				
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('Contact Info','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('contact.php'); ?> 
						</div>
                    </div>
                </div>
				<div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <?php _e('Pro version Screenshot','SAHU_SO_TEXT_DOMAIN'); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                         <?php require_once('pro.php'); ?> 
						</div>
                    </div>
                </div>
				
				
				
            </div>
    
				
			<div class="sahu_cs_loding" id="sahu_loding_image"></div>
			<button data-dialog="somedialog" class="dialog-button" style="display:none;">Open Dialog</button>
			<div id="somedialog" class="dialog" style="position: fixed; z-index: 9999;">
				<div class="dialog__overlay"></div>
				<div class="dialog__content">
					<div class="morph-shape" data-morph-open="M33,0h41c0,0,0,9.871,0,29.871C74,49.871,74,60,74,60H32.666h-0.125H6c0,0,0-10,0-30S6,0,6,0H33" data-morph-close="M33,0h41c0,0-5,9.871-5,29.871C69,49.871,74,60,74,60H32.666h-0.125H6c0,0-5-10-5-30S6,0,6,0H33">
						<svg xmlns="" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
							<path d="M33,0h41c0,0-5,9.871-5,29.871C69,49.871,74,60,74,60H32.666h-0.125H6c0,0-5-10-5-30S6,0,6,0H33"></path>
						</svg>
					</div>
					<div class="dialog-inner">
						<h2><strong></strong><?php _e('Setting Saved Successfully','SAHU_SO_TEXT_DOMAIN'); ?></h2><div><button class="action dialog-button-close" data-dialog-close id="dialog-close-button" ><?php _e('Close','SAHU_SO_TEXT_DOMAIN');?></button></div>
					</div>
				</div>
			</div>
		  <?php require_once('fs.php'); ?>
		</div>
		
		
	</div>
	<div class="col-md-4 cssahu_sidebar">
		<?php require_once('sidebar.php'); ?>  
	</div>
</div>
