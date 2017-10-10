<?php
/**
 * Custom functionalities
 *
 * @package FoundationPress
 * @since FoundationPress 6.0.0
 */
if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
  function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );
endif;
