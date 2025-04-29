<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/*  Add Config
/* ------------------------------------ */
Kirki::add_config( 'dashwall', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/*  Add Links
/* ------------------------------------ */
Kirki::add_section( 'morelink', array(
	'title'       => esc_html__( 'AlxMedia', 'dashwall' ),
	'type'        => 'link',
	'button_text' => esc_html__( 'View More Themes', 'dashwall' ),
	'button_url'  => 'http://alx.media/themes/',
	'priority'    => 13,
) );
Kirki::add_section( 'reviewlink', array(
	'title'       => esc_html__( 'Like This Theme?', 'dashwall' ),
	'panel'       => 'options',
	'type'        => 'link',
	'button_text' => esc_html__( 'Write a Review', 'dashwall' ),
	'button_url'  => 'https://wordpress.org/support/theme/dashwall/reviews/#new-post',
	'priority'    => 1,
) );

/*  Add Panels
/* ------------------------------------ */
Kirki::add_panel( 'options', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Theme Options', 'dashwall' ),
) );

/*  Add Sections
/* ------------------------------------ */
Kirki::add_section( 'general', array(
    'priority'    => 10,
    'title'       => esc_html__( 'General', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'blog', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Blog', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'profile', array(
    'priority'    => 30,
    'title'       => esc_html__( 'Profile', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'footer', array(
    'priority'    => 40,
    'title'       => esc_html__( 'Footer', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'sidebars', array(
    'priority'    => 60,
    'title'       => esc_html__( 'Sidebars', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'social', array(
    'priority'    => 70,
    'title'       => esc_html__( 'Social Links', 'dashwall' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'styling', array(
    'priority'    => 80,
    'title'       => esc_html__( 'Styling', 'dashwall' ),
	'panel'       => 'options',
) );

/*  Add Fields
/* ------------------------------------ */

// General: Recommended Plugins
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'recommended-plugins',
	'label'			=> esc_html__( 'Recommended Plugins', 'dashwall' ),
	'description'	=> esc_html__( 'Enable or disable the recommended plugins notice', 'dashwall' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// General: Search Sidebar
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'sidebar-search',
	'label'			=> esc_html__( 'Sidebar Search Field', 'dashwall' ),
	'description'	=> esc_html__( 'Shown above all sidebars except home & search', 'dashwall' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// Blog: Featured Posts Include/Exclude
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'featured-posts-include',
	'label'			=> esc_html__( 'Featured Posts Exclude', 'dashwall' ),
	'description'	=> esc_html__( 'Exclude featured posts from the main blog content', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Featured Category
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'select',
	'settings'		=> 'featured-category',
	'label'			=> esc_html__( 'Featured Category', 'dashwall' ),
	'description'	=> esc_html__( 'By not selecting a category, it will show your latest post(s) from all categories', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> '',
	'choices'		=> Kirki_Helper::get_terms( 'category' ),
	'placeholder'	=> esc_html__( 'Select a category', 'dashwall' ),
) );
// Blog: Featured Post Count
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'featured-posts-count',
	'label'			=> esc_html__( 'Featured Post Count', 'dashwall' ),
	'description'	=> esc_html__( 'Max number of featured posts to display. Set it to 0 to disable', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> '4',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '10',
		'step'	=> '1',
	),
) );
// Blog: Select Featured Posts Archive/Main Page
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'select',
	'settings'    => 'featured-page',
	'label'       => esc_html__( 'Select Featured Posts Page', 'dashwall' ),
	'description' => esc_html__( 'Choose a page to link to from the featured posts section', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '',
	'choices'     => get_page_choices(), 
	'priority'    => 10,
) );
// Blog: Featured Button Text
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'text',
	'settings'    => 'featured-button-text',
	'label'       => esc_html__( 'Featured Posts Button Text', 'dashwall' ),
	'description' => esc_html__( 'Set the text for the button in the Featured posts section', 'dashwall' ),
	'section'     => 'blog',
	'default'     => 'Featured Pages',
	'priority'    => 10,
) );
// Blog: Button Text Color
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'featured-button-text-color',
	'label'       => esc_html__( 'Button Text Color', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#ffffff',
) );

// Blog: Button Gradient Color 1
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'featured-button-gradient-color1',
	'label'       => esc_html__( 'Button Gradient Color 1', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#ff7e5f',
) );

// Blog: Button Gradient Color 2
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'featured-button-gradient-color2',
	'label'       => esc_html__( 'Button Gradient Color 2', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#feb47b',
) );

// Blog: Button Hover Text Color
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'featured-button-hover-text-color',
	'label'       => esc_html__( 'Button Hover Text Color', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#99003d',
) );
// Add a separator
Kirki::add_field( 'dashwall_theme', [
    'type'        => 'custom',
    'settings'    => 'separator-featured',
    'section'     => 'blog',
    'default'     => '<hr />',
] );
// Blog: Highlight Posts Exclude
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'switch',
	'settings'    => 'highlight-posts-exclude',
	'label'       => esc_html__( 'Highlight Posts Exclude', 'dashwall' ),
	'description' => esc_html__( 'Exclude highlight posts from the content below', 'dashwall' ),
	'section'     => 'blog',
	'default'     => 'off',
) );
// Blog: Highlight Section Title
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'text',
	'settings'    => 'highlight-section-title',
	'label'       => esc_html__( 'Highlight Section Title', 'dashwall' ),
	'description' => esc_html__( 'Change the title for the Highlight section', 'dashwall' ),
	'section'     => 'blog',
	'default'     => esc_html__( 'Highlights', 'dashwall' ),
	'placeholder' => esc_html__( 'Enter section title', 'dashwall' ),
) );
// Blog: Highlight Category
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'select',
	'settings'		=> 'highlight-category',
	'label'			=> esc_html__( 'Highlight Category', 'dashwall' ),
	'description'	=> esc_html__( 'By not selecting a category, it will show your latest post(s) from all categories', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> '',
	'choices'		=> Kirki_Helper::get_terms( 'category' ),
	'placeholder'	=> esc_html__( 'Select a category', 'dashwall' ),
) );
// Blog: Highlights Category Count
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'highlight-posts-count',
	'label'			=> esc_html__( 'Highlight Post Count', 'dashwall' ),
	'description'	=> esc_html__( 'Max number of highlight posts to display. Set it to 0 to disable.', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> '5',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '12',
		'step'	=> '1',
	),
) );
// Blog: Select Highlights Posts Archive/Main Page
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'select',
	'settings'    => 'highlights-page',
	'label'       => esc_html__( 'Select Highlights Posts Page', 'dashwall' ),
	'description' => esc_html__( 'Choose a page to link to from the highlights section', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '',
	'choices'     => get_page_choices(), 
	'priority'    => 10,
) );
// Blog: Highlights Button Text
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'text',
	'settings'    => 'highlight-button-text',
	'label'       => esc_html__( 'Highlights Button Text', 'dashwall' ),
	'description' => esc_html__( 'Set the text for the button in the Highlights section', 'dashwall' ),
	'section'     => 'blog',
	'default'     => 'View More Highlights',
	'priority'    => 10,
) );
// Highlights: Button Text Color
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'highlights-button-text-color',
	'label'       => esc_html__( 'Highlights Button Text Color', 'dashwall' ),
	'section'     => 'blog', // or your correct section
	'default'     => '#000080', // Ashoka Chakra Blue
) );

