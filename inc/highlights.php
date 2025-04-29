<?php
// Query highlight entries
$highlight = new WP_Query(
	array(
		'no_found_rows'				=> false,
		'update_post_meta_cache'	=> false,
		'update_post_term_cache'	=> false,
		'ignore_sticky_posts'		=> 1,
		'posts_per_page'			=> absint( get_theme_mod('highlight-posts-count','5') ),
		'cat'						=> absint( get_theme_mod('highlight-category','') )
	)
);
?>

<?php if ( ( get_theme_mod('highlight-posts-count','5') != '0' ) && $highlight->have_posts() ) : ?>
	<div class="page-card page-card-highlights stickywrap">
		
		<h3 class="stickywrap-heading">
			<?php 
				// Get the section title from Customizer
				$highlight_title = get_theme_mod( 'highlight-section-title', esc_html__( 'Highlights', 'dashwall' ) );
				echo esc_html( $highlight_title );
			?>
		</h3>
		
		<div class="stickywrap-inner">
			<?php while ( $highlight->have_posts() ) : $highlight->the_post(); ?>
				<?php get_template_part( 'content-highlights' ); ?>
			<?php endwhile; ?>
		</div>

		<?php
			// Get the page ID selected in the customizer for highlights
			$highlight_page_id = get_theme_mod( 'highlights-page', '' );
			
			// If a page is selected, display the button below the highlights
			if ( $highlight_page_id ) :
				$page_url = get_permalink( $highlight_page_id );
				$button_text = get_theme_mod( 'highlight-button-text', 'View More Highlights' );
		?>
			<div class="highlight-button-container">
				<a href="<?php echo esc_url( $page_url ); ?>" class="highlight-button">
					<?php echo esc_html( $button_text ); ?>
				</a>
			</div>
		<?php endif; ?>

	</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
