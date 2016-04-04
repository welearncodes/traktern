<?php
function acp_custom_contrast() {
	
	$bright = get_option('acp_contrast_bright', false);
	$dark = get_option('acp_contrast_dark', false);
	
	// bright backgorund
	if( get_option( 'acp_contrast_bright_bg', false ) && $bright )
		$bright_bg = get_option( 'acp_contrast_bright_bg', false );	
	else
		$bright_bg = 'white';
	
	// bright text
	if( get_option( 'acp_contrast_bright_text', false ) && $bright )
		$bright_txt = get_option( 'acp_contrast_bright_text', false );	
	else
		$bright_txt = 'black';
	
	// bright link
	if( get_option( 'acp_contrast_bright_link', false ) && $bright )
		$bright_lnk = get_option( 'acp_contrast_bright_text', false );	
	else
		$bright_lnk = 'blue';
	
	// bright link on hover
	if( get_option( 'acp_contrast_bright_linkHover', false ) && $bright )
		$bright_lnkHover = get_option( 'acp_contrast_bright_linkHover', false );	
	else
		$bright_lnkHover = 'blue';
	
	// dark backgorund
	if( get_option( 'acp_contrast_dark_bg', false ) && $dark )
		$dark_bg = get_option( 'acp_contrast_dark_bg', false );	
	else
		$dark_bg = 'black';
	
	// dark text
	if( get_option( 'acp_contrast_dark_text', false ) && $dark )
		$dark_txt = get_option( 'acp_contrast_dark_text', false );	
	else
		$dark_txt = 'white';
	
	// dark link
	if( get_option( 'acp_contrast_dark_link', false ) && $dark )
		$dark_lnk = get_option( 'acp_contrast_dark_text', false );	
	else
		$dark_lnk = 'yellow';
	
	// dark link on hover
	if( get_option( 'acp_contrast_dark_linkHover', false ) && $dark )
		$dark_lnkHover = get_option( 'acp_contrast_dark_linkHover', false );	
	else
		$dark_lnkHover = '';
	
	echo '<style>';
	
	// dark
	
	if( !get_option('acp_contrast_disable_dark', false) && get_option('acp_contrast_dark_cusom', false) ) {
		
		// body
		echo 'body.acp-dark {background:' . $dark_bg . ' !important; color:' . $dark_txt . ' !important;}';
		
		// links
		echo 'body.acp-dark a {color:' . $dark_lnk . ' !important;}';
		echo 'body.acp-dark a:hover, body.acp-dark a:focus {color:' . $dark_lnkHover . ' !important;}';
	}
	
	// bright
	if( !get_option('acp_contrast_disable_bright', false) && get_option('acp_contrast_bright_custom', false) ) {
		
		// body
		echo 'body.acp-bright {background:' . $bright_bg . ' !important; color:' . $bright_txt . ' !important;}';
		
		// links
		echo 'body.acp-bright a {color:' . $bright_lnk . ' !important;}';
		echo 'body.acp-bright a:hover, body.acp-bright a:focus {color:' . $bright_lnkHover . ' !important;}';
	}
	
	// custom tags for contrast
	
	$additionals = explode(",", get_option('acp_contrast_add', false) );
	$additionalsNum = count($additionals);
	$i = 0;
	
	//dark
	
	if( get_option('acp_contrast_custom', false) ) {
		foreach($additionals as $additional){
			++$i;
	        echo 'body.acp-dark ' . $additional;
	        if( $i != $additionalsNum ) echo ',';
	    }
	}
	else {
		echo 'body.acp-dark, body.acp-dark *';
	}
    echo '{background-color:' . $dark_bg . ' !important; color:' . $dark_txt . ' !important;}';
	
	// bright
	
	$i = 0;
	if( get_option('acp_contrast_custom', false) ) {
		foreach($additionals as $additional){
			++$i;
	        echo 'body.acp-bright ' . $additional;
	        if( $i != $additionalsNum ) echo ',';
	    }
	}
	else {
		echo 'body.acp-bright, body.acp-bright *';
	}
    echo '{background-color:' . $bright_bg . ' !important; color:' . $dark_bg . ' !important;}';
	
	echo '</style>';
	
}
add_action( 'wp_head', 'acp_custom_contrast');
