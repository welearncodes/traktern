<?php

/**
   Settings integration
**/
function acp_panel_init() {
	
	$settings = array(
		
		// General
		'acp_htmllang',
		
		// skiplinks
		'acp_skiplinks',
		'acp_skiplinks_side',
		'acp_skiplinks_home',
		'acp_skiplinks_style',
		'acp_skiplinks_bg',
		'acp_skiplinks_textColor',
		
		// Toolbar
		'acp_toolbar',
		'acp_toolbar_mobile',
		'acp_toolbar_side',
		'acp_toolbar_icon_pos',
		'acp_toolbar_icon_size',
		'acp_toolbar_hidereadable',
		'acp_fontsizer_hide',
		'acp_contrast_hide',
		'acp_underline_hide',
		'acp_keyboard_hide',
		'acp_toolbar_display',
		
		'acp_feedback',
		'acp_feedback_text',
		'acp_feedback_url',
		
		'acp_declaration',
		'acp_declaration_text',
		'acp_declaration_url',
		
		// Contrast
		'acp_contrast',
		'acp_contrast_custom',
		'acp_contrast_add',
		
		'acp_contrast_bright',
		'acp_contrast_bright_bg',
		'acp_contrast_bright_text',
		'acp_contrast_bright_link',
		'acp_contrast_bright_linkHover',
		'acp_contrast_disable_bright',
		
		'acp_contrast_dark',
		'acp_contrast_dark_bg',
		'acp_contrast_dark_text',
		'acp_contrast_dark_link',
		'acp_contrast_dark_linkHover',
		'acp_contrast_disable_dark',
		
		// Font size
		'acp_fontsizer',
		'acp_fontsizer_size',
		'acp_fontsizer_size_min',
		'acp_fontsizer_size_max',
		'acp_fontsizer_tags',
		'acp_fontsizer_customtags',
		
		// Links
		'acp_rolelink',
		'acp_removetarget',
		'acp_linksaria',
		'acp_focuslinks',
		'acp_underlines',
		
		// Images
		'acp_imageforcealt',
		'acp_imagealt',
	);
	// general
	
	
	foreach ($settings as $setting) {
		register_setting( 'accessible-poetry', $setting );
	}
	
}
add_action( 'admin_init', 'acp_panel_init' );

/**
   Add the setting main page
**/
function acp_setting_page() {
	add_menu_page(
		'custom menu title',
		'Accessible Poetry',
		'manage_options',
		'accessible-poetry',
		'acp_settings_page_callback',
		'dashicons-yes',
		72
	);
}
add_action( 'admin_menu', 'acp_setting_page' );

