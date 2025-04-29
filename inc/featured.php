<?php 
// Query featured entries
$featured = new WP_Query(
    array(
        'no_found_rows' => false,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'ignore_sticky_posts' => 1,
        'posts_per_page' => absint( get_theme_mod('featured-posts-count', '4') ),
        'cat' => absint( get_theme_mod('featured-category', '') )
    )
); 

if ( ( get_theme_mod('featured-posts-count', '4') != '0') && $featured->have_posts() ) : ?>
    <div class="page-card featured-wrap">
        <div class="slick-featured">
            <?php while ( $featured->have_posts() ): $featured->the_post(); ?>
                <div>
                    <?php get_template_part('content-featured'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="slick-featured-nav slick-posts-nav"></div>
		
		<?php
    		// Get the page ID selected in the customizer
   			 $featured_page_id = get_theme_mod('featured-page', '');
    		// If a page is selected, display the button below the featured posts
    			if ( $featured_page_id ) : 
        			$page_url = get_permalink( $featured_page_id );
        			$button_text = get_theme_mod( 'featured-button-text', 'View More Featured' );
    	?>
        <div class="featured-button-container">
            <a href="<?php echo esc_url($page_url); ?>" class="featured-button">
                <?php echo esc_html($button_text); ?>
			</a>
        </div>
		<?php endif; ?>
		
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
