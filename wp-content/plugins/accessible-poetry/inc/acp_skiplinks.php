<?php

// Register Skiplinks Navigations
function acp_register_skiplinks_menu() {
	
	register_nav_menu( 'skiplinks', __( 'Skiplinks', 'acp' ) );
	
	$hp_skiplinks = get_option( 'acp_skiplinks_home', false );
	
	if( $hp_skiplinks ) {
		register_nav_menu( 'skiplinks-home', __( 'Homepage Skiplinks', 'acp' ) );
	}
}

// Skiplinks output
function acp_skiplinks_output() {
	check_ajax_referer( 'acp-sec-skiplinks', 'security' );
	$hp_skiplinks = get_option( 'acp_skiplinks_home', false );
	
	if( $hp_skiplinks ) {
		$menu_name = ( is_home() || is_front_page() )  ? 'skiplinks-home' : 'skiplinks';
	}
	else {
		$menu_name = 'skiplinks';
	}

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_side = get_option( 'acp_skiplinks_side', false );
		$menu_list = '<ul id="acp_skiplinks" role="navigation" class="' . $menu_side . '">';

		foreach ( (array) $menu_items as $key => $menu_item ) {
	    	$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<li><a href="' . $url . '" class="skiplinks">' . $title . '</a></li>';
		}
		$menu_list .= '</ul></nav>';
    } else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
    if( get_option( 'acp_skiplinks', false ) ) {
    	echo $menu_list;
    }
    die();
}
add_action( 'wp_ajax_acp_skiplinks_output', 'acp_skiplinks_output' );
add_action( 'wp_ajax_nopriv_acp_skiplinks_output', 'acp_skiplinks_output' );

// skiplinks essets
function acp_skiplinks_essets() {
	wp_register_style( 'skiplinks', plugins_url( 'accessible-poetry/css/skiplinks.css' ) );
	wp_enqueue_style( 'skiplinks' );
	wp_enqueue_script( 'skiplinks-js', plugins_url( 'accessible-poetry/inc/js/skiplinks.js' ), array('jquery'), '1.0.0', true );
	wp_localize_script( 'skiplinks-js', 'acpsAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'security' => wp_create_nonce( 'acp-sec-skiplinks' )
	));
}

// skiplinks registration
if( get_option( 'acp_skiplinks', false ) ) {
	add_action( 'wp_enqueue_scripts', 'acp_skiplinks_essets' );
	add_action( 'after_setup_theme', 'acp_register_skiplinks_menu' );
}

// skiplinks style
function acp_frontend_styles() {
	$output= '<style>';
	
	if( get_option( 'acp_skiplinks_style', false ) ) {
		$output .= '#acp_skiplinks > li > a {';
		$output .= (get_option('acp_skiplinks_bg')) ? 'background-color:' . get_option( 'acp_skiplinks_bg' ) . ';' : '';
		$output .= (get_option('acp_skiplinks_textColor')) ? 'color:' . get_option( 'acp_skiplinks_textColor' ) . ';' : '';
		$output .= '}';
	}
	$output .= '</style>';
	echo $output;
}
if( get_option( 'acp_skiplinks', false ) ) {
	add_action('wp_head','acp_frontend_styles');
}
