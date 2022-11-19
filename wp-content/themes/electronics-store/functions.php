<?php
/**
 * Electronics Store functions and definitions
 *
 * @package Electronics Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'electronics_store_setup' ) ) :

function electronics_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'electronics_store_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('electronics-store-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'electronics-store' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', electronics_store_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'electronics_store_activation_notice' );
	}	

}
endif;
add_action( 'after_setup_theme', 'electronics_store_setup' );

// Dashboard Theme Notification
function electronics_store_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'electronics-store' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our electronics store theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'electronics-store' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=electronics_store_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'electronics-store' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function electronics_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'electronics-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'electronics-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'electronics-store' ),
		'description'   => __( 'Appears on page sidebar', 'electronics-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'         => __( 'Third Column Sidebar', 'electronics-store' ),
		'description' => __( 'Appears on page sidebar', 'electronics-store' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$electronics_store_widget_areas = get_theme_mod('electronics_store_footer_widget_layout', '4');
	for ($i=1; $i<=$electronics_store_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'electronics-store' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'electronics_store_widgets_init' );

/* Theme Font URL */
function electronics_store_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'ABeeZee:400,400i';
	$font_family[] = 'Allura:400';
    $font_family[] = 'Archivo:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Montserrat:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'PT Sans:400,400i,700,700i';
	$font_family[] = 'PT Serif:400,400i,700,700i';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
	$font_family[] = 'Overpass:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Playball:400';
	$font_family[] = 'Alegreya:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal:400,400i,700,700i';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
	$font_family[] = 'Overpass Mono:300,400,500,600,700';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather:300,300i,400,400i,700,700i,900,900i';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';
	$font_family[] = 'Cabin:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk:400,700';
	$font_family[] = 'Muli';
	$font_family[] = 'Mulish:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Inconsolata:200,300,400,500,600,700,800,900';
	$font_family[] = 'Bitter:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis:200,300,400,500,600,700,800';
	$font_family[] = 'Frank Ruhl Libre:300,400,500,700,900';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen:300,400,700';
	$font_family[] = 'Arvo:400,400i,700,700i';
	$font_family[] = 'Noto Serif:400,400i,700,700i';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text:400,400i,600,600i,700,700i';
	$font_family[] = 'Yanone Kaffeesatz:200,300,400,500,600,700';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville:400,400i,700';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Jost:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum:400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron:400,500,600,700,800,900';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda:400,700';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two:400,400i,700,700i';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Heebo:100,200,300,400,500,700,800,900';
	$font_family[] = 'Hind:300,400,500,600,700';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash:400,700';
	$font_family[] = 'Cormorant Garamond:300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine:300,400,700';
	$font_family[] = 'Economica:400,400i,700,700i';
	$font_family[] = 'Fira Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo:400,400i,700';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre:300,300i,400,400i,700,700i';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher:400,400i,700,700i';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Krub:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Spartan:100,200,300,400,500,600,700,800,900';
	$font_family[] = 'Staatliches';
	$font_family[] = 'Tangerine:400,700';
	$font_family[] = 'Trirong:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov:400,400i,700,700i';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	$font_family[] = 'Work Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Comfortaa:300,400,500,600,700';
	$font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$font_family[] = 'ZCOOL XiaoWei';
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function electronics_store_scripts() {
	wp_enqueue_style( 'electronics-store-font', electronics_store_font_url(), array() );
	wp_enqueue_style( 'electronics-store-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
	wp_enqueue_style( 'electronics-store-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
	wp_enqueue_style( 'electronics-store-block-style', esc_url(get_template_directory_uri()).'/css/block-style.css' );

    // Body
    $electronics_store_body_color = get_theme_mod('electronics_store_body_color', '');
    $electronics_store_body_font_family = get_theme_mod('electronics_store_body_font_family', '');
    $electronics_store_body_font_size = get_theme_mod('electronics_store_body_font_size', '');
 
	// Paragraph
    $electronics_store_paragraph_color = get_theme_mod('electronics_store_paragraph_color', '');
    $electronics_store_paragraph_font_family = get_theme_mod('electronics_store_paragraph_font_family', '');
    $electronics_store_paragraph_font_size = get_theme_mod('electronics_store_paragraph_font_size', '');
	// "a" tag
	$electronics_store_atag_color = get_theme_mod('electronics_store_atag_color', '');
    $electronics_store_atag_font_family = get_theme_mod('electronics_store_atag_font_family', '');
	// "li" tag
	$electronics_store_li_color = get_theme_mod('electronics_store_li_color', '');
    $electronics_store_li_font_family = get_theme_mod('electronics_store_li_font_family', '');
	// H1
	$electronics_store_h1_color = get_theme_mod('electronics_store_h1_color', '');
    $electronics_store_h1_font_family = get_theme_mod('electronics_store_h1_font_family', '');
    $electronics_store_h1_font_size = get_theme_mod('electronics_store_h1_font_size', '');
	// H2
	$electronics_store_h2_color = get_theme_mod('electronics_store_h2_color', '');
    $electronics_store_h2_font_family = get_theme_mod('electronics_store_h2_font_family', '');
    $electronics_store_h2_font_size = get_theme_mod('electronics_store_h2_font_size', '');
	// H3
	$electronics_store_h3_color = get_theme_mod('electronics_store_h3_color', '');
    $electronics_store_h3_font_family = get_theme_mod('electronics_store_h3_font_family', '');
    $electronics_store_h3_font_size = get_theme_mod('electronics_store_h3_font_size', '');
	// H4
	$electronics_store_h4_color = get_theme_mod('electronics_store_h4_color', '');
    $electronics_store_h4_font_family = get_theme_mod('electronics_store_h4_font_family', '');
    $electronics_store_h4_font_size = get_theme_mod('electronics_store_h4_font_size', '');
	// H5
	$electronics_store_h5_color = get_theme_mod('electronics_store_h5_color', '');
    $electronics_store_h5_font_family = get_theme_mod('electronics_store_h5_font_family', '');
    $electronics_store_h5_font_size = get_theme_mod('electronics_store_h5_font_size', '');
	// H6
	$electronics_store_h6_color = get_theme_mod('electronics_store_h6_color', '');
    $electronics_store_h6_font_family = get_theme_mod('electronics_store_h6_font_family', '');
    $electronics_store_h6_font_size = get_theme_mod('electronics_store_h6_font_size', '');

	$electronics_store_custom_css ='
	    body{
		    color:'.esc_html($electronics_store_body_color).'!important;
		    font-family: '.esc_html($electronics_store_body_font_family).'!important;
		    font-size: '.esc_html($electronics_store_body_font_size).'px !important;
		}
		p,span{
		    color:'.esc_attr($electronics_store_paragraph_color).'!important;
		    font-family: '.esc_attr($electronics_store_paragraph_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_paragraph_font_size).'!important;
		}
		a{
		    color:'.esc_attr($electronics_store_atag_color).'!important;
		    font-family: '.esc_attr($electronics_store_atag_font_family).';
		}
		li{
		    color:'.esc_attr($electronics_store_li_color).'!important;
		    font-family: '.esc_attr($electronics_store_li_font_family).';
		}
		h1{
		    color:'.esc_attr($electronics_store_h1_color).'!important;
		    font-family: '.esc_attr($electronics_store_h1_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_attr($electronics_store_h2_color).'!important;
		    font-family: '.esc_attr($electronics_store_h2_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_attr($electronics_store_h3_color).'!important;
		    font-family: '.esc_attr($electronics_store_h3_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_attr($electronics_store_h4_color).'!important;
		    font-family: '.esc_attr($electronics_store_h4_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_attr($electronics_store_h5_color).'!important;
		    font-family: '.esc_attr($electronics_store_h5_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_attr($electronics_store_h6_color).'!important;
		    font-family: '.esc_attr($electronics_store_h6_font_family).'!important;
		    font-size: '.esc_attr($electronics_store_h6_font_size).'!important;
		}'
	;
	wp_add_inline_style( 'electronics-store-basic-style',$electronics_store_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'electronics-store-basic-style',$electronics_store_custom_css );

	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js' );
	wp_enqueue_script( 'electronics-store-custom-jquery', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'electronics_store_scripts' );

/*radio button sanitization*/

function electronics_store_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function electronics_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/**
 * Enqueue block editor style
 */
function electronics_store_block_editor_styles() {
	wp_enqueue_style( 'electronics-store-font', electronics_store_font_url(), array() );
	wp_enqueue_style( 'electronics-store-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'electronics_store_block_editor_styles' );

function electronics_store_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );

  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'electronics_store_loop_columns');
if (!function_exists('electronics_store_loop_columns')) {
	function electronics_store_loop_columns() {
		$columns = get_theme_mod( 'electronics_store_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'electronics_store_shop_per_page', 9 );
function electronics_store_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'electronics_store_product_per_page', 9 );
	return $cols;
}

// URL DEFINES
define('ELECTRONICS_STORE_SITE_URL',__('https://www.themescaliber.com/themes/free-electronics-wordpress-theme/','electronics-store'));
define('ELECTRONICS_STORE_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-electronics-store/','electronics-store'));
define('ELECTRONICS_STORE_SUPPORT',__('https://wordpress.org/support/theme/electronics-store/','electronics-store'));
define('ELECTRONICS_STORE_REVIEW',__('https://wordpress.org/support/theme/electronics-store/reviews/','electronics-store'));
define('ELECTRONICS_STORE_BUY_NOW',__('https://www.themescaliber.com/themes/electronics-store-wordpress-theme/','electronics-store'));
define('ELECTRONICS_STORE_LIVE_DEMO',__('https://www.themescaliber.com/electronics-store-pro/','electronics-store'));
define('ELECTRONICS_STORE_PRO_DOC',__('https://themescaliber.com/demo/doc/electronics-store-pro/','electronics-store'));
define('ELECTRONICS_STORE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','electronics-store'));
if ( ! defined( 'ELECTRONICS_STORE_PRO_NAME' ) ) {
	define( 'ELECTRONICS_STORE_PRO_NAME', __( 'Electronic Pro Theme', 'electronics-store' ));
}
if ( ! defined( 'ELECTRONICS_STORE_PRO_URL' ) ) {
	define( 'ELECTRONICS_STORE_PRO_URL', esc_url('https://www.themescaliber.com/themes/electronics-store-wordpress-theme/'));
}

function electronics_store_credit_link() {
    echo "<a href=".esc_url(ELECTRONICS_STORE_SITE_URL)." target='_blank'>".esc_html__('Electronics Store WordPress Theme','electronics-store')."</a>";
}

function electronics_store_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function electronics_store_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'electronics_store_post_navigation' ) ) {
	function electronics_store_post_navigation() {
		$electronics_store_pagination_type = get_theme_mod( 'electronics_store_post_navigation_type', 'numbers' );
		if ( $electronics_store_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'pgrev_text'          => __( 'Previous page', 'electronics-store' ),
	            'next_text'          => __( 'Next page', 'electronics-store' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'electronics-store' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* TGM. */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';

/* Block Pattern */
require get_template_directory() . '/block-patterns.php';