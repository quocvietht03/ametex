!(function($){
	"use strict";
	
	/* Toggle menu mobile */
	function AmetexToggleMenuMobile() {
		$('.bt-header .bt-menu-toggle').on('click', function() {
			$(this).toggleClass('active');
			$('.bt-header .bt-menu-mobile').toggleClass('active');
		});
	}
	
	/* Toggle sub menu vertical */
	function AmetexToggleSubMenu() {
		var hasChildren = $('.bt-header .bt-menu-mobile ul li.menu-item-has-children');
		
		hasChildren.each( function() {
			var $btnToggle = $('<div class="menu-toggle"></div>');
			$( this ).append($btnToggle);
			$btnToggle.on( 'click', function(e) {
				e.preventDefault();
				$( this ).toggleClass('active');
				$( this ).parent().children('ul').toggle('slow'); 
			} );
		} );
	}

	/* Footer Stick */
	function AmetexFooterStick() {
		if($( '.bt-footer' ).hasClass( 'bt-stick' )) {
			var f_height = parseInt($('.bt-footer').innerHeight()),
				f_space = parseInt($('.bt-footer').data('space'));
				
			$('#bt-main .bt-header').css({"position": "relative", "z-index": "999"});
			$('#bt-main .bt-titlebar').css({"position": "relative", "z-index": "3"});
			$('#bt-main .bt-main-content').css({"position": "relative", "background": "#ffffff", "z-index": "3", "margin-bottom": f_height + f_space});
		}
	}
	
	jQuery(document).ready(function($) {
		AmetexToggleMenuMobile();
		AmetexToggleSubMenu();
		AmetexFooterStick();
		
		var hT = $('.elementor-location-header').offset().top,
			hH = $('.elementor-location-header').outerHeight(),
			wS = $(window).scrollTop();
		
		if(wS > (hT + hH)){
			$('.elementor-location-header').find('.she-header-yes').addClass('she-header');
		}
		
		/* Newsletter */
		$('.tnp-form').find('input').attr('placeholder', 'Enter your email');
	});

	
})(jQuery);
