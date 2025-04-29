<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Use a child theme instead of placing custom functions here
	// http://codex.wordpress.org/Child_Themes

	
/* ------------------------------------------------------------------------- *
 *  Load theme files
/* ------------------------------------------------------------------------- */	

// Load Kirki
include( get_template_directory() . '/functions/kirki/kirki.php' );

if ( ! function_exists( 'dashwall_load' ) ) {
	
	function dashwall_load() {
		// Load theme languages
		load_theme_textdomain( 'dashwall', get_template_directory().'/languages' );
		
		// Load theme options and meta boxes
		include( get_template_directory() . '/functions/theme-options.php' );
		include( get_template_directory() . '/functions/meta-boxes.php' );

		// Load dynamic styles
		include( get_template_directory() . '/functions/dynamic-styles.php' );
		
		// Load TGM plugin activation
		include( get_template_directory() . '/functions/class-tgm-plugin-activation.php' );
	}
	
}
add_action( 'after_setup_theme', 'dashwall_load' );	


/* ------------------------------------------------------------------------- *
 *  Base functionality
/* ------------------------------------------------------------------------- */
	
	// Content width
	if ( !isset( $content_width ) ) { $content_width = 650; }


/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_setup' ) ) {
	
	function dashwall_setup() {
		// Enable title tag
		add_theme_support( 'title-tag' );
		
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		
		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		
		// Enable responsive embeds
		add_theme_support( 'responsive-embeds' );
		
		// Enable HTML5 semantic markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		
		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
		
		// Enable support for selective refresh of widgets in customizer
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Disable support for widgets block editor
		remove_theme_support( 'widgets-block-editor' );
		
		// Thumbnail sizes
		add_image_size( 'dashwall-small', 320, 180, true );
		add_image_size( 'dashwall-medium', 520, 293, true );
		add_image_size( 'dashwall-large', 800, 450, true );
		add_image_size( 'dashwall-huge', 1000, 563, true );
		
		// Thumbnail sizes custom widgets
		add_image_size( 'alx-small', 150, 150, true );
		add_image_size( 'alx-medium', 520, 293, true );

		// Custom menu areas
		register_nav_menus( array(
			'mobile' 	=> esc_html__( 'Mobile', 'dashwall' ),
			'header' 	=> esc_html__( 'Header', 'dashwall' ),
			'footer' 	=> esc_html__( 'Footer', 'dashwall' ),
		) );
	}
	
}
add_action( 'after_setup_theme', 'dashwall_setup' );


/*  Custom navigation
/* ------------------------------------ */
if ( ! class_exists( '\Dashwall\Nav' ) ) {
	require_once 'functions/nav.php';
}
add_action( 'wp', function() {
	$nav = new \Dashwall\Nav();
	$nav->enqueue(
		[
			'script' => 'js/nav.js',
			'inline' => false,
		]
	);
	$nav->init();
} );


