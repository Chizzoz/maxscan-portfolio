<!DOCTYPE html>
<html lang="en">
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$sahu_so_dashboard = unserialize(get_option('sahu_so_dashboard'));
$sahu_so_design = unserialize(get_option('sahu_so_design'));	
$sahu_so_social = unserialize(get_option('sahu_so_social'));
$sahu_so_countdown = unserialize(get_option('sahu_so_countdown'));
$sahu_so_seo = unserialize(get_option('sahu_so_seo'));
$sahu_so_contact = unserialize(get_option('sahu_so_contact'));
 ?>
<head>
<!--==========================
	META TAGS 
===========================-->
	<!-- META DATA -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="<?php echo $sahu_so_seo['sahu_so_seo_desc']; ?>">
    <!-- ==========================
    	TITLE 
    =========================== -->
	<title><?php echo $sahu_so_seo['sahu_so_seo_title']; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo $sahu_so_seo['sahu_so_favicon']; ?>">
     
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'assets/css/bootstrap.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'assets/css/font-awesome/css/font-awesome.min.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/jquery.vegas.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/custom.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/animate.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/form-elements.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/style.css'; ?>" />
	<link rel="stylesheet" href="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/css/media-queries.css'; ?>" />
	
	<!-- Favicon & touch icons -->
	<link rel="shortcut icon" href="<?php echo $sahu_so_seo['sahu_so_favicon']; ?>">
   	
	<style>
	.head
	{
	color:<?php echo $sahu_so_design['sahu_headeline_ft_clr'] ?> !important;
	font-size:<?php echo $sahu_so_design['sahu_headline_ft_size'];?>px !important;
	font-family:'<?php echo $sahu_so_design['sahu_ft_st']; ?>' !important;
	}
	.description
	{
	color:<?php echo $sahu_so_design['sahu_desc_ft_clr'] ?> !important;
	font-family:'<?php echo $sahu_so_design['sahu_ft_st']; ?>' !important;
	font-size:<?php echo $sahu_so_design['sahu_desc_ft_size'] ?>px !important;
	}	
	.cont
	{
	margin-top:100px;
	}
	.info li
	{
	display:inline-block;
	list-style-type: none;
	padding-left:15px;
	padding-right:15px;
	
	}
	.info
	{
	text-align:center;
	padding-top:50px;
	padding-bottom:20px;
	
	}
	.info li .fa
	{
	display:inline-block;
	margin-right:10px;
	font-size:<?php echo $sahu_so_design['sahu_desc_ft_size'] ?>px !important;
	color:<?php echo $sahu_so_design['sahu_desc_ft_clr'] ?> !important;
	}
	.info li p
	{
	display:inline-block;
	font-size:16px;
	color:<?php echo $sahu_so_design['sahu_desc_ft_clr'] ?> !important;
	font-family:'<?php echo $sahu_so_design['sahu_ft_st']; ?>' !important;
	font-size:<?php echo $sahu_so_design['sahu_desc_ft_size'] ?>px !important;
	}
	.top-content .logo a {
	display:block;
	margin: 0;
	padding: 0;
	margin-bottom:20px;
    }
	body {
		background:<?php echo $sahu_so_design['sahu_so_bg_clr']; ?> !important;
	}
	.social-profile a{
		color:<?php echo $sahu_so_design['sahu_social_clr'] ?> !important;
	}
	.timer{
		color:<?php echo $sahu_so_design['sahu_cnt_ft_clr'] ?> !important;
	}
	<?php echo $sahu_so_design['sahu_so_custom_css']; ?>
	</style>
	
