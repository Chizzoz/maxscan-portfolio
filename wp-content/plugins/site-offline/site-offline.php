<?php
/**
 * Plugin Name: Site Offline
 * Version: 1.4.0
 * Description: Site Offline plugin manage your WordPress website when it's under construction or maintenance mode or coming soon.
 * Author: Chandra Shekhar Sahu
 * Author URI: http://www.freehtmldesigns.com
 * Plugin URI: http://www.freehtmldesigns.com/blog
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
define("SAHU_SO_TEXT_DOMAIN","SAHU_SO_lang" );
define("SAHU_SO_PLUGIN_URL", plugin_dir_url(__FILE__));

//Get Ready Plugin Translation
add_action('plugins_loaded', 'sahu_so_language_translation');
function sahu_so_language_translation() {
	load_plugin_textdomain( SAHU_SO_TEXT_DOMAIN, FALSE, dirname( plugin_basename(__FILE__)).'/language/' );
}

##	Default Data ##
register_activation_hook( __FILE__, 'sahu_so_dd' );
function sahu_so_dd()
{
	include('functions/default-data.php');
}

// Site Offline Menu Page 
add_action('admin_menu','sahu_site_offline_wp_menu');

function sahu_site_offline_wp_menu()
{
    //plugin menu name for Site Offline plugin
    $menu = add_menu_page('Site Offline', 'Site Offline','administrator', 'sahu_site_offline_wp','sahu_site_offline_content','dashicons-welcome-view-site');

    //added hook to add styles and scripts for Site Offline admin page
    add_action( 'admin_print_styles-' . $menu, 'sahu_site_offline_wp_script' );
}

require_once('functions/script.php');

function sahu_site_offline_content()
{  
	require_once('backend/content.php');
}

function sahu_so_launch()
{
	$sahu_so_dashboard = unserialize(get_option('sahu_so_dashboard'));
	$sahu_so_status = $sahu_so_dashboard['sahu_so_status'];
	
	if($sahu_so_status=="1")
	{	
		// Exit if any custom login page
		if(preg_match("/login|admin|dashboard|account/i",$_SERVER['REQUEST_URI']) > 0 ){
			return false;
		}
		// Check if user is logged in.
		if (!is_user_logged_in())
		{
			$file = plugin_dir_path( __FILE__ )."output/index.php";
			include($file);
			exit();
		}
		else{
			
			//get logined in user role
			$wp_get_current_user =  wp_get_current_user();
			$LoggedInUserID = $wp_get_current_user->ID;
			$UserData = get_userdata( $LoggedInUserID );
			//if user role not 'administrator' then redirect page 
			if($UserData->roles[0] != "administrator")
			{
				$file = plugin_dir_path( __FILE__ )."output/index.php";
				include($file);
				exit();
			}
			
		}
	}
	
}
add_action( 'template_redirect', 'sahu_so_launch' );

//Live Preview Viewing code
if (  (isset($_GET['sahu_cs_preview']) && $_GET['sahu_cs_preview'] == 'true') )
{ 	
	
	$file = plugin_dir_path( __FILE__ )."output/index.php";
	include($file);
	exit();
}

add_action('admin_bar_menu', 'sahu_so_admin_bar_button', 1000);
function sahu_so_admin_bar_button()
{
	
	global $wp_admin_bar;
	$sahu_so_dashboard = unserialize(get_option('sahu_so_dashboard'));
	$sahu_so_status = $sahu_so_dashboard['sahu_so_status'];
	if($sahu_so_status=='0') return;
	$msg = __('Site Offline Mode Active','');
	
	// Add Parent Menu
	$argsParent=array(
		'id' => 'myCustomMenu',
		'title' => $msg,
		'parent' => 'top-secondary',
		'href' => '?page=sahu_coming_soon_so',
		'meta'   => array( 'class' => 'sahu_so_admin_bar_button_so' ),
	);
	$wp_admin_bar->add_menu($argsParent);
	?>
	<style>
		.sahu_so_admin_bar_button_so a{
			background: #916194 !important;
			color: #fff !important;
		}
		.sahu_so_admin_bar_button_so a:hover{
			background: #916194 !important;
			color: #fff !important;
		}

	</style>
	<?php  
}
?>