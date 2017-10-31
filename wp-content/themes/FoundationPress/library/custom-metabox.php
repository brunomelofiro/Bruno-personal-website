<?php
/**
 * Outputs the content of the meta box
 */
function hero_title_metabox_markup( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'hero_title_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
        <label for="hero-title" class="prfx-row-title">
          <?php _e( 'Enter Hero text', 'prfx-textdomain' )?>
        </label>
        <br>
        <input type="text" name="hero-title" style="width: 100%;" value="<?php if ( isset ( $prfx_stored_meta['hero-title'] ) ) echo $prfx_stored_meta['hero-title'][0]; ?>" />
    </p>

    <?php
}

/**
 * Adds a meta box to the post editing screen
 */
function create_hero_title_metabox() {

    /**
    * Add metabox to the "page" post type
    */
    $post_types = array('page');
    foreach ($post_types as $post_type) {
      add_meta_box(
        'hero_title_meta',
        __( 'Hero Title', 'prfx-textdomain' ),
        'hero_title_metabox_markup',
        $post_type
      );
    }
}
  add_action( 'add_meta_boxes', 'create_hero_title_metabox' );

  /**
   * Saves the custom meta input
   */
  function hero_title_metabox_save( $post_id ) {

      // Checks save status
      $is_autosave = wp_is_post_autosave( $post_id );
      $is_revision = wp_is_post_revision( $post_id );
      $is_valid_nonce = ( isset( $_POST[ 'hero_title_nonce' ] ) &&
      wp_verify_nonce( $_POST[ 'hero_title_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

      // Exits script depending on save status
      if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
          return;
      }

      // Checks for input and sanitizes/saves if needed
      if( isset( $_POST[ 'hero-title' ] ) ) {
          update_post_meta( $post_id, 'hero-title', sanitize_text_field( $_POST[ 'hero-title' ] ) );
      }

  }
  add_action( 'save_post', 'hero_title_metabox_save' );