<?php echo $sahu_so_seo['sahu_so_seo_analytiso']; ?>
</head>
<body>
<!-- Loader -->
<!-- Top content -->
<div class="top-content">
	<div class="inner-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text">
					<?php if($sahu_so_dashboard['display_logo']=="0"){ ?>
						<div class="logo wow fadeInDown">
							<a href="#"><img src="<?php echo $sahu_so_dashboard['so_logo_url']; ?>" /></a>
						</div>
					<?php } ?>
					<h1 class="wow fadeInLeftBig head"><?php echo $sahu_so_dashboard['so_headline']; ?></h1>
					<div class="description wow fadeInLeftBig">
						<?php echo $sahu_so_dashboard['so_description']; ?>
					</div>
					<?php  if($sahu_so_countdown['cnt_enable']=="yes"){ ?>
					<div class="timer wow fadeInUp">
						<div class="days-wrapper">
								<span class="days"></span> <br>Days
						</div> 
						<span class="slash">/</span> 
						<div class="hours-wrapper">
							<span class="hours"></span> <br>Hours
						</div> 
						<span class="slash">/</span> 
						<div class="minutes-wrapper">
							<span class="minutes"></span> <br>Minutes
						</div> 
						<span class="slash">/</span> 
						<div class="seconds-wrapper">
							<span class="seconds"></span> <br>Seconds
						</div>
					</div>
					<?php } ?>
					<ul class="info scroll-page wow fadeInUp">
						<?php if($sahu_so_contact['sahu_so_address']!=""){ ?>
						<li>
							<i class="fa fa-home" aria-hidden="true"></i>
							<p><?php echo $sahu_so_contact['sahu_so_address']; ?></p>
						</li>
						<?php } ?>
						<?php if($sahu_so_contact['sahu_so_no']!=""){ ?>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							<p><?php echo $sahu_so_contact['sahu_so_no']; ?></p>
						</li>
						<?php } ?>
						<?php if($sahu_so_contact['sahu_so_email']!=""){ ?>
						<li>		
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<p><?php echo $sahu_so_contact['sahu_so_email']; ?></p>
						</li>
						<?php } ?>
						
					</ul>
					
					<div class="scroll-page wow fadeInUp social-profile">
						<?php if($sahu_so_social['sahu_so_fb']!=""){ ?>
							<a class="fa fa-facebook " href="<?php echo $sahu_so_social['sahu_so_fb']; ?>"></a>
						<?php } ?>
						<?php if($sahu_so_social['sahu_so_twit']!=""){ ?>
							<a class="fa fa-twitter" href="<?php echo $sahu_so_social['sahu_so_twit']; ?>"></a>
						<?php } ?>
						<?php if($sahu_so_social['sahu_so_ln']!=""){ ?>
							<a class="fa fa-linkedin " href="<?php echo $sahu_so_social['sahu_so_ln']; ?>"></a>
						<?php } ?>
						<?php if($sahu_so_social['sahu_so_gp']!=""){ ?>
							<a class="fa fa-instagram " href="<?php echo $sahu_so_social['sahu_so_gp']; ?>"></a>
						<?php } ?>
						
					</div>
				</div>		 
				<!-- Contact Us -->
				       	
					
			</div>
		</div>
	</div>
</div>
<!-- Footer -->


<!-- Javascript -->
<?php 	
	// Javascript
	
	$include_url = includes_url();
	$last = $include_url[strlen( $include_url )-1];
	if ( $last != '/' ) {
		$include_url = $include_url . '/';
	}
	$output = '<script src="'.$include_url.'js/jquery/jquery.js"></script>';
	echo "$output\n";
		?>

		
<script type="text/javascript" src="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/js/wow.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/js/retina-1.1.0.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/js/jquery.countdown.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/js/scripts.js'; ?>"></script>
<script type="text/javascript" src="<?php echo SAHU_SO_PLUGIN_URL.'output/assets/js/jquery.backstretch.min.js'; ?>"></script>

<?php if($sahu_so_design['sahu_so_select_bg'] == "1")
{?><script>
jQuery.backstretch([
                  "<?php echo $sahu_so_design['sahu_so_bg_img'] ?>",
                   ], {duration: 3000, fade: 750});
    
</script>
<?php } ?>

<?php  if($sahu_so_countdown['cnt_enable']=="yes"){ ?>
<script>
	var now = new Date();
	var countTo = "<?php echo $sahu_so_countdown['countdown_date']; ?>";    
	jQuery('.timer').countdown(countTo, function(event) {
		jQuery(this).find('.days').text(event.offset.totalDays);
		jQuery(this).find('.hours').text(event.offset.hours);
		jQuery(this).find('.minutes').text(event.offset.minutes);
		jQuery(this).find('.seconds').text(event.offset.seconds);
	});
</script>
<?php } ?>	
	
</body>

</html>