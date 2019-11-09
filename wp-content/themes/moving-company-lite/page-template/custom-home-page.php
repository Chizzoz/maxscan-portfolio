<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'moving_company_lite_before_slider' ); ?>

  <?php if( get_theme_mod( 'moving_company_lite_slider_arrows',true) != '') { ?>

  <section id="home-slider-section">
    <div class="container-fluid p-0">
      <div class="row m-0">
        <?php if( get_theme_mod( 'moving_company_lite_social_media') != '') { ?>
          <div class="col-lg-1 col-md-1 social-media">
            <?php dynamic_sidebar('social-links'); ?>
          </div>
        <?php }?>
        <div class="p-0 <?php if(get_theme_mod('moving_company_lite_social_media')) { ?>col-lg-11 col-md-11" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>">
          <div id="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
              <?php $moving_company_lite_pages = array();
                for ( $count = 1; $count <= 4; $count++ ) {
                  $mod = intval( get_theme_mod( 'moving_company_lite_slider_page' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $moving_company_lite_pages[] = $mod;
                  }
                }
                if( !empty($moving_company_lite_pages) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $moving_company_lite_pages,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $i = 1;
              ?>     
              <div class="carousel-inner" role="listbox">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <?php the_post_thumbnail(); ?>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <h2><?php the_title(); ?></h2>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( moving_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('moving_company_lite_slider_excerpt_number','30')))); ?></p>
                        <div class="more-btn">
                          <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'moving-company-lite' ); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','moving-company-lite' );?></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile; 
                wp_reset_postdata();?>
              </div>
              <?php else : ?>
                  <div class="no-postfound"></div>
              <?php endif;
              endif;?>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="screen-reader-text"><?php esc_attr_e( 'Previous','moving-company-lite' );?></span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="screen-reader-text"><?php esc_attr_e( 'Next','moving-company-lite' );?></span>
              </a>
            </div>
            <div class="clearfix"></div>
            <div class="info-box">
              <div class="row m-0">
                <div class="col-lg-5 col-md-5">
                  <?php if( get_theme_mod( 'moving_company_lite_email_text') != '') { ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-4">
                      <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="col-lg-9 col-md-9 col-8">
                      <h6><?php echo esc_html(get_theme_mod('moving_company_lite_email_text',''));?></h6>
                      <p><?php echo esc_html(get_theme_mod('moving_company_lite_email_address',''));?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-lg-7 col-md-7">
                  <?php if( get_theme_mod( 'moving_company_lite_opening_time_text') != '') { ?>
                  <div class="row">
                    <div class="col-lg-2 col-md-2 col-4">
                      <i class="fas fa-clock"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 col-8">
                      <h6><?php echo esc_html(get_theme_mod('moving_company_lite_opening_time_text',''));?></h6>
                      <p><?php echo esc_html(get_theme_mod('moving_company_lite_opening_time',''));?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

  <?php } ?>

  <?php do_action( 'moving_company_lite_after_slider' ); ?>

  <section id="serv-section">
    <div class="container">
      <?php if( get_theme_mod( 'moving_company_lite_section_title') != '') { ?>
        <h3><?php echo esc_html(get_theme_mod('moving_company_lite_section_title',''));?></h3>
      <?php } ?>
      <div class="row">
        <?php
          $catData =  get_theme_mod('moving_company_lite_our_services','');
          if($catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'moving-company-lite'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="col-md-4 col-sm-6">
            <div class="box">
              <?php the_post_thumbnail(); ?>
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( moving_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('moving_company_lite_services_excerpt_number','30')))); ?></p>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'moving_company_lite_after_second_section' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>