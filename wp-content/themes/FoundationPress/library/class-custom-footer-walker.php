<?php
/**
 * Customize the output of menus for Foundation footer walker
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */
//register_nav_menu('footer-bar-l', 'Footer bar');

//register_nav_menus('footer-menu', 'Footer Menu');
if ( ! class_exists( 'Footer_Menu_Walker' ) ) :
	class Footer_Menu_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
		}
	}
endif;

//Footer menu Function
if(!function_exists('footer_nav')){
  function footer_nav() {
    wp_nav_menu(array(
      'container'       => false,
      'menu_class'      =>  'menu',
      'theme_location'  =>  'top-bar-r',
      'depth'           => 0,
      'items_wrap'      => '<ul id="%1$s" class="%2$s footer-menu" data-dropdown-menu>%3$s</ul>',
      'fallback_cb'     => false,
      'walker'          => new Footer_Menu_Walker()
    ));
  }
}



// if ( ! class_exists( 'Foundationpress_Footer_Walker' ) ) :
// 	class Foundationpress_Footer_Walker extends Walker_Nav_Menu {
// 		function start_lvl( &$output, $depth = 0, $args = array() ) {
// 			$indent = str_repeat("\t", $depth);
// 			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
// 		}
// 	}
// endif;
