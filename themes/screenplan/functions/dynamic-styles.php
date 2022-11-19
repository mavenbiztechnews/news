<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if ( ! function_exists( 'screenplan_hex2rgb' ) ) {

	function screenplan_hex2rgb( $hex, $array=false ) {
		$hex = str_replace("#", "", $hex);

		if ( strlen($hex) == 3 ) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}

		$rgb = array( $r, $g, $b );
		if ( !$array ) { $rgb = implode(",", $rgb); }
		return $rgb;
	}
	
}	


/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'screenplan_enqueue_google_fonts' ) ) {

	function screenplan_enqueue_google_fonts () {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { wp_enqueue_style( 'titillium-web-ext', '//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }		
			if ( get_theme_mod( 'font' ) == 'droid-serif' )	{ wp_enqueue_style( 'droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700' ); }				
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' )	{ wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'lato' ) { wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700' ); }
			if ( get_theme_mod( 'font' ) == 'raleway' )	{ wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu' ) { wp_enqueue_style( 'ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) { wp_enqueue_style( 'ubuntu-cyr', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext' ); }
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) ) { wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-cyr' ) { wp_enqueue_style( 'roboto-cyr', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed' ) { wp_enqueue_style( 'roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) { wp_enqueue_style( 'roboto-condensed-cyr', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab' ) { wp_enqueue_style( 'roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) { wp_enqueue_style( 'roboto-slab-cyr', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display' ) { wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) { wp_enqueue_style( 'playfair-display-cyr', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans' ) { wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) { wp_enqueue_style( 'open-sans-cyr', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif' ) { wp_enqueue_style( 'pt-serif', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) { wp_enqueue_style( 'pt-serif-cyr', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext' ); }
		}
	}	
	
}
add_action( 'wp_enqueue_scripts', 'screenplan_enqueue_google_fonts' ); 	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'screenplan_dynamic_css' ) ) {

	function screenplan_dynamic_css() {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
		
			// rgb values
			$color_1 = get_theme_mod('color-1');
			$color_1_rgb = screenplan_hex2rgb($color_1);
			
			// start output
			$styles = '';		
			
			// google fonts
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { $styles .= 'body { font-family: "Titillium Web", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'droid-serif' ) { $styles .= 'body { font-family: "Droid Serif", serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' ) { $styles .= 'body { font-family: "Source Sans Pro", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'lato' ) { $styles .= 'body { font-family: "Lato", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'raleway' ) { $styles .= 'body { font-family: "Raleway", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'ubuntu' ) || ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) ) { $styles .= 'body { font-family: "Ubuntu", Arial, sans-serif; }'."\n"; }	
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) || ( get_theme_mod( 'font' ) == 'roboto-cyr' ) ) { $styles .= 'body { font-family: "Roboto", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-condensed' ) || ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) ) { $styles .= 'body { font-family: "Roboto Condensed", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-slab' ) || ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) ) { $styles .= 'body { font-family: "Roboto Slab", Arial, sans-serif; }'."\n"; }			
			if ( ( get_theme_mod( 'font' ) == 'playfair-display' ) || ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) ) { $styles .= 'body { font-family: "Playfair Display", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'open-sans' ) || ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) )	{ $styles .= 'body { font-family: "Open Sans", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'pt-serif' ) || ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) ) { $styles .= 'body { font-family: "PT Serif", serif; }'."\n"; }	
			if ( get_theme_mod( 'font' ) == 'arial' ) { $styles .= 'body { font-family: Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'georgia' ) { $styles .= 'body { font-family: Georgia, serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'verdana' ) { $styles .= 'body { font-family: Verdana, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'tahoma' ) { $styles .= 'body { font-family: Tahoma, sans-serif; }'."\n"; }
			
			// container width
			if ( get_theme_mod('container-width','1200') != '1200' ) {			
				if ( get_theme_mod( 'boxed' ) ) { 
					$styles .= '.boxed #wrapper { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
				else {
					$styles .= '.full-width #wrapper { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
			}
			// primary color
			if ( get_theme_mod('color-1','#ffbd2f') != '#ffbd2f' ) {
				$styles .= '
#header,
#profile-image:before,
.toggle-search,
.s1 { background-color: '.esc_attr( get_theme_mod('color-1') ).'; }

.widget_calendar caption,
.alx-tabs-nav li a,
.alx-tabs-nav li a:hover { color: '.esc_attr( get_theme_mod('color-1') ).'; }

.site-title a { color: #fff; }
.site-description { color: rgba(255,255,255,0.5); }

#header .social-links .social-tooltip { color: rgba(255,255,255,0.8); box-shadow: 0 0 1px rgba(255,255,255,0.4); }
#header .social-links .social-tooltip:hover { background: #fff; color: #222;  }

.toggle-search .svg-icon { fill: rgba(255,255,255,0.8); }

/*  widgets
/* ------------------------------------ */
.widget { color: rgba(255,255,255,0.6); }
.widget a { color: rgba(255,255,255,0.8); }
.widget a:hover { color: #fff; }
.widget > h3,
.widget > h3 a,
.widget > h3 a:hover { color: #fff; }
.widget select { border-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); }
.widget select option { color: rgba(0,0,0,0.5); }

/*  widgets : icons
/* ------------------------------------ */
.widget > ul li:before,
.widget > ul li a:before,
.widget > div > ul li a:before  { color: rgba(255,255,255,0.6); opacity: 0.5; }
.widget_calendar caption:before,
.widget > ul li a:hover:before { color: #fff; }

/*  widgets : common
/* ------------------------------------ */
.widget_archive ul li,
.widget_categories ul li,
.widget_links ul li,
.widget_recent_comments ul li,
.widget_recent_entries ul li { color: rgba(255,255,255,0.6); }

/*  widget : pages / custom menu
/* ------------------------------------ */

/*  widget : rss
/* ------------------------------------ */
.widget_rss ul li a { color: #fff; }
.widget_rss ul li span.rss-date { color: rgba(255,255,255,0.8); }
.widget_rss ul li cite { color: rgba(255,255,255,0.5); }

/*  widget : search
/* ------------------------------------ */
.widget_search input.search { background: transparent; color: rgba(255,255,255,0.7); border: 1px solid rgba(255,255,255,0.1); }
.widget_search input.search:focus { color: rgba(255,255,255,0.9); }

/*  widget : calendar
/* ------------------------------------ */
.widget_calendar a:hover { color: rgba(255,255,255,0.8)!important; }
.widget_calendar a { color: #fff; }
.widget_calendar thead { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.5); -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.1); box-shadow: inset 0 -1px 0 rgba(0,0,0,0.1); }
.widget_calendar caption { color: rgba(255,255,255,0.9); background: rgba(255,255,255,0.2); }
.widget_calendar th, 
.widget_calendar td { border-color: rgba(255,255,255,0.1);  }

/*  custom widget : alxtabs / alxposts
/* ------------------------------------ */
.alx-tabs-nav li a { border-color: rgba(255,255,255,0.1); }
.alx-tabs-nav li.active a { color: #fff; border-bottom-color: #fff; }

.alx-tab .tab-item-date, 
.alx-tab .tab-item-name, 
.alx-posts .post-item-date { color: rgba(255,255,255,0.5); }

				'."\n";
			}
			// link color
			if ( get_theme_mod('color-link','#333333') != '#333333' ) {
				$styles .= '
.entry a,
.entry-list .entry-title a { color: '.esc_attr( get_theme_mod('color-link') ).'; }
.entry a { box-shadow: 0 1px 0 '.esc_attr( get_theme_mod('color-link') ).'; }
				'."\n";
			}
			// screen border color
			if ( get_theme_mod('color-screen-border','#222222') != '#222222' ) {
				$styles .= '
#wrapper-inner { background-color: '.esc_attr( get_theme_mod('color-screen-border') ).'; }
				'."\n";
			}
			// screen border outer color
			if ( get_theme_mod('color-screen-border-outer','#cccccc') != '#cccccc' ) {
				$styles .= '
#wrapper { background-color: '.esc_attr( get_theme_mod('color-screen-border-outer') ).'; }
				'."\n";
			}
			// background color
			if ( get_theme_mod('color-background','#eeeeee') != '#eeeeee' ) {
				$styles .= '
body { background-color: '.esc_attr( get_theme_mod('color-background') ).'; }
				'."\n";
			}
			// header logo max-height
			if ( get_theme_mod('logo-max-height','60') != '60' ) {
				$styles .= '.site-title a img { max-height: '.esc_attr( get_theme_mod('logo-max-height') ).'px; }'."\n";
			}
			// header text color
			if ( get_theme_mod( 'header_textcolor' ) != '' ) {
				$styles .= '.site-title a, .site-description { color: #'.esc_attr( get_theme_mod( 'header_textcolor' ) ).'; }'."\n";
			}
			wp_add_inline_style( 'screenplan-style', $styles );	
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'screenplan_dynamic_css' );
