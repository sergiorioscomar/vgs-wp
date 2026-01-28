<?php
/**
 * Register Custom Post Type for Hero Slides
 *
 * @package _tw
 */

function vgs_register_hero_slides_cpt() {
	$labels = array(
		'name'                  => _x( 'Hero Slides', 'Post Type General Name', 'vgs-tw' ),
		'singular_name'         => _x( 'Hero Slide', 'Post Type Singular Name', 'vgs-tw' ),
		'menu_name'             => __( 'Hero Slides', 'vgs-tw' ),
		'name_admin_bar'        => __( 'Hero Slide', 'vgs-tw' ),
		'archives'              => __( 'Slide Archives', 'vgs-tw' ),
		'attributes'            => __( 'Slide Attributes', 'vgs-tw' ),
		'parent_item_colon'     => __( 'Parent Slide:', 'vgs-tw' ),
		'all_items'             => __( 'All Slides', 'vgs-tw' ),
		'add_new_item'          => __( 'Add New Slide', 'vgs-tw' ),
		'add_new'               => __( 'Add New', 'vgs-tw' ),
		'new_item'              => __( 'New Slide', 'vgs-tw' ),
		'edit_item'             => __( 'Edit Slide', 'vgs-tw' ),
		'update_item'           => __( 'Update Slide', 'vgs-tw' ),
		'view_item'             => __( 'View Slide', 'vgs-tw' ),
		'view_items'            => __( 'View Slides', 'vgs-tw' ),
		'search_items'          => __( 'Search Slide', 'vgs-tw' ),
		'not_found'             => __( 'Not found', 'vgs-tw' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'vgs-tw' ),
		'featured_image'        => __( 'Slide Background Image', 'vgs-tw' ),
		'set_featured_image'    => __( 'Set slide background image', 'vgs-tw' ),
		'remove_featured_image' => __( 'Remove slide background image', 'vgs-tw' ),
		'use_featured_image'    => __( 'Use as slide background image', 'vgs-tw' ),
		'insert_into_item'      => __( 'Insert into slide', 'vgs-tw' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slide', 'vgs-tw' ),
		'items_list'            => __( 'Slides list', 'vgs-tw' ),
		'items_list_navigation' => __( 'Slides list navigation', 'vgs-tw' ),
		'filter_items_list'     => __( 'Filter slides list', 'vgs-tw' ),
	);

	$args = array(
		'label'                 => __( 'Hero Slide', 'vgs-tw' ),
		'description'           => __( 'Hero section slides', 'vgs-tw' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);

	register_post_type( 'hero_slide', $args );
}
add_action( 'init', 'vgs_register_hero_slides_cpt', 0 );

/**
 * Add custom meta boxes for slide settings
 */
function vgs_add_hero_slide_meta_boxes() {
	add_meta_box(
		'vgs_slide_settings',
		__( 'Slide Settings', 'vgs-tw' ),
		'vgs_slide_settings_callback',
		'hero_slide',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vgs_add_hero_slide_meta_boxes' );

/**
 * Meta box callback function
 */
function vgs_slide_settings_callback( $post ) {
	wp_nonce_field( 'vgs_slide_settings_nonce', 'vgs_slide_settings_nonce' );
	
	$button_text = get_post_meta( $post->ID, '_vgs_button_text', true );
	$button_link = get_post_meta( $post->ID, '_vgs_button_link', true );
	?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="vgs_button_text"><?php _e( 'Button Text', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<input type="text" id="vgs_button_text" name="vgs_button_text" value="<?php echo esc_attr( $button_text ); ?>" class="regular-text" placeholder="CONTACTA CON NOSOTROS">
				<p class="description"><?php _e( 'Text to display on the slide button', 'vgs-tw' ); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="vgs_button_link"><?php _e( 'Button Link', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<input type="url" id="vgs_button_link" name="vgs_button_link" value="<?php echo esc_url( $button_link ); ?>" class="regular-text" placeholder="#contacto">
				<p class="description"><?php _e( 'URL where the button should link to', 'vgs-tw' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save meta box data
 */
function vgs_save_slide_settings( $post_id ) {
	// Check nonce
	if ( ! isset( $_POST['vgs_slide_settings_nonce'] ) || ! wp_verify_nonce( $_POST['vgs_slide_settings_nonce'], 'vgs_slide_settings_nonce' ) ) {
		return;
	}

	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save button text
	if ( isset( $_POST['vgs_button_text'] ) ) {
		update_post_meta( $post_id, '_vgs_button_text', sanitize_text_field( $_POST['vgs_button_text'] ) );
	}

	// Save button link
	if ( isset( $_POST['vgs_button_link'] ) ) {
		update_post_meta( $post_id, '_vgs_button_link', esc_url_raw( $_POST['vgs_button_link'] ) );
	}
}
add_action( 'save_post_hero_slide', 'vgs_save_slide_settings' );