// Highlights: Button Gradient Color 1
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'highlights-button-gradient-color-top',
	'label'       => esc_html__( 'Highlights Button Gradient Top', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#ff9933', // Saffron
) );

// Highlights: Button Gradient Color 2
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'highlights-button-gradient-color-bottom',
	'label'       => esc_html__( 'Highlights Button Gradient Bottom', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#138808', // Green
) );

// Highlights: Button Hover Shadow Color
Kirki::add_field( 'dashwall_theme', array(
	'type'        => 'color',
	'settings'    => 'highlights-button-hover-shadow-color',
	'label'       => esc_html__( 'Highlights Button Hover Shadow Color', 'dashwall' ),
	'section'     => 'blog',
	'default'     => '#ffdf00', // Golden hover glow
) );
// Add a separator
Kirki::add_field( 'dashwall_theme', [
    'type'        => 'custom',
    'settings'    => 'separator-highlights',
    'section'     => 'blog',
    'default'     => '<hr />',
] );
// Blog: Recent Comments
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'card-comments',
	'label'			=> esc_html__( 'Card: Recent Comments', 'dashwall' ),
	'description'	=> esc_html__( 'Shown below featured carousel', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Search
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'card-search',
	'label'			=> esc_html__( 'Card: Search Field', 'dashwall' ),
	'description'	=> esc_html__( 'Home search field above blog posts', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Excerpt Length
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'excerpt-length',
	'label'			=> esc_html__( 'Excerpt Length', 'dashwall' ),
	'description'	=> esc_html__( 'Max number of words. Set it to 0 to disable.', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> '20',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '1',
	),
) );
// Blog: Comment Count
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'comment-count',
	'label'			=> esc_html__( 'Comment Count', 'dashwall' ),
	'description'	=> esc_html__( 'Comment count with bubbles', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: More Link
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'more-link',
	'label'			=> esc_html__( 'More Link', 'dashwall' ),
	'description'	=> esc_html__( 'Arrow buttons for each entry', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Authorbox
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'author-bio',
	'label'			=> esc_html__( 'Single - Author Bio', 'dashwall' ),
	'description'	=> esc_html__( 'Shows post author description, if it exists', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Post Navigation
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'post-nav',
	'label'			=> esc_html__( 'Single - Post Navigation', 'dashwall' ),
	'description'	=> esc_html__( 'Shows links to the next and previous article', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'sidebar',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'dashwall' ),
		'sidebar'	=> esc_html__( 'Sidebar', 'dashwall' ),
		'content'	=> esc_html__( 'Below content', 'dashwall' ),
	),
) );
// Blog: Single - Related Posts
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'related-posts',
	'label'			=> esc_html__( 'Single - Related Posts', 'dashwall' ),
	'description'	=> esc_html__( 'Shows randomized related articles below the post', 'dashwall' ),
	'section'		=> 'blog',
	'default'		=> 'categories',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'dashwall' ),
		'categories'=> esc_html__( 'Related by categories', 'dashwall' ),
		'tags'		=> esc_html__( 'Related by tags', 'dashwall' ),
	),
) );
// Profile: Profile Image
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'image',
	'settings'		=> 'profile-image',
	'label'			=> esc_html__( 'Profile Image', 'dashwall' ),
	'description'	=> esc_html__( 'Square size ', 'dashwall' ),
	'section'		=> 'profile',
	'default'		=> '',
) );
// Profile: Profile Name
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'text',
	'settings'		=> 'profile-name',
	'label'			=> esc_html__( 'Profile Name', 'dashwall' ),
	'description'	=> esc_html__( 'Your name appears below the image', 'dashwall' ),
	'section'		=> 'profile',
	'default'		=> '',
) );
// Profile: Profile Description
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'textarea',
	'settings'		=> 'profile-description',
	'label'			=> esc_html__( 'Profile Description', 'dashwall' ),
	'description'	=> esc_html__( 'A short description of you', 'dashwall' ),
	'section'		=> 'profile',
	'default'		=> '',
) );
// Footer: Widget Columns
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'footer-widgets',
	'label'			=> esc_html__( 'Footer Widget Columns', 'dashwall' ),
	'description'	=> esc_html__( 'Select columns to enable footer widgets. Recommended number: 3', 'dashwall' ),
	'section'		=> 'footer',
	'default'		=> '0',
	'choices'     => array(
		'0'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'1'	=> get_template_directory_uri() . '/functions/images/footer-widgets-1.png',
		'2'	=> get_template_directory_uri() . '/functions/images/footer-widgets-2.png',
		'3'	=> get_template_directory_uri() . '/functions/images/footer-widgets-3.png',
		'4'	=> get_template_directory_uri() . '/functions/images/footer-widgets-4.png',
	),
) );
// Footer: Social Links
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'footer-social',
	'label'			=> esc_html__( 'Footer Social Links', 'dashwall' ),
	'description'	=> esc_html__( 'Social link icon buttons', 'dashwall' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
// Footer: Custom Logo
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'image',
	'settings'		=> 'footer-logo',
	'label'			=> esc_html__( 'Footer Logo', 'dashwall' ),
	'description'	=> esc_html__( 'Upload your custom logo image', 'dashwall' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Copyright
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'text',
	'settings'		=> 'copyright',
	'label'			=> esc_html__( 'Footer Copyright', 'dashwall' ),
	'description'	=> esc_html__( 'Replace the footer copyright text', 'dashwall' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Credit
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'credit',
	'label'			=> esc_html__( 'Footer Credit', 'dashwall' ),
	'description'	=> esc_html__( 'Footer credit text', 'dashwall' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
function dashwall_kirki_sidebars_select() { 
 	$sidebars = array(); 
 	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) { 
 		$sidebars = $GLOBALS['wp_registered_sidebars']; 
 	} 
 	$sidebars_choices = array(); 
 	foreach ( $sidebars as $sidebar ) { 
 		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name']; 
 	} 
 	if ( ! class_exists( 'Kirki' ) ) { 
 		return; 
 	}
	// Sidebars: Select
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-home',
		'label'			=> esc_html__( 'Home', 'dashwall' ),
		'description'	=> esc_html__( '(is_home) Primary', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-single',
		'label'			=> esc_html__( 'Single', 'dashwall' ),
		'description'	=> esc_html__( '(is_single) Primary - If a single post has a unique sidebar, it will override this.', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive',
		'label'			=> esc_html__( 'Archive', 'dashwall' ),
		'description'	=> esc_html__( '(is_archive) Primary', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive-category',
		'label'			=> esc_html__( 'Archive - Category', 'dashwall' ),
		'description'	=> esc_html__( '(is_category) Primary', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-search',
		'label'			=> esc_html__( 'Search', 'dashwall' ),
		'description'	=> esc_html__( '(is_search) Primary', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-404',
		'label'			=> esc_html__( 'Error 404', 'dashwall' ),
		'description'	=> esc_html__( '(is_404) Primary', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	Kirki::add_field( 'dashwall_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-page',
		'label'			=> esc_html__( 'Default Page', 'dashwall' ),
		'description'	=> esc_html__( '(is_page) Primary - If a page has a unique sidebar, it will override this.', 'dashwall' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'dashwall' ),
	) );
	
 } 
add_action( 'init', 'dashwall_kirki_sidebars_select', 999 ); 
// Social Links: List
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'repeater',
	'label'			=> esc_html__( 'Create Social Links', 'dashwall' ),
	'description'	=> esc_html__( 'Create and organize your social links', 'dashwall' ),
	'section'		=> 'social',
	'tooltip'		=> esc_html__( 'Font Awesome names:', 'dashwall' ) . ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'dashwall' ) . ' </strong></a>',
	'row_label'		=> array(
		'type'	=> 'text',
		'value'	=> esc_html__('social link', 'dashwall' ),
	),
	'settings'		=> 'social-links',
	'default'		=> '',
	'fields'		=> array(
		'social-title'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Title', 'dashwall' ),
			'description'	=> esc_html__( 'Ex: Facebook', 'dashwall' ),
			'default'		=> '',
		),
		'social-icon'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Icon Name', 'dashwall' ),
			'description'	=> esc_html__( 'Font Awesome icons. Ex: fa-facebook ', 'dashwall' ) . ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'dashwall' ) . ' </strong></a>',
			'default'		=> 'fa-',
		),
		'social-link'	=> array(
			'type'			=> 'link',
			'label'			=> esc_html__( 'Link', 'dashwall' ),
			'description'	=> esc_html__( 'Enter the full url for your icon button', 'dashwall' ),
			'default'		=> 'http://',
		),
		'social-color'	=> array(
			'type'			=> 'color',
			'label'			=> esc_html__( 'Icon Color', 'dashwall' ),
			'description'	=> esc_html__( 'Set a unique color for your icon (optional)', 'dashwall' ),
			'default'		=> '',
		),
		'social-target'	=> array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Open in new window', 'dashwall' ),
			'default'		=> false,
		),
	)
) );
// Styling: Enable
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'dynamic-styles',
	'label'			=> esc_html__( 'Dynamic Styles', 'dashwall' ),
	'description'	=> esc_html__( 'Turn on to use the styling options below', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Font
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'select',
	'settings'		=> 'font',
	'label'			=> esc_html__( 'Font', 'dashwall' ),
	'description'	=> esc_html__( 'Select font for the theme', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> 'inter',
	'choices'     => array(
		'titillium-web-ext'		=> esc_html__( 'Titillium Web, Latin-Ext', 'dashwall' ),
		'droid-serif'			=> esc_html__( 'Droid Serif, Latin', 'dashwall' ),
		'source-sans-pro'		=> esc_html__( 'Source Sans Pro, Latin-Ext', 'dashwall' ),
		'lato'					=> esc_html__( 'Lato, Latin', 'dashwall' ),
		'raleway'				=> esc_html__( 'Raleway, Latin', 'dashwall' ),
		'inter'					=> esc_html__( 'Inter, Latin', 'dashwall' ),
		'ubuntu'				=> esc_html__( 'Ubuntu, Latin-Ext', 'dashwall' ),
		'ubuntu-cyr'			=> esc_html__( 'Ubuntu, Latin / Cyrillic-Ext', 'dashwall' ),
		'roboto'				=> esc_html__( 'Roboto, Latin-Ext', 'dashwall' ),
		'roboto-cyr'			=> esc_html__( 'Roboto, Latin / Cyrillic-Ext', 'dashwall' ),
		'roboto-condensed'		=> esc_html__( 'Roboto Condensed, Latin-Ext', 'dashwall' ),
		'roboto-condensed-cyr'	=> esc_html__( 'Roboto Condensed, Latin / Cyrillic-Ext', 'dashwall' ),
		'roboto-slab'			=> esc_html__( 'Roboto Slab, Latin-Ext', 'dashwall' ),
		'roboto-slab-cyr'		=> esc_html__( 'Roboto Slab, Latin / Cyrillic-Ext', 'dashwall' ),
		'playfair-display'		=> esc_html__( 'Playfair Display, Latin-Ext', 'dashwall' ),
		'playfair-display-cyr'	=> esc_html__( 'Playfair Display, Latin / Cyrillic', 'dashwall' ),
		'open-sans'				=> esc_html__( 'Open Sans, Latin-Ext', 'dashwall' ),
		'open-sans-cyr'			=> esc_html__( 'Open Sans, Latin / Cyrillic-Ext', 'dashwall' ),
		'pt-serif'				=> esc_html__( 'PT Serif, Latin-Ext', 'dashwall' ),
		'pt-serif-cyr'			=> esc_html__( 'PT Serif, Latin / Cyrillic-Ext', 'dashwall' ),
		'arial'					=> esc_html__( 'Arial', 'dashwall' ),
		'georgia'				=> esc_html__( 'Georgia', 'dashwall' ),
		'verdana'				=> esc_html__( 'Verdana', 'dashwall' ),
		'tahoma'				=> esc_html__( 'Tahoma', 'dashwall' ),
	),
) );
// Styling: Container Width
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'container-width',
	'label'			=> esc_html__( 'Website Max-width', 'dashwall' ),
	'description'	=> esc_html__( 'Max-width of the home & footer container', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '1730',
	'choices'     => array(
		'min'	=> '720',
		'max'	=> '1920',
		'step'	=> '1',
	),
) );
// Styling: Content Max-width
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'content-width',
	'label'			=> esc_html__( 'Content Max-width', 'dashwall' ),
	'description'	=> esc_html__( 'Max-width of the content on posts and pages', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '1070',
	'choices'     => array(
		'min'	=> '400',
		'max'	=> '1920',
		'step'	=> '1',
	),
) );
// Styling: Header Logo Max-height
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'logo-max-height',
	'label'			=> esc_html__( 'Header Logo Image Max-height', 'dashwall' ),
	'description'	=> esc_html__( 'Your logo image should have the double height of this to be high resolution', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '60',
	'choices'     => array(
		'min'	=> '40',
		'max'	=> '200',
		'step'	=> '1',
	),
) );
// Styling: Dark
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'dark-theme',
	'label'			=> esc_html__( 'Dark Theme', 'dashwall' ),
	'description'	=> esc_html__( 'Use dark instead of light base', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> 'off',
) );
// Styling: Theme Toggle
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'theme-toggle',
	'label'			=> esc_html__( 'Light/Dark Theme Toggle', 'dashwall' ),
	'description'	=> esc_html__( 'Do not use with dark theme enabled', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Invert Dark Logo
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'invert-logo',
	'label'			=> esc_html__( 'Invert Dark Logo Color', 'dashwall' ),
	'description'	=> esc_html__( 'Change color for the logo in dark mode', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Text Hover
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-hover-text',
	'label'			=> esc_html__( 'Text Hover Color', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '#0e979b',
) );
// Styling: Gradient Left
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'color',
	'settings'		=> 'gradient-left',
	'label'			=> esc_html__( 'Gradient Left', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '#00c196',
) );
// Styling: Gradient Right
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'color',
	'settings'		=> 'gradient-right',
	'label'			=> esc_html__( 'Gradient Right', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '#1b6da0',
) );
// Styling: Background Color
Kirki::add_field( 'dashwall_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-background',
	'label'			=> esc_html__( 'Background Color', 'dashwall' ),
	'section'		=> 'styling',
	'default'		=> '#f6f7fa',
) );