/**
   The panel
**/
function acp_settings_page_callback() {
	wp_enqueue_style( 'accessible-poetry' );
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1524500197823429";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="accessible-poetry" class="wrap">
	<div class="acp-field acp-intro">
		<div class="side-one">
			<h1>Accessible Poetry <small>by Amit Moreno</small></h1>
			<p><?php _e('Basic Accessibility tools for WordPress', 'acp');?></p>
		</div>
		<div class="side-two">
			<nav id="acp-top-nav">
				<a href="http://www.amitmoreno.com/" class="author" target="_blank">
					<img src="<?php echo plugins_url('accessible-poetry/img');?>/icon-1.png" />
					<span><?php _e('Author', 'acp');?></span>
				</a>
				<a href="https://wordpress.org/plugins/accessible-poetry/" class="plugin" target="_blank">
					<img src="<?php echo plugins_url('accessible-poetry/img');?>/icon-3.png" />
					<span><?php _e('Plugin Page', 'acp');?></span>
				</a>
				<a href="https://wordpress.org/support/view/plugin-reviews/accessible-poetry" class="rate" target="_blank">
					<img src="<?php echo plugins_url('accessible-poetry/img');?>/icon-2.png" />
					<span><?php _e('Rate Us', 'acp');?></span>
				</a>
			</nav>
		</div>
	</div>
	<div class="meta-row">
	<div class="metabox-holder">
		<div id="normal-sortables" class="meta-box-sortables ui-sortable ui-sortable-disabled">
			<form method="post" action="options.php">
				<?php settings_fields( 'accessible-poetry' ); ?>
				<?php do_settings_sections( 'accessible-poetry' ); ?>
				
				<!-- General -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('General', 'acp');?></h3>
					<div class="inside">
						
						<h4><?php _e('Language', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_htmllang" id="acp_htmllang" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_htmllang' ) ); ?> />
							<label for="acp_htmllang"><?php _e('Add language attribute to the html tag.', 'acp');?></label>
						</div>
						
						<h4><?php _e('Images', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_imageforcealt" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_imageforcealt' ) ); ?> />
							<label for="acp_imageforcealt"><?php _e('Force using ALT on all images.', 'acp');?></label>
						</div>

						<div class="acp-field-acp_imagealt">
							<h4><?php _e('Replacement for the image ALT', 'acp'); ?></h4>
						    <label>
						        <input type="radio" name="acp_imagealt" value="none" <?php checked( 'none', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'None', 'acp' )?>
						    </label><br />
						    <label>
						        <input type="radio" name="acp_imagealt" value="title" <?php checked( 'title', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'Use attachment title as ALT for images with no alt', 'acp' )?>
						    </label><br />
						    <label>
								<input type="radio" name="acp_imagealt" value="desc" <?php checked( 'desc', get_option( 'acp_imagealt' ) ); ?> />
						        <?php _e( 'Use attachment description as ALT for images with no alt', 'acp' )?>
						    </label>
						</div>
						
						<h4><?php _e('Links', 'acp');?></h4>

						<div class="acp-field-wrap">
							<input name="acp_rolelink" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_rolelink' ) ); ?> />
							<label for="acp_rolelink"><?php _e('Add role="link" to all the &lt;a&gt; tag.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_removetarget" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_removetarget' ) ); ?> />
							<label for="acp_removetarget"><?php _e('Force Open links in current tab (Remove the "target" attribute from all links).', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_linksaria" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_linksaria' ) ); ?> />
							<label for="acp_linksaria"><?php _e('Change all title attributes on links to aria-label.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_focuslinks" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_focuslinks' ) ); ?> />
							<label for="acp_focuslinks"><?php _e('Add outline to all links on focus mode.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_underlines" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_underlines' ) ); ?> />
							<label for="acp_underlines"><?php _e('Force underline for links.', 'acp');?></label>
						</div>

					</div>
				</section>
				
				<!-- Contrast -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Contrast', 'acp');?></h3>
					<div class="inside">
						<div class="acp-field-wrap">
							<input name="acp_contrast_custom" id="acp_contrast_custom" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_custom' ) ); ?> />
							<label for="acp_contrast_custom"><?php _e('Use your own elements with the Contrast modes (you can add CSS classes & ID\'s), separate elements with comma.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap acp_contrast_add-wrap">
							<label for="acp_contrast_add"><?php _e('Add here your custom elements Classes & ID\'s, no need to write the BODY tag (don\'t forget to separate elements with comma)', 'acp');?></label><br />
							<input name="acp_contrast_add" type="text" value="<?php if( get_option( 'acp_contrast_add' ) ){echo get_option( 'acp_contrast_add' );} ?>" />
						</div>
						<h4><?php _e('Bright Contrast', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_contrast_disable_bright" id="acp_contrast_disable_bright" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_disable_bright' ) ); ?> />
							<label for="acp_contrast_disable_bright"><?php _e('Don\'t use any style for the Bright option.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_bright" id="acp_contrast_bright" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_bright' ) ); ?> />
							<label for="acp_contrast_bright"><?php _e('Use custom colors for the Bright option.', 'acp');?></label>
						</div>
						<div id="acp-bright-set" class="hidden">
							<hr />
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_bg"><?php _e('Custom Color for the Background of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_bg" type="text" value="<?php if( get_option( 'acp_contrast_bright_link' ) ){echo get_option( 'acp_contrast_bright_bg' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_text"><?php _e('Custom Color for the Text of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_text" type="text" value="<?php if( get_option( 'acp_contrast_bright_text' ) ){echo get_option( 'acp_contrast_bright_text' );} ?>" class="meta-color"  />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_link"><?php _e('Custom Color for the Link of the Bright option.', 'acp');?></label><br />
								<input name="acp_contrast_bright_link" type="text" value="<?php if( get_option( 'acp_contrast_bright_link' ) ){echo get_option( 'acp_contrast_bright_link' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_bright_linkHover"><?php _e('Custom Color for the Link of the Bright option in hover & focus modes.', 'acp');?></label><br />
								<input name="acp_contrast_bright_linkHover" type="text" value="<?php if( get_option( 'acp_contrast_bright_linkHover' ) ){echo get_option( 'acp_contrast_bright_linkHover' );} ?>" class="meta-color" />
							</div>
							<hr />
						</div>
						<h4><?php _e('Dark Contrast', 'acp');?></h4>
						<div class="acp-field-wrap">
							<input name="acp_contrast_disable_dark" id="acp_contrast_disable_dark" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_disable_dark' ) ); ?> />
							<label for="acp_contrast_disable_dark"><?php _e('Don\'t use any style for the Dark option.', 'acp');?></label>
						</div>
						<div class="acp-field-wrap">
							<input name="acp_contrast_dark" id="acp_contrast_dark" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_dark' ) ); ?> />
							<label for="acp_contrast_dark"><?php _e('Use custom colors for the Dark option.', 'acp');?></label>
						</div>
						<div id="acp-dark-set" class="hidden">
							<hr />
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_bg"><?php _e('Custom Color for the Background in the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_bg" type="text" value="<?php if( get_option( 'acp_contrast_dark_bg' ) ){echo get_option( 'acp_contrast_dark_bg' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_text"><?php _e('Custom Color for the Text in the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_text" type="text" value="<?php if( get_option( 'acp_contrast_dark_text' ) ){echo get_option( 'acp_contrast_dark_text' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_link"><?php _e('Custom Color for the Link of the Dark option.', 'acp');?></label><br />
								<input name="acp_contrast_dark_link" type="text" value="<?php if( get_option( 'acp_contrast_dark_link' ) ){echo get_option( 'acp_contrast_dark_link' );} ?>" class="meta-color" />
							</div>
							<div class="acp-field-wrap">
								<label for="acp_contrast_dark_linkHover"><?php _e('Custom Color for the Link of the Dark option in hover & focus modes.', 'acp');?></label><br />
								<input name="acp_contrast_dark_linkHover" type="text" value="<?php if( get_option( 'acp_contrast_dark_linkHover' ) ){echo get_option( 'acp_contrast_dark_linkHover' );} ?>" class="meta-color" />
							</div>
						</div>
					</div>
				</section>
				
				<!-- Font Sizer -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Font Sizer', 'acp');?></h3>
					<div class="inside">
						
						<div class="acp-field-wrap">
							<input name="acp_fontsizer_customtags" id="acp_fontsizer_customtags" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_fontsizer_customtags' ) ); ?> />
							<label for="acp_fontsizer_customtags"><?php _e('Use custom tags, classes & id\'s with the Font sizer.', 'acp');?></label>
						</div>
						<div id="acp-fontsizer-customtags" class="hidden">
							<label for="acp_fontsizer_tags"><?php _e('Write your custom tags, classes & id\'s for the Font sizer. separate items with a comma.', 'acp');?></label><br />
							<input name="acp_fontsizer_tags" type="text" value="<?php if( get_option( 'acp_fontsizer_tags' ) ){echo get_option( 'acp_fontsizer_tags' );} ?>" placeholder="default: p, h1, h2, h3"  />
						</div>
						
						<div class="acp-field-wrap">
							<label for="acp_fontsizer_size"><?php _e('Set the change of the font sizers in pixels', 'acp');?></label><br />
							<input name="acp_fontsizer_size" type="number" value="<?php if( get_option( 'acp_fontsizer_size' ) ){echo get_option( 'acp_fontsizer_size' );}else{echo '2';} ?>" />
						</div>
						<div class="acp-field-wrap">
							<label for="acp_fontsizer_size_min"><?php _e('Set the minimum font-size for the decrement font-size button', 'acp');?></label><br />
							<input name="acp_fontsizer_size_min" type="number" value="<?php if( get_option( 'acp_fontsizer_size_min' ) ){echo get_option( 'acp_fontsizer_size_min' );}else{echo '12';} ?>" />
						</div>
						<div class="acp-field-wrap">
							<label for="acp_fontsizer_size_max"><?php _e('Set the maximum font-size for the increment font-size button.', 'acp');?></label><br />
							<input name="acp_fontsizer_size_max" type="number" value="<?php if( get_option( 'acp_fontsizer_size_max' ) ){echo get_option( 'acp_fontsizer_size_max' );}else{echo '48';} ?>" />
						</div>
						
					</div>
					
				</section>
					
				<!-- Toolbar -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Toolbar', 'acp');?></h3>
					<div class="inside">
						
						<div class="acp-field-wrap">
							<input name="acp_toolbar_display" id="acp_toolbar_display" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_toolbar_display' ) ); ?> />
							<label for="acp_toolbar_display"><?php _e('Display the Toolbar', 'acp');?></label>
						</div>
						
						<div id="acp-toolbar-display">
							
							<h4><?php _e('General', 'acp');?></h4>
							
							<div class="acp-field-wrap">
								<input name="acp_toolbar_mobile" id="acp_toolbar_mobile" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_toolbar_mobile' ) ); ?> />
								<label for="acp_toolbar_mobile"><?php _e('Disable toolbar for Mobile users', 'acp');?></label>
							</div>
							
							<div class="acp-field-wrap">
								<input name="acp_feedback" id="acp_feedback" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_feedback' ) ); ?> />
								<label for="acp_feedback"><?php _e('Add feedback button', 'acp');?></label>
							</div>
							<div class="acp-feedback-callback">
								<div class="acp-field-wrap acp-feedback-text">
									<label for="acp_feedback_text"><?php _e('Write here the text that will be on the link', 'acp');?></label><br />
									<input name="acp_feedback_text" type="text" value="<?php if( get_option( 'acp_feedback_text' ) ){echo get_option( 'acp_feedback_text' );} ?>" />
								</div>
								<div class="acp-field-wrap acp-feedback-url">
									<label for="acp_feedback_url"><?php _e('Write here the URL address for the link', 'acp');?></label><br />
									<input name="acp_feedback_url" type="text" value="<?php if( get_option( 'acp_feedback_url' ) ){echo get_option( 'acp_feedback_url' );} ?>" />
								</div>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_declaration" id="acp_declaration" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_declaration' ) ); ?> />
								<label for="acp_declaration"><?php _e('Add Accessibility declaration button', 'acp');?></label>
							</div>
							<div class="acp-declaration-callback">
								<div class="acp-field-wrap acp-declaration-text">
									<label for="acp_declaration_text"><?php _e('Write here the text that will be on the link', 'acp');?></label><br />
									<input name="acp_declaration_text" type="text" value="<?php if( get_option( 'acp_declaration_text' ) ){echo get_option( 'acp_declaration_text' );} ?>" />
								</div>
								<div class="acp-field-wrap acp-declaration-url">
									<label for="acp_declaration_url"><?php _e('Write here the URL address for the link', 'acp');?></label><br />
									<input name="acp_declaration_url" type="text" value="<?php if( get_option( 'acp_declaration_url' ) ){echo get_option( 'acp_declaration_url' );} ?>" />
								</div>
							</div>
							
							<div class="acp-field-wrap">
								<input name="acp_fontsizer_hide" id="acp_fontsizer_hide" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_fontsizer_hide' ) ); ?> />
								<label for="acp_fontsizer_hide"><?php _e('Hide the font-size buttons from the toolbar', 'acp');?></label>
							</div>
							
							<div class="acp-field-wrap">
								<input name="acp_contrast_hide" id="acp_contrast_hide" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_contrast_hide' ) ); ?> />
								<label for="acp_contrast_hide"><?php _e('Hide the contrast buttons from the toolbar', 'acp');?></label>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_keyboard_hide" id="acp_keyboard_hide" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_keyboard_hide' ) ); ?> />
								<label for="acp_keyboard_hide"><?php _e('Hide the Keyboard Navigation button from toolbar', 'acp');?></label>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_underline_hide" id="acp_underline_hide" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_underline_hide' ) ); ?> />
								<label for="acp_underline_hide"><?php _e('Hide the Links underline button from toolbar', 'acp');?></label>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_toolbar_hidereadable" id="acp_toolbar_hidereadable" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_toolbar_hidereadable' ) ); ?> />
								<label for="acp_toolbar_hidereadable"><?php _e('Hide the "Readable font" button from toolbar', 'acp');?></label>
							</div>
							
							<h4><?php _e('Appearance', 'acp');?></h4>
							<div class="meta-row">
								<div class="acp-field-wrap alignleft">
									<label for="acp_toolbar_side"><?php _e('Toolbar Side', 'acp');?></label><br />
									<select id="acp_toolbar_side" name="acp_toolbar_side">
										<option value="left" <?php if ( get_option('acp_toolbar_side') == 'left' ) echo 'selected="selected"'; ?>><?php _e('Left', 'acp');?></option>
										<option value="right" <?php if ( get_option('acp_toolbar_side') == 'right' ) echo 'selected="selected"'; ?>><?php _e('Right', 'acp');?></option>
									</select>
								</div>
								<div class="acp-field-wrap alignleft">
									<label for="acp_toolbar_icon_pos"><?php _e('Icon position', 'acp');?></label><br />
									<select id="acp_toolbar_icon_pos" name="acp_toolbar_icon_pos">
										<option value="top" <?php if ( get_option('acp_toolbar_icon_pos') == 'top' ) echo 'selected="selected"'; ?>><?php _e('Top', 'acp');?></option>
										<option value="middle" <?php if ( get_option('acp_toolbar_icon_pos') == 'middle' ) echo 'selected="selected"'; ?>><?php _e('Middle', 'acp');?></option>
										<option value="bottom" <?php if ( get_option('acp_toolbar_icon_pos') == 'bottom' ) echo 'selected="selected"'; ?>><?php _e('Bottom', 'acp');?></option>
									</select>
								</div>
								<div class="acp-field-wrap alignleft">
									<label for="acp_toolbar_icon_size"><?php _e('Icon size (default is medium)', 'acp');?></label><br />
									<select id="acp_toolbar_icon_size" name="acp_toolbar_icon_size">
										<option value="small" <?php if ( get_option('acp_toolbar_icon_size') == 'small' ) echo 'selected="selected"'; ?>><?php _e('Small', 'acp'); ?></option>
										<option value="medium" <?php if ( get_option('acp_toolbar_icon_size') == 'medium' ) echo 'selected="selected"'; ?>><?php _e('Medium', 'acp'); ?></option>
									</select>
								</div>
							</div>
							
						</div>
					</div>
					
				</section>
				
				<!-- Skiplinks -->
				<section class="postbox">
					<h3 class="ui-sortable-handle"><?php _e('Skiplinks', 'acp');?></h3>
					<div class="inside">
						<p><?php _e('Skiplinks are links which aid navigation around the current page. the user who navigate with skiplinks do it with the Tab button.', 'acp');?></p>
						<p class="info-text"><?php _e('Before you activate the skiplinks, you should check if your theme has already got Skiplinks (you can check it by pressing the Tab button when you first land on a page, the Skiplinks need to be the first links that will be focused to a keyboard user).', 'acp');?></p>
						<div class="acp-field-wrap">
							<input name="acp_skiplinks" id="acp_skiplinks" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks' ) ); ?> />
							<label for="acp_skiplinks"><?php _e('Enable Skiplinks', 'acp');?></label>
						</div>
						
						<section id="acp_skiplinks_active" class="hidden">
							<p class="info-text"><?php _e('After activating this option a new menu will be registered with your built-in "Menus" of WP. You then will need to create custom menu and add to it "Links" that points to the area you want to target to, for example if the Name of the Skiplink is: "Skip to Content", so the value of the link will probably be "#content".', 'acp');?></p>
							<div class="acp-field-wrap">
								<label for="acp_skiplinks_side"><?php _e('Skiplinks Side', 'acp');?></label><br />
								<select id="acp_skiplinks_side" name="acp_skiplinks_side">
									<option value="none" <?php if ( get_option('acp_skiplinks_side') == 'none' ) echo 'selected="selected"'; ?>><?php _e('Center (default)', 'acp'); ?></option>
									<option value="left" <?php if ( get_option('acp_skiplinks_side') == 'left' ) echo 'selected="selected"'; ?>><?php _e('Left', 'acp'); ?></option>
									<option value="right" <?php if ( get_option('acp_skiplinks_side') == 'right' ) echo 'selected="selected"'; ?>><?php _e('Right', 'acp'); ?></option>
								</select>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_skiplinks_home" id="acp_skiplinks_home" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks_home' ) ); ?> />
								<label for="acp_skiplinks_home"><?php _e('Use different links for Home page', 'acp');?></label>
								<p class="info-text acp_skiplinks_home-info"><?php _e('This option will add another menu to your built-in WP Menus there you should set the permalinks for your Home page.', 'acp');?></p>
							</div>
							<div class="acp-field-wrap">
								<input name="acp_skiplinks_style" id="acp_skiplinks_style" type="checkbox" value="1" <?php checked( '1', get_option( 'acp_skiplinks_style' ) ); ?> />
								<label for="acp_skiplinks_style"><?php _e('Use your own style for the skiplinks', 'acp');?></label>
								<fieldset id="acp-skiplinks-styles">
									<div class="acp-field-wrap">
										<label for="acp_skiplinks_bg"><?php _e('Background color', 'acp');?></label><br />
										<input name="acp_skiplinks_bg" type="text" value="<?php if( get_option( 'acp_skiplinks_bg' ) ){echo get_option( 'acp_skiplinks_bg' );} ?>" class="meta-color" placeholder="default: #eeeeee"  />
									</div>
									<div class="acp-field-wrap">
										<label for="acp_skiplinks_textColor"><?php _e('Link color', 'acp');?></label><br />
										<input name="acp_skiplinks_textColor" type="text" value="<?php if( get_option( 'acp_skiplinks_textColor' ) ){echo get_option( 'acp_skiplinks_textColor' );} ?>" class="meta-color" />
									</div>								</fieldset>
							</div>
						</section>
					</div>
				</section>
			
				<?php submit_button(); ?>
			</form>
		</div>
	</div>
	<div id="acp-facebook">
		<div class="postbox">
			<div class="fb-page" data-href="https://www.facebook.com/WPAccessiblePoetry/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/WPAccessiblePoetry/"><a href="https://www.facebook.com/WPAccessiblePoetry/">Accessible Poetry</a></blockquote></div></div>
		</div>
		<div class="postbox" style="margin-top: 15px;">
			<h3 class="ui-sortable-handle"><?php _e('Contact the author', 'acp');?></h3>
			<p style="margin: 0;">Amit Moreno</p>
			<p style="margin: 0;"><a href="http://www.amitmoreno.com/">www.Amitmoreno.com</a></p>
			<p style="margin: 0;"><a href="mailto:a@Amitmoreno.com">a@Amitmoreno.com</a></p>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#acp_skiplinks').click(function() {
  		$('#acp_skiplinks_active').fadeToggle(400);
	});
	if ($('#acp_skiplinks:checked').val() !== undefined) {
		$('#acp_skiplinks_active').show();
	}
	
	$('#acp_skiplinks_home').click(function() {
  		$('.acp_skiplinks_home-info').fadeToggle(400);
	});
	if ($('#acp_skiplinks_home:checked').val() !== undefined) {
		$('.acp_skiplinks_home-info').show();
	}
	
	$('#acp_skiplinks_style').click(function() {
  		$('#acp-skiplinks-styles').fadeToggle(400);
	});
	if ($('#acp_skiplinks_style:checked').val() !== undefined) {
		$('#acp-skiplinks-styles').show();
	}
	
	$('#acp_contrast_custom').click(function() {
  		$('.acp_contrast_add-wrap').fadeToggle(400);
	});
	if ($('#acp_contrast_custom:checked').val() !== undefined) {
		$('.acp_contrast_add-wrap').show();
	}
	
	$('#acp_contrast').click(function() {
  		$('#acp-contrast_options').fadeToggle(400);
	});
	if ($('#acp_contrast:checked').val() !== undefined) {
		$('#acp-contrast_options').show();
	}
	
	$('#acp_contrast_bright').click(function() {
  		$('#acp-bright-set').fadeToggle(400);
	});
	if ($('#acp_contrast_bright:checked').val() !== undefined) {
		$('#acp-bright-set').show();
	}
	
	$('#acp_contrast_dark').click(function() {
  		$('#acp-dark-set').fadeToggle(400);
	});
	if ($('#acp_contrast_dark:checked').val() !== undefined) {
		$('#acp-dark-set').show();
	}
	
	$('#acp_fontsizer_customtags').click(function() {
  		$('#acp-fontsizer-customtags').fadeToggle(400);
	});
	if ($('#acp_fontsizer_customtags:checked').val() !== undefined) {
		$('#acp-fontsizer-customtags').show();
	}
	
	// toolbar
	$('#acp_toolbar_display').click(function() {
  		$('#acp-toolbar-display').fadeToggle(400);
	});
	if ($('#acp_toolbar_display:checked').val() !== undefined) {
		$('#acp-toolbar-display').show();
	}
	
	$('#acp_feedback').click(function() {
  		$('.acp-feedback-callback').fadeToggle(400);
	});
	if ($('#acp_feedback:checked').val() !== undefined) {
		$('.acp-feedback-callback').show();
	}
	$('#acp_declaration').click(function() {
  		$('.acp-declaration-callback').fadeToggle(400);
	});
	if ($('#acp_declaration:checked').val() !== undefined) {
		$('.acp-declaration-callback').show();
	}
	
});
</script>
<?php
}

