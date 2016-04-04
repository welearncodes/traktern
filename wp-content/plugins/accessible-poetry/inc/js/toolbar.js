function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name) {
	createCookie(name,"",-1);
}

/**
 * Close toolbar when user scrolls
 **/
jQuery(window).scroll(function(e) {
	if( !jQuery("#acp_toolbarWrap").hasClass('close-toolbar'))
		jQuery("#acp_toolbarWrap").toggleClass("close-toolbar"); 
}); 
	
jQuery(document).ready(function($){
	var data = {
		action: 'acp_toolbar_ajax',
	    security : acptAjax.security,
	};
	$.post(acptAjax.ajaxurl, data, function(response) {
		$("body").prepend(response);
		
		/**
		 * font sizer
		 **/
		
		var customtags = jQuery('#acp-fontsizer').attr('data-size-tags');
		var customjump = parseInt($('#acp-fontsizer').attr('data-size-jump'));
		
		//increase
		
		var maxSize = $("#acp_toolbarWrap").attr('data-max-fontsize');
		$("#acp-fontsizer button.big-letter").click(function() {
			
			$( customtags )
				.not("html,head,head *,body,iframe,iframe *,#acp_toolbarWrap,#acp_toolbarWrap *,#acp_skiplinks,#acp_skiplinks *")
				.each(function () {
					var fontsize;
					fontsize = parseInt($(this).css('font-size'));
					var newSize = 0;
		 			if( fontsize + customjump >= maxSize) {
			 			newSize = maxSize;
		 			}
		 			else {
			 			newSize = fontsize + customjump;
		 			}
					$(this).css({ 'font-size': (newSize) + 'px' });
	     	});
	     	$(".acp-font-reset").removeClass('acp-hide');
	 	});
	 	
	 	// decrease
	 	
	 	var minSize = $("#acp_toolbarWrap").attr('data-min-fontsize');
	 	$("#acp-fontsizer button.small-letter").click(function () {
	 		$( customtags )
	 			.not("html,head,head *,body,iframe,iframe *,#sharing_email,#sharing_email *,.wpcf7-form,.wpcf7-form *,#acp_toolbarWrap,#acp_toolbarWrap *,#acp_skiplinks,#acp_skiplinks *")
	 			.each(function () {
		 			var fontsize;
		 			fontsize = parseInt($(this).css('font-size'));
		 			var newSize = 0;
		 			if( (fontsize - customjump) <= minSize) {
			 			newSize = minSize;
		 			}
		 			else {
			 			newSize = fontsize - customjump;
		 			}
		 			$(this).css({ 'font-size': (newSize) + 'px' });
	     	});
	     	$(".acp-font-reset").removeClass('acp-hide');
		});
		
		// reset to default
		
		$(".acp-font-reset").click(function() {
	 		$( customtags )
	 			.not("html,head,head *,body,iframe,iframe *,#acp_toolbarWrap,#acp_toolbarWrap *,#acp_skiplinks,#acp_skiplinks *")
	 			.each(function () {
		 			var fontsize;
		 			fontsize = parseInt($(this).css('font-size'));
		 			$(this).attr("style","");
	 				
	     	});
	     	// hide reset button after pressing
	     	$(".acp-font-reset").addClass('acp-hide');
		});
		
		
		
		// hide toolbar
			
		$(".acp_hide_toolbar").click(function(event){
			if($("#acp_toolbarWrap").hasClass('close-toolbar')){
				$("#acp_toolbarWrap a, #acp_toolbarWrap button, #acp_toolbarWrap h3, .acp-feedback, .acp-declaration").attr('tabindex', '0');
				$(".acp-author, #acp_toolbar").attr('aria-hidden', 'false');
			}
			else {
				$("#acp_toolbarWrap a, #acp_toolbarWrap button, #acp_toolbarWrap h3, .acp-feedback, .acp-declaration").attr('tabindex', '-1');
				$(".acp-author, #acp_toolbar").attr('aria-hidden', 'false');
			}
			$("#acp_toolbarWrap").toggleClass("close-toolbar");
		});
		
		/**
		 * Keyboard navigation
		 **/
		$("#acp-keyboard").click(function() {
			$("#acp_toolbarWrap a, #acp_toolbarWrap button, #acp_toolbarWrap h3")
				.not('button.acp_hide_toolbar')
				.attr('tabindex', '-1');
			$("a, button").not("#acp_toolbarWrap button, #acp_toolbarWrap a").first().focus();
			$("#acp_toolbarWrap").addClass("close-toolbar");
		});
		
		/**
		 * Readable font
		 **/
		
		$(".acp-toggle-font").click(function(){
			$("body").toggleClass("acp-readable-font");
		});
		
		/**
		 * contrast
		 **/
		
		var acp_dark = readCookie('acp_dark');
		var acp_bright = readCookie('acp_bright');
		var acp_grayscale = readCookie('acp_grayscale');
		
		$( '.acp-dark-btn' ).click( function () {
			eraseCookie('acp_bright');
			eraseCookie('acp_grayscale');
			createCookie('acp_dark','dark',1);
			
		 	$( 'body' )
		 		.removeClass( 'acp-bright' )
		 		.removeClass( 'acp-grayscale' )
		 		.addClass( 'acp-dark' );
		 	
		 	$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
		});
			
		$( '.acp-bright-btn' ).click( function () {
			eraseCookie( 'acp_dark' );
			eraseCookie( 'acp_grayscale' );
			createCookie('acp_bright','bright',1);
			
			$( 'body' )
				.removeClass( 'acp-dark' )
				.removeClass( 'acp-grayscale' )
				.addClass( 'acp-bright' );
				
			$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
		});
		
		$( '.acp-grayscale' ).click( function () {
			eraseCookie( 'acp_dark' );
			eraseCookie( 'acp_bright' );
			createCookie('acp_grayscale','grayscale',1);
			
			$( 'body' )
				.removeClass( 'acp-dark' )
				.removeClass( 'acp-bright' )
				.addClass("acp-grayscale");
				
			$('.acp-contrast-reset').removeClass('acp-hide');
			
		});
		
		$( '.acp-contrast-reset' ).click( function () {
			eraseCookie( 'acp_dark' );
			eraseCookie( 'acp_bright' );
			eraseCookie( 'acp_grayscale' );
			
			$(this).addClass( 'acp-hide' );
			
			$( 'body' )
				.removeClass( 'acp-dark' )
				.removeClass( 'acp-bright' )
				.removeClass( 'acp-grayscale' );
		});
		
		if ( acp_dark ) {
			$( 'body' )
				.removeClass( 'acp-bright' )
				.removeClass( 'acp-grayscale' )
				.addClass( 'acp-dark' );
				
			$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
		}
		
		if( acp_bright ) {
			$( 'body' )
				.removeClass( 'acp-dark' )
				.removeClass( 'acp-grayscale' )
				.addClass( 'acp-bright' );
				
			$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
		}
		
		if( acp_grayscale ) {
			$( 'body' )
				.removeClass( 'acp-dark' )
				.removeClass( 'acp-bright' )
				.addClass( 'acp-grayscale' );
				
			$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
		}
		
		/**
		 * Links
		 **/
		 
		// add underline
		
		var underlines = $('#acp_toolbar').attr('data-underlines');
		if( underlines == 1 ) {
			$("a").css('text-decoration', 'underline');
		}
		
		// toggle underline
		
		$(".acp-toggle-underline").toggle(function () {
		    $('a').css('text-decoration', 'underline');
		}, function() {
			$('a').css('text-decoration', 'none');
		});
	});
});