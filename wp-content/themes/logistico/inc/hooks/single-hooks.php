<?php

if ( ! function_exists( 'logistico_related_post_list' ) ) {
   /**
    * Related post list
    */
    function logistico_related_post_list(){
        ?>
        <div class="lgtico-section bg-lgtico-alabaster p-t-50 p-b-25 p-sm-t-b-50">
            <div class="container">
                <div class="lgtico-section-title text-center m-b-40">
                    <?php
                    $related_title = get_theme_mod('logistico_related_posts_title', __("Related Posts", "logistico"));
                    if ( $related_title ) {
                        echo '<h2>' . esc_html( $related_title  ) . '</h2>';
                    }
                    ?>
                </div>
                <?php
                if( function_exists('logistico_related_posts') ) :
                $related_query = new WP_Query( logistico_related_posts(get_the_ID()) );
                
                if ( $related_query->have_posts() ) : ?>
                <div class="row">
                    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="lgtico-blog-wrap single-related-item lgtico-blog-three-column m-b-none">
                            <?php if( has_post_thumbnail() ) : ?>
                            <div class="lgtico-blog-thumb">
                                <?php the_post_thumbnail('logistico-featured-thumb'); ?>
                            </div>
                            <?php endif; ?>
                            <a class="lgtico-related-title" href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                </div><!-- .row -->
                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no similar posts found.', 'logistico' ); ?></p>
                <?php endif; ?>
                <?php endif; ?>
            </div><!-- .container -->
        </div><!-- .lgtico-section -->
        <?php
    }
    
}

/**
 * Managed functions for general section hooking
 *
 * @since 1.0.0
 */
add_action( 'logistico_related_posts', 'logistico_related_post_list' );