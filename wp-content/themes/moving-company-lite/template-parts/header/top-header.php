<?php
/**
 * The template part for header
 *
 * @package Moving Company Lite 
 * @subpackage moving-company-lite
 * @since moving-company-lite 1.0
 */
?>

<div class="top-bar <?php if( get_theme_mod( 'moving_company_lite_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4">
		        <div class="logo">
		          	<?php if( has_custom_logo() ){ moving_company_lite_the_custom_logo();
		            	}else{ ?>
		              	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
		              	<?php $description = get_bloginfo( 'description', 'display' );
		              	if ( $description || is_customize_preview() ) : ?>
		              	<p class="site-description"><?php echo esc_html($description); ?></p>
		          	<?php endif; } ?>
		        </div>
	      	</div>
	      	<div class="<?php if(get_theme_mod('moving_company_lite_header_search')) { ?>col-lg-5 col-md-4 col-3" <?php } else { ?>col-lg-6 col-md-6" <?php } ?> >
	        	<?php get_template_part( 'template-parts/header/navigation' ); ?>
	      	</div>
	      	<?php if( get_theme_mod( 'moving_company_lite_header_search') != '') { ?>
	        <div class="col-lg-1 col-md-1 col-3">
	          	<div class="search-box">
	            	<span><i class="fas fa-search"></i></span>
	          	</div>
	        </div>
	      	<?php }?>
			<div class="col-lg-3 col-md-3 col-6 call-info">
				<div class="row">
			    <?php if( get_theme_mod( 'moving_company_lite_calling_text') != '' || get_theme_mod( 'moving_company_lite_phone_number') != '') { ?>
			    	<div class="col-lg-3 col-md-3 col-3">
			    		<i class="fas fa-phone"></i>
			    	</div>
			    	<div class="col-lg-9 col-md-9 col-9">
		    			<h6><?php echo esc_html(get_theme_mod('moving_company_lite_calling_text',''));?></h6>
		    			<p><?php echo esc_html(get_theme_mod('moving_company_lite_phone_number',''));?></p>
			    	</div>
        		<?php }?>
        		</div>
		    </div>
		</div>
		<div class="serach_outer">
	      	<div class="closepop"><i class="far fa-window-close"></i></div>
	      	<div class="serach_inner">
	        	<?php get_search_form(); ?>
	      	</div>
	    </div>
	</div>
</div>