/*  Custom logo
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_custom_logo' ) ) {
	
	function dashwall_custom_logo() {
		$defaults = array(
			'height'		=> 120,
			'width'			=> 400,
			'flex-height'	=> true,
			'flex-width'	=> true,
			'header-text'	=> array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}

}	
add_action( 'after_setup_theme', 'dashwall_custom_logo' );


/*  Custom header
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_custom_header' ) ) {
	
	function dashwall_custom_header() {
		$args = array(
			'default-image'	=> false,
			'default-text'	=> false,
			'width'			=> 1120,
			'height'		=> 300,
			'flex-width'	=> true,
			'flex-height'	=> true,
		);
		add_theme_support( 'custom-header', $args );
	}
	
}
add_action( 'after_setup_theme', 'dashwall_custom_header' );


/*  Custom background
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_custom_background' ) ) {
	
	function dashwall_custom_background() {
		$args = array();
		add_theme_support( 'custom-background', $args );
	}
	
}
add_action( 'after_setup_theme', 'dashwall_custom_background' );


/*  Deregister
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_deregister' ) ) {
	
	function dashwall_deregister() {
		wp_deregister_style( 'wp-pagenavi' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'dashwall_deregister', 100 );


/*  Register sidebars
/* ------------------------------------ */	
if ( ! function_exists( 'dashwall_sidebars' ) ) {

	function dashwall_sidebars()	{
		register_sidebar(array( 'name' => esc_html__('Primary','dashwall'),'id' => 'primary','description' => esc_html__("Normal full width sidebar","dashwall"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		
		if ( get_theme_mod('footer-widgets') >= '1' ) { register_sidebar(array( 'name' => esc_html__('Footer 1','dashwall'),'id' => 'footer-1', 'description' => esc_html__("Widgetized footer","dashwall"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( get_theme_mod('footer-widgets') >= '2' ) { register_sidebar(array( 'name' => esc_html__('Footer 2','dashwall'),'id' => 'footer-2', 'description' => esc_html__("Widgetized footer","dashwall"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( get_theme_mod('footer-widgets') >= '3' ) { register_sidebar(array( 'name' => esc_html__('Footer 3','dashwall'),'id' => 'footer-3', 'description' => esc_html__("Widgetized footer","dashwall"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( get_theme_mod('footer-widgets') >= '4' ) { register_sidebar(array( 'name' => esc_html__('Footer 4','dashwall'),'id' => 'footer-4', 'description' => esc_html__("Widgetized footer","dashwall"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
	}
	
}
add_action( 'widgets_init', 'dashwall_sidebars' );


/*  Enqueue javascript
/* ------------------------------------ */	
if ( ! function_exists( 'dashwall_scripts' ) ) {
	
	function dashwall_scripts() {
		wp_enqueue_script( 'dashwall-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ),'', false );
		if ( get_theme_mod( 'theme-toggle','on' ) == 'on' ) { wp_enqueue_script( 'dashwall-theme-toggle', get_template_directory_uri() . '/js/theme-toggle.js', array( 'jquery' ),'', true ); }
		wp_enqueue_script( 'dashwall-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
	}  
	
}
add_action( 'wp_enqueue_scripts', 'dashwall_scripts' ); 


/*  Enqueue css
/* ------------------------------------ */	
if ( ! function_exists( 'dashwall_styles' ) ) {
	
	function dashwall_styles() {
		wp_enqueue_style( 'dashwall-style', get_stylesheet_uri() );
		wp_enqueue_style( 'dashwall-responsive', get_template_directory_uri().'/responsive.css' );
		if ( ( get_theme_mod( 'dark-theme','off' ) == 'on' ) || ( get_theme_mod( 'theme-toggle','on' ) == 'on' ) ) { wp_enqueue_style( 'dashwall-dark', get_template_directory_uri().'/dark.css' ); }
		wp_enqueue_style( 'dashwall-font-awesome', get_template_directory_uri().'/fonts/all.min.css' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'dashwall_styles' );


/* ------------------------------------------------------------------------- *
 *  Template functions
/* ------------------------------------------------------------------------- */	

/*  Layout class
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_layout_class' ) ) {
	
	function dashwall_layout_class() {
		// Default layout
		$layout = 'col-2cl';
		$default = 'col-2cl';

		// Check for page/post specific layout
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_layout',true);
			// Get if set and not set to inherit
			if ( isset($meta) && !empty($meta) && $meta != 'inherit' ) { $layout = $meta; }
			// Else check for page-global / single-global
			elseif ( is_single() && ( get_theme_mod('layout-single','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-single',''.$default.'');
			elseif ( is_page() && ( get_theme_mod('layout-page','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-page',''.$default.'');
			// Else get global option
			else $layout = get_theme_mod('layout-global',''.$default.'');
		}
		
		// Set layout based on page
		elseif ( is_home() && ( get_theme_mod('layout-home','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-home',''.$default.'');
		elseif ( is_category() && ( get_theme_mod('layout-archive-category','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-archive-category',''.$default.'');
		elseif ( is_archive() && ( get_theme_mod('layout-archive','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-archive',''.$default.'');
		elseif ( is_search() && ( get_theme_mod('layout-search','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-search',''.$default.'');
		elseif ( is_404() && ( get_theme_mod('layout-404','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-404',''.$default.'');
		
		// Global option
		else $layout = get_theme_mod('layout-global',''.$default.'');
		
		// Return layout class
		return esc_attr( $layout );
	}
	
}


/*  Dynamic sidebar primary
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_sidebar_primary' ) ) {
	
	function dashwall_sidebar_primary() {
		// Default sidebar
		$sidebar = 'primary';

		// Set sidebar based on page
		if ( is_home() && get_theme_mod('s1-home') ) $sidebar = get_theme_mod('s1-home');
		if ( is_single() && get_theme_mod('s1-single') ) $sidebar = get_theme_mod('s1-single');
		if ( is_archive() && get_theme_mod('s1-archive') ) $sidebar = get_theme_mod('s1-archive');
		if ( is_category() && get_theme_mod('s1-archive-category') ) $sidebar = get_theme_mod('s1-archive-category');
		if ( is_search() && get_theme_mod('s1-search') ) $sidebar = get_theme_mod('s1-search');
		if ( is_404() && get_theme_mod('s1-404') ) $sidebar = get_theme_mod('s1-404');
		if ( is_page() && get_theme_mod('s1-page') ) $sidebar = get_theme_mod('s1-page');

		// Check for page/post specific sidebar
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_sidebar_primary',true);
			if ( $meta ) { $sidebar = $meta; }
		}

		// Return sidebar
		return esc_attr( $sidebar );
	}
	
}

/*  Social links
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_social_links' ) ) {

	function dashwall_social_links() {
		if ( !get_theme_mod('social-links') =='' ) {
			$links = get_theme_mod('social-links', array());
			if ( !empty( $links ) ) {
				echo '<ul class="social-links">';	
				foreach( $links as $item ) {
					
					// Build each separate html-section only if set
					if ( isset($item['social-title']) && !empty($item['social-title']) ) 
						{ $title = 'title="' .esc_attr( $item['social-title'] ). '"'; } else $title = '';
					if ( isset($item['social-link']) && !empty($item['social-link']) ) 
						{ $link = 'href="' .esc_url( $item['social-link'] ). '"'; } else $link = '';
					if ( isset($item['social-target']) && !empty($item['social-target']) ) 
						{ $target = 'target="_blank"'; } else $target = '';
					if ( isset($item['social-icon']) && !empty($item['social-icon']) ) 
						{ $icon = 'class="fab ' .esc_attr( $item['social-icon'] ). '"'; } else $icon = '';
					if ( isset($item['social-color']) && !empty($item['social-color']) ) 
						{ $color = 'style="color: ' .esc_attr( $item['social-color'] ). ';"'; } else $color = '';
					
					// Put them together
					if ( isset($item['social-title']) && !empty($item['social-title']) && isset($item['social-icon']) && !empty($item['social-icon']) && ($item['social-icon'] !='fa-') ) {
						echo '<li><a rel="nofollow" class="social-tooltip" '.$title.' '.$link.' '.$target.'><i '.$icon.' '.$color.'></i></a></li>';
					}
				}
				echo '</ul>';
			}
		}
	}
	
}


/*  Site name/logo
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_site_title' ) ) {

	function dashwall_site_title() {
		
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		
		// Text or image?
		if ( has_custom_logo() && $logo !== false ) {
			$logo = '<img src="'. esc_url( $logo[0] ) .'" alt="'.esc_attr( get_bloginfo('name')).'">';
		} else {
			$logo = esc_html( get_bloginfo('name') );
		}
		
		$link = '<a href="'.esc_url( home_url('/') ).'" rel="home">'.$logo.'</a>';
		
		if ( is_front_page() || is_home() ) {
			$sitename = '<h1 class="site-title">'.$link.'</h1>'."\n";
		} else {
			$sitename = '<p class="site-title">'.$link.'</p>'."\n";
		}
		
		return $sitename;
	}
	
}


/*  Blog title
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_blog_title' ) ) {

	function dashwall_blog_title() {
		global $post;
		$heading = esc_html( get_theme_mod('blog-heading') );
		$subheading = esc_html( get_theme_mod('blog-subheading') );
		if($heading) {
			$title = $heading;
		} else {
			$title = esc_html( get_bloginfo('name') );
		}
		if($subheading) {
			$title = $title.' <span>'.$subheading.'</span>';
		}

		return $title;
	}
	
}


/*  Related posts
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_related_posts' ) ) {

	function dashwall_related_posts() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'				=> true,
			'update_post_meta_cache'	=> false,
			'update_post_term_cache'	=> false,
			'ignore_sticky_posts'		=> 1,
			'orderby'					=> 'rand',
			'post__not_in'				=> array($post->ID),
			'posts_per_page'			=> 2
		);
		// Related by categories
		if ( get_theme_mod( 'related-posts','categories' ) == 'categories' ) {
			
			$cats = get_post_meta($post->ID, 'related-cat', true);
			
			if ( !$cats ) {
				$cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'related-posts','categories' ) == 'tags' ) {
		
			$tags = get_post_meta($post->ID, 'related-tag', true);
			
			if ( !$tags ) {
				$tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode(',', $tags);
			}
			if ( !$tags ) { $break = true; }
		}
		
		$query = !isset($break)?new WP_Query($args):new WP_Query;
		return $query;
	}
	
}

/* ------------------------------------------------------------------------- *
 *  Filters
/* ------------------------------------------------------------------------- */

/*  Body class
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_body_class' ) ) {
	
	function dashwall_body_class( $classes ) {
		$classes[] = dashwall_layout_class();
		if ( get_theme_mod( 'boxed','off' ) != 'on' ) { $classes[] = 'full-width'; }
		if ( get_theme_mod( 'boxed','off' ) == 'on' ) { $classes[] = 'boxed'; }
		if ( has_nav_menu( 'mobile' ) ) { $classes[] = 'mobile-menu'; }
		if ( get_theme_mod( 'dark-theme' ,'off' ) == 'on' ) { $classes[] = 'dark'; }
		if ( get_theme_mod( 'invert-logo' ,'on' ) == 'on' ) { $classes[] = 'invert-dark-logo'; }
		if (! ( is_user_logged_in() ) ) { $classes[] = 'logged-out'; }
		return $classes;
	}
	
}
add_filter( 'body_class', 'dashwall_body_class' );


/*  Excerpt ending
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_excerpt_more' ) ) {

	function dashwall_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		return '&#46;&#46;&#46;';
	}
	
}
add_filter( 'excerpt_more', 'dashwall_excerpt_more' );


/*  Excerpt length
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_excerpt_length' ) ) {

	function dashwall_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$new_length = $length;
		$custom_length = get_theme_mod( 'excerpt-length', '20' );
		if ( absint( $custom_length ) > 0 ) {
			$new_length = absint( $custom_length );
		}
		return $new_length;
	}
	
}
add_filter( 'excerpt_length', 'dashwall_excerpt_length', 999 );


/* ------------------------------------------------------------------------- *
 *  Actions
/* ------------------------------------------------------------------------- */	

/*  Include or exclude featured articles in main blog loop
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_exclude_featured_category' ) ) {

    function dashwall_exclude_featured_category( $query ) {
        // Ensure we are modifying the main query and on the blog page
        if ( ! is_admin() && $query->is_main_query() && is_home() ) {

            // Get the value of the 'featured-posts-category' setting (could be an ID or slug)
            $featured_cat = get_theme_mod( 'featured-posts-category', '' );

            // If the category ID is empty, try to get it from the category slug
            if ( ! empty( $featured_cat ) ) {

                // Check if the value is a numeric ID (if it's a category ID)
                if ( is_numeric( $featured_cat ) ) {
                    $cat_id = intval( $featured_cat );
                } else {
                    // If it's a slug, fetch the category by slug
                    $category = get_category_by_slug( $featured_cat );
                    if ( $category ) {
                        $cat_id = $category->term_id;
                    }
                }

                // If we have a valid category ID
                if ( isset( $cat_id ) && $cat_id ) {
                    // Exclude posts from this category by setting the 'cat' parameter with a negative ID
                    $query->set( 'cat', '-' . $cat_id );
                }
            }
        }
    }

}
add_action( 'pre_get_posts', 'dashwall_exclude_featured_category' );


/*  Include or exclude highlight articles in main blog loop
/* ------------------------------------ */
function dashwall_exclude_highlight_category( $query ) {
    // Ensure we are modifying the main query and on the blog page
    if ( ! is_admin() && $query->is_main_query() && is_home() ) {

        // Get the value of the 'highlight-category' setting (could be an ID or slug)
        $highlight_cat = get_theme_mod( 'highlight-category', '' );

        // If the category ID is empty, try to get it from the category slug
        if ( ! empty( $highlight_cat ) ) {

            // Check if the value is a numeric ID (if it's a category ID)
            if ( is_numeric( $highlight_cat ) ) {
                $cat_id = intval( $highlight_cat );
            } else {
                // If it's a slug, fetch the category by slug
                $category = get_category_by_slug( $highlight_cat );
                if ( $category ) {
                    $cat_id = $category->term_id;
                }
            }

            // If we have a valid category ID
            if ( isset( $cat_id ) && $cat_id ) {
                // Exclude posts from this category by setting the 'cat' parameter with a negative ID
                $query->set( 'cat', '-' . $cat_id );
            }
        }
    }
}
add_action( 'pre_get_posts', 'dashwall_exclude_highlight_category' );

/*  Script for no-js / js class
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_html_js_class' ) ) {

	function dashwall_html_js_class () {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
	
}
add_action( 'wp_head', 'dashwall_html_js_class', 1 );


/*  Admin panel css
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_admin_panel_css' ) ) {
	
	function dashwall_admin_panel_css() {
		global $pagenow;
		if ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) {
			echo '<style>
				.rwmb-image-select { width: auto!important; height: auto!important; }
				.rwmb-text { width: 100%; }
			</style>';
		}
	}

}
add_action( 'admin_head', 'dashwall_admin_panel_css' );


/*  TGM plugin activation
/* ------------------------------------ */
if ( ! function_exists( 'dashwall_plugins' ) ) {
	
	function dashwall_plugins() {	
		if ( get_theme_mod('recommended-plugins','on') =='on' ) { 	
			// Add the following plugins
			$plugins = array(
				array(
					'name' => esc_html__( 'Alx Extensions', 'dashwall' ),
					'slug' => 'alx-extensions',
				),
				array(
					'name' => esc_html__( 'Meta Box', 'dashwall' ),
					'slug' => 'meta-box',
				),
				array(
					'name' => esc_html__( 'Regenerate Thumbnails', 'dashwall' ),
					'slug' => 'regenerate-thumbnails',
				),
				array(
					'name' => esc_html__( 'WP-PageNavi', 'dashwall' ),
					'slug' => 'wp-pagenavi',
				)
			);	
			tgmpa( $plugins );
		}
	}
	
}
add_action( 'tgmpa_register', 'dashwall_plugins' );


/*  WooCommerce basic support
/* ------------------------------------ */
function dashwall_wc_wrapper_start() {
	echo '<div class="page-col-center">';
}
function dashwall_wc_wrapper_end() {
	echo '</div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'dashwall_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'dashwall_wc_wrapper_end', 10);


/*  Accessibility IE11 fix - https://git.io/vWdr2
/* ------------------------------------ */
function dashwall_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'dashwall_skip_link_focus_fix' );


/*  Kirki deprecated fix
/* ------------------------------------ */
function dashwall_kirki_config( $config ) {

	if ( isset( $config['compiler'] ) ) {
		unset( $config['compiler'] );
	}

	return $config;
}
add_filter( 'kirki/config', 'dashwall_kirki_config', 999 );

// Fetch Pages for the Select Control
function get_page_choices() {
    $pages = get_pages( array(
        'post_status' => 'publish',
        'post_type'   => 'page',
    ) );

    $choices = array();
    $choices[''] = esc_html__( 'Select a Page', 'dashwall' ); // Default option

    foreach ( $pages as $page ) {
        $choices[$page->ID] = $page->post_title;
    }

    return $choices;
}
// Register Dynamic CSS Styles for the Featured and Highlights Section Buttons and add CSS to header
function dashwall_dynamic_button_styles() {
	// Get theme mods for featured section button
	$button_text_color = get_theme_mod( 'featured-button-text-color', '#ffffff' );
	$gradient_color1 = get_theme_mod( 'featured-button-gradient-color1', '#ff7e5f' );
	$gradient_color2 = get_theme_mod( 'featured-button-gradient-color2', '#feb47b' );
	$hover_text_color = get_theme_mod( 'featured-button-hover-text-color', '#99003d' );
	// Get theme mods for highlights section button
	$highlights_button_text_color = get_theme_mod( 'highlights-button-text-color', '#ffffff' );
	$highlights_gradient_color_top = get_theme_mod( 'highlights-button-gradient-color-top', '#ff7e5f' );
	$highlights_gradient_color_bottom = get_theme_mod( 'highlights-button-gradient-color-bottom', '#feb47b' );
	$highlights_hover_shadow_color = get_theme_mod( 'highlights-button-hover-shadow-color', '#99003d' );
	?>
	<style type="text/css">
		.featured-button {
			color: <?php echo esc_attr( $button_text_color ); ?>;
			background: linear-gradient(135deg, <?php echo esc_attr( $gradient_color1 ); ?>, <?php echo esc_attr( $gradient_color2 ); ?>);
			border: 3px solid <?php echo esc_attr( $button_text_color ); ?>;
		}
		.featured-button:hover {
			color: <?php echo esc_attr( $hover_text_color ); ?>;
			background: linear-gradient(135deg, <?php echo esc_attr( $gradient_color2 ); ?>, <?php echo esc_attr( $gradient_color1 ); ?>);
			border-color: <?php echo esc_attr( $hover_text_color ); ?>;
		}
		.featured-button::before {
			background: linear-gradient(135deg, <?php echo esc_attr( $gradient_color1 ); ?>, <?php echo esc_attr( $gradient_color2 ); ?>);
		}
		.highlight-button {
  			color: <?php echo esc_attr( $highlights_button_text_color ); ?>; /* Ashoka Chakra Blue */
  			background: linear-gradient(to bottom, <?php echo esc_attr( $highlights_gradient_color_top ); ?>, #ffffff, <?php echo esc_attr( $highlights_gradient_color_top ); ?>);}
		.highlight-button:hover {
			color: <?php echo esc_attr( $highlights_button_text_color ); ?>; /* Ashoka Chakra Blue */
  			box-shadow: 0 0 25px 10px <?php echo esc_attr( $highlights_hover_shadow_color ); ?>; /* Golden Glow on hover */
		}
	</style>
	<?php
}
add_action( 'wp_head', 'dashwall_dynamic_button_styles' );
