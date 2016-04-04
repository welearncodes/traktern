<?php

/**
   Toolbar output
**/
function acp_toolbar_ajax() {
	check_ajax_referer( 'acp-sec-toolbar', 'security' );
	
	$toolbar_side = (get_option( 'acp_toolbar_side', false )) ? get_option( 'acp_toolbar_side', false ) : 'left';
	$icon_position = (get_option( 'acp_toolbar_icon_pos', false )) ? get_option( 'acp_toolbar_icon_pos', false ) : 'top';
	$icon_size = (get_option('acp_toolbar_icon_size', false)) ? get_option('acp_toolbar_icon_size', true) : 'small';

	$customtags = (get_option('acp_fontsizer_tags')) ? get_option('acp_fontsizer_tags') : 'p,span,h1,h2,h3,h4,h5,h6,a,header,footer,address,caption,label';
	$sizerjump = (get_option( 'acp_fontsizer_size' )) ? '2' : get_option( 'acp_fontsizer_size' );
	
	$underlines = (get_option('acp_underlines', false)) ? get_option('acp_underlines', false) : '0';
	
	
	
	if(get_option('acp_fontsizer_hide')) {
		$data_min_fontsizer = 'data-min-fontsize="' . get_option('acp_fontsizer_size_min', false) . '"';
	}

if( get_option('acp_toolbar_mobile', false) && wp_is_mobile() ) {
	
}
else {
?>
<nav id="acp_toolbarWrap" role="navigation"  class="close-toolbar acp-hide <?php echo $toolbar_side; ?>" <?php echo $data_min_fontsizer;?> data-max-fontsize="<?php echo get_option('acp_fontsizer_size_max', false);?>">
	<button class="acp_hide_toolbar <?php echo $icon_position; ?> acp-icon-<?php echo $icon_size; ?>">
		<span><?php _e('Accessibility', 'acp'); ?></span>
	</button>
	
	<ul id="acp_toolbar" data-underlines="<?php echo $underlines; ?>" aria-hidden="true">
		<h3 tabindex="-1"><?php _e('Accessibility Toolbar', 'acp'); ?></h3>
		
		<?php if( !get_option('acp_fontsizer_hide', false)) : ?>
		<li id="acp-fontsizer" data-size-tags="<?php echo $customtags; ?>" data-size-jump="<?php echo $sizerjump; ?>">
			<button class="small-letter" tabindex="-1">
				<i class="fi-zoom-out"></i>
				<span><?php _e('Decrease font size', 'acp');?></span>
			</button>
			<button class="big-letter" tabindex="-1">
				<i class="fi-zoom-in"></i>
				<span><?php _e('Increase font size', 'acp'); ?></span>
			</button>
			<button class="acp-font-reset acp-hide" tabindex="-1">
				<i class="fi-loop"></i>
				<span><?php _e('Default font sizes', 'acp'); ?></span>
			</button>
		</li>
		<?php endif; ?>
		
		<?php if( !get_option('acp_contrast_hide', false) ): ?>
		<li id="acp-contrast">
			<button class="acp-dark-btn" tabindex="-1">
				<i class="fi-background-color"></i>
				<span><?php _e('Dark contrast', 'acp'); ?></span>
			</button>
			<button class="acp-bright-btn" tabindex="-1">
				<i class="fi-lightbulb"></i>
				<span><?php _e('Bright contrast', 'acp'); ?></span>
			</button>
			<button class="acp-grayscale" tabindex="-1">
				<i class="fi-contrast"></i>
				<span><?php _e('Grayscale', 'acp'); ?></span>
			</button>
			<button class="acp-contrast-reset acp-normal acp-hide" tabindex="-1">
				<i class="fi-loop"></i>
				<span><?php _e('Reset contrast', 'acp'); ?></span>
			</button>
		</li>
		<?php endif; ?>
		
		<?php if( !get_option('acp_keyboard_hide', false) ): ?>
		<li id="acp-keyboard-navigation">
			<button id="acp-keyboard" tabindex="-1">
				<i class="fi-layout"></i>
				<span><?php _e('Keyboard Navigation', 'acp'); ?></span>
			</button>
		</li>
		<?php endif; ?>
		
		<?php if( !get_option('acp_underline_hide', false) || !get_option('acp_toolbar_hidereadable', false) ) : ?>
		<li id="acp-links">
		<?php if( !get_option('acp_toolbar_hidereadable', false) ) : ?>
			<button class="acp-toggle-font" tabindex="-1">
				<i class="fi-text-color"></i>
				<span><?php _e('Readable font', 'acp'); ?></span>
			</button>
			<?php endif; ?>
			
			<?php if( !get_option('acp_underline_hide', false) ) : ?>
			<button class="acp-toggle-underline" tabindex="-1">
				<i class="fi-underline"></i>
				<span><?php _e('Toggle underline', 'acp'); ?></span>
			</button>
			<?php endif; ?>
		</li>
		<?php endif; ?>
	</ul>
	<?php if(get_option('acp_feedback_url', false) || get_option('acp_feedback', false)) : ?>
	<div class="acp-additional-buttons">
		<?php if(get_option('acp_feedback_text', false) && get_option('acp_feedback', false)) :?>
		<a href="<?php echo get_option('acp_feedback_url', false);?>" class="acp-feedback" tabindex="-1">
			<div class="acp-icon-wrap">
				<i class="fi-burst"></i>
			</div>
			<div class="acp-txt-wrap">
				<span><?php
					if( $dec = get_option('acp_feedback_text', false) ) {
						echo $dec;
					}
					else {
						_e('Feedback', 'acp');
					}
				?></span>
			</div>
		</a>
		<?php endif; ?>
		<?php if(get_option('acp_declaration_url', false) && get_option('acp_declaration', false)) :?>
		<a href="<?php echo get_option('acp_declaration_url', false);?>" class="acp-declaration" tabindex="-1">
			<div class="acp-icon-wrap">
				<i class="fi-universal-access"></i>
			</div>
			<div class="acp-txt-wrap">
				<span><?php
					if( $dec = get_option('acp_declaration_text', false) ) {
						echo $dec;
					}
					else {
						_e('Accessibility Declaration', 'acp');
					}
				?></span>
			</div>
		</a>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<div class="acp-author" aria-hidden="true">
		<a href="http://amitmoreno.com/" title="נגישות אתרי וורדפרס עם עמית מורנו" target="_blank" tabindex="-1"><span>Accessible Poetry</span></a>
	</div>
</nav>
<?php }
	die();
}
add_action( 'wp_ajax_acp_toolbar_ajax', 'acp_toolbar_ajax' );
add_action( 'wp_ajax_nopriv_acp_toolbar_ajax', 'acp_toolbar_ajax' );

/**
   Toolbar essets
**/
function acp_toolbar_style() {
	
	// foundation icons font
	wp_register_style( 'foundation', plugins_url( 'accessible-poetry/foundation/foundation-icons.css' ) );
	wp_enqueue_style( 'foundation' );
	
	// toolbar stylesheet
	wp_register_style( 'acp_toolbar', plugins_url( 'accessible-poetry/css/toolbar.css' ) );
	wp_enqueue_style( 'acp_toolbar' );
	
	// toolbar scripts
	if(get_option('acp_toolbar_display') ) {
		if( wp_is_mobile() && get_option('acp_toolbar_mobile')) {
		}
		else {
			wp_enqueue_script( 'toolbar', plugins_url( 'accessible-poetry/inc/js/toolbar.js' ), array('jquery'), false, true );
			wp_localize_script( 'toolbar', 'acptAjax', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce( 'acp-sec-toolbar' )
			));
		}
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'acp_toolbar_style' );

/**
   Toggle toolbar buttons animation
**/
function acp_toolbar_animation( $classes ) {
	$classes[] = 'acp-no-toolbar-animation';
	return $classes;
}
if( get_option( 'acp_toolbar_animation', false ) ) {
	add_filter( 'body_class', 'acp_toolbar_animation' );
}
