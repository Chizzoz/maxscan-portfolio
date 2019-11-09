<?php
	/*------------------------------ Global First Color -----------*/

	$moving_company_lite_first_color = get_theme_mod('moving_company_lite_first_color');

	$custom_css = '';

	if($moving_company_lite_first_color != false){
		$custom_css .='.social-media .custom-social-icons i:hover, .more-btn, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer-2, #sidebar h3, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.call-info i.fas.fa-phone, .scrollup i, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$custom_css .='a, #footer .custom-social-icons i:hover, #footer li a:hover, .post-main-box:hover h3, #sidebar ul li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .post-main-box:hover h3 a, .main-navigation ul.sub-menu a:hover, .main-navigation a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$custom_css .='.call-info i.fas.fa-phone{';
			$custom_css .='border-color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$custom_css .='.more-btn:before{';
			$custom_css .='border-left-color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$custom_css .='.main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$custom_css .='#serv-section h3, #footer h3:after, .main-navigation ul ul{';
			$custom_css .='border-bottom-color: '.esc_html($moving_company_lite_first_color).';';
		$custom_css .='}';
	}

	$custom_css .='@media screen and (max-width:720px) {';
		if($moving_company_lite_first_color != false){
			$custom_css .='.top-bar, .info-box{
			background-color:'.esc_html($moving_company_lite_first_color).';
			}';
		}
	$custom_css .='}';

	/*------------------------------ Global Second Color -----------*/

	$moving_company_lite_second_color = get_theme_mod('moving_company_lite_second_color');

	if($moving_company_lite_second_color != false){
		$custom_css .='.social-media, .more-btn:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #footer, .pagination span, .pagination a, #sidebar .custom-social-icons i:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale{';
			$custom_css .='background-color: '.esc_html($moving_company_lite_second_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$custom_css .='#slider .inner_carousel h2, #slider .inner_carousel p, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, h1, h2, h3, h4, h5, h6, .post-main-box h3, .post-navigation a, .woocommerce-message::before, .woocommerce-info::before, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce .quantity .qty, .post-main-box h3 a{';
			$custom_css .='color: '.esc_html($moving_company_lite_second_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$custom_css .='.woocommerce .quantity .qty,.call-info i.fas.fa-phone{';
			$custom_css .='border-color: '.esc_html($moving_company_lite_second_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$custom_css .='.woocommerce-message, .woocommerce-info{';
			$custom_css .='border-top-color: '.esc_html($moving_company_lite_second_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$custom_css .='.more-btn:hover:before{';
			$custom_css .='border-left-color: '.esc_html($moving_company_lite_second_color).';';
		$custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_html($moving_company_lite_second_color).';
		}';
	}
	if($moving_company_lite_second_color != false || $moving_company_lite_first_color != false){
	$custom_css .='.box:hover{
		background: linear-gradient(to right, '.esc_html($moving_company_lite_second_color).', '.esc_html($moving_company_lite_first_color).');
		}';
	}
	if($moving_company_lite_second_color != false || $moving_company_lite_first_color != false){
	$custom_css .='.top-bar{
		background: linear-gradient(60deg, '.esc_html($moving_company_lite_second_color).' 74.5%, '.esc_html($moving_company_lite_first_color).' 32%) repeat scroll 0 0;
		}';
	}
	if($moving_company_lite_first_color != false || $moving_company_lite_second_color != false){
	$custom_css .='.info-box{
		background: linear-gradient(60deg, '.esc_html($moving_company_lite_first_color).' 41%, '.esc_html($moving_company_lite_second_color).' 32%) repeat scroll 0 0;
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'moving_company_lite_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'moving_company_lite_slider_opacity_color','0.6');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'moving_company_lite_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:10%; right:45%';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:30%; right:30%; clip-path:none; padding: 5px;';
		$custom_css .='}';
		$custom_css .='#slider .more-btn{';
			$custom_css .='text-align:center; right:40%; position:absolute; margin: 10px 0;';
		$custom_css .='}';
		$custom_css .='#slider .inner_carousel p{';
			$custom_css .='padding: 5px;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:44%; right:10%; clip-path: polygon(9% 0%, 93% 0%, 93% 100%, 0% 100%); padding: 0px 15px;';
		$custom_css .='}';
		$custom_css .='#slider .more-btn{';
			$custom_css .='text-align:right; right:15%; position:absolute; margin: 10px 0;';
		$custom_css .='}';
	}