/**
   html lang
**/
function acp_html_lang() {
	$curLang = substr(get_bloginfo( 'language' ), 0, 2);
?>
<script>
jQuery(window).load(function(){
	jQuery('html').attr('lang', '<?php echo $curLang; ?>');
});
</script>
<?php
}
if( get_option('acp_htmllang', false) ) {
	add_action( 'wp_footer', 'acp_html_lang' );
}

/**
   focus
**/
function acp_focus_links( $classes ) {
	$classes[] = 'acp-focus';
	return $classes;
}
if( get_option('acp_focuslinks', false) ) {
	add_filter( 'body_class', 'acp_focus_links' );
}

/**
   panel colorpicker
**/
function acp_color_enqueue() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'meta-box-color-js', plugin_dir_url( __FILE__ ) . 'js/meta-box-color.js', array( 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'acp_color_enqueue' );

/**
   Add role=link to all <a> tags
**/
function acp_rolelink_scripts() { ?>
<script type="text/javascript">jQuery(window).load(function(){jQuery(document).ready(function(){jQuery("a").attr("role","link")})});</script>
<?php
}
// Activate the function if option is true
if( get_option( 'acp_rolelink', false ) ) {
	add_action( 'wp_head', 'acp_rolelink_scripts');
}
/**
 * Remove Target _blank
 **/
function acp_removetarget() {
	wp_enqueue_script( 'remove-target', plugins_url( 'accessible-poetry/inc/js/remove-target.js' ), array('jquery'), '1.0.0', true );
}
if( get_option( 'acp_removetarget', false ) ) {
	add_action( 'wp_enqueue_scripts', 'acp_removetarget');
}

/**
 * Change all title attributes on <a> tags to aria-label
 **/
function acp_linksaria() {
	wp_enqueue_script( 'links-attr', plugins_url( 'accessible-poetry/inc/js/links-attr.js' ), array('jquery'), '1.0.0', true );
}
if( get_option( 'acp_linksaria', false ) ) {
	add_action( 'wp_enqueue_scripts', 'acp_linksaria');
}