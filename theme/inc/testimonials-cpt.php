<?php
/**
 * Register Custom Post Type for Testimonials
 *
 * @package _tw
 */

function vgs_register_testimonials_cpt() {
	$labels = array(
		'name'                  => _x( 'Testimoniales', 'Post Type General Name', 'vgs-tw' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'vgs-tw' ),
		'menu_name'             => __( 'Testimoniales', 'vgs-tw' ),
		'name_admin_bar'        => __( 'Testimonial', 'vgs-tw' ),
		'archives'              => __( 'Testimonial Archives', 'vgs-tw' ),
		'attributes'            => __( 'Testimonial Attributes', 'vgs-tw' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'vgs-tw' ),
		'all_items'             => __( 'Todos los Testimoniales', 'vgs-tw' ),
		'add_new_item'          => __( 'Agregar Nuevo Testimonial', 'vgs-tw' ),
		'add_new'               => __( 'Agregar Nuevo', 'vgs-tw' ),
		'new_item'              => __( 'Nuevo Testimonial', 'vgs-tw' ),
		'edit_item'             => __( 'Editar Testimonial', 'vgs-tw' ),
		'update_item'           => __( 'Actualizar Testimonial', 'vgs-tw' ),
		'view_item'             => __( 'Ver Testimonial', 'vgs-tw' ),
		'view_items'            => __( 'Ver Testimoniales', 'vgs-tw' ),
		'search_items'          => __( 'Buscar Testimonial', 'vgs-tw' ),
		'not_found'             => __( 'No encontrado', 'vgs-tw' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'vgs-tw' ),
		'featured_image'        => __( 'Foto del Cliente', 'vgs-tw' ),
		'set_featured_image'    => __( 'Establecer foto del cliente', 'vgs-tw' ),
		'remove_featured_image' => __( 'Eliminar foto del cliente', 'vgs-tw' ),
		'use_featured_image'    => __( 'Usar como foto del cliente', 'vgs-tw' ),
		'insert_into_item'      => __( 'Insertar en testimonial', 'vgs-tw' ),
		'uploaded_to_this_item' => __( 'Subido a este testimonial', 'vgs-tw' ),
		'items_list'            => __( 'Lista de testimoniales', 'vgs-tw' ),
		'items_list_navigation' => __( 'Navegación de testimoniales', 'vgs-tw' ),
		'filter_items_list'     => __( 'Filtrar testimoniales', 'vgs-tw' ),
	);

	$args = array(
		'label'                 => __( 'Testimonial', 'vgs-tw' ),
		'description'           => __( 'Reseñas y testimonios de clientes', 'vgs-tw' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 21,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);

	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'vgs_register_testimonials_cpt', 0 );

/**
 * Add custom meta boxes for testimonial settings
 */
function vgs_add_testimonial_meta_boxes() {
	add_meta_box(
		'vgs_testimonial_settings',
		__( 'Detalles del Testimonial', 'vgs-tw' ),
		'vgs_testimonial_settings_callback',
		'testimonial',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vgs_add_testimonial_meta_boxes' );

/**
 * Meta box callback function
 */
function vgs_testimonial_settings_callback( $post ) {
	wp_nonce_field( 'vgs_testimonial_settings_nonce', 'vgs_testimonial_settings_nonce' );
	
	$client_name = get_post_meta( $post->ID, '_vgs_testimonial_client_name', true );
	$rating = get_post_meta( $post->ID, '_vgs_testimonial_rating', true );
	$testimonial_date = get_post_meta( $post->ID, '_vgs_testimonial_date', true );
	
	// Si no hay fecha guardada, usar la fecha de publicación del post
	if ( empty( $testimonial_date ) ) {
		$testimonial_date = get_the_date( 'd/m/Y', $post->ID );
	}
	
	// Si no hay rating, usar 5 por defecto
	if ( empty( $rating ) ) {
		$rating = 5;
	}
	?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="vgs_testimonial_client_name"><?php _e( 'Nombre del Cliente', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<input type="text" id="vgs_testimonial_client_name" name="vgs_testimonial_client_name" value="<?php echo esc_attr( $client_name ); ?>" class="regular-text" placeholder="Carlos Javier">
				<p class="description"><?php _e( 'Nombre completo del cliente', 'vgs-tw' ); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="vgs_testimonial_rating"><?php _e( 'Calificación (Estrellas)', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<select id="vgs_testimonial_rating" name="vgs_testimonial_rating" class="regular-text">
					<option value="1" <?php selected( $rating, 1 ); ?>>⭐ (1 estrella)</option>
					<option value="2" <?php selected( $rating, 2 ); ?>>⭐⭐ (2 estrellas)</option>
					<option value="3" <?php selected( $rating, 3 ); ?>>⭐⭐⭐ (3 estrellas)</option>
					<option value="4" <?php selected( $rating, 4 ); ?>>⭐⭐⭐⭐ (4 estrellas)</option>
					<option value="5" <?php selected( $rating, 5 ); ?>>⭐⭐⭐⭐⭐ (5 estrellas)</option>
				</select>
				<p class="description"><?php _e( 'Calificación del cliente (1-5 estrellas)', 'vgs-tw' ); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="vgs_testimonial_date"><?php _e( 'Fecha del Testimonial', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<input type="text" id="vgs_testimonial_date" name="vgs_testimonial_date" value="<?php echo esc_attr( $testimonial_date ); ?>" class="regular-text" placeholder="30/01/2024">
				<p class="description"><?php _e( 'Fecha en formato DD/MM/YYYY (ejemplo: 30/01/2024)', 'vgs-tw' ); ?></p>
			</td>
		</tr>
	</table>
	<div style="margin-top: 20px; padding: 15px; background: #f0f0f1; border-left: 4px solid #2271b1;">
		<h4 style="margin-top: 0;">📝 Instrucciones:</h4>
		<ul style="margin-left: 20px;">
			<li><strong>Título:</strong> Se usa internamente (no se muestra en el front-end)</li>
			<li><strong>Nombre del Cliente:</strong> Nombre que se mostrará en el testimonial</li>
			<li><strong>Contenido:</strong> El comentario o reseña del cliente</li>
			<li><strong>Imagen Destacada:</strong> Foto del cliente (opcional, si no se carga se usará un avatar predeterminado)</li>
			<li><strong>Calificación:</strong> Número de estrellas (1-5)</li>
			<li><strong>Fecha:</strong> Fecha del testimonial en formato DD/MM/YYYY</li>
		</ul>
	</div>
	<?php
}

/**
 * Save meta box data
 */
function vgs_save_testimonial_settings( $post_id ) {
	// Check nonce
	if ( ! isset( $_POST['vgs_testimonial_settings_nonce'] ) || ! wp_verify_nonce( $_POST['vgs_testimonial_settings_nonce'], 'vgs_testimonial_settings_nonce' ) ) {
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

	// Save client name
	if ( isset( $_POST['vgs_testimonial_client_name'] ) ) {
		update_post_meta( $post_id, '_vgs_testimonial_client_name', sanitize_text_field( $_POST['vgs_testimonial_client_name'] ) );
	}

	// Save rating
	if ( isset( $_POST['vgs_testimonial_rating'] ) ) {
		$rating = intval( $_POST['vgs_testimonial_rating'] );
		// Asegurar que esté entre 1 y 5
		$rating = max( 1, min( 5, $rating ) );
		update_post_meta( $post_id, '_vgs_testimonial_rating', $rating );
	}

	// Save testimonial date
	if ( isset( $_POST['vgs_testimonial_date'] ) ) {
		update_post_meta( $post_id, '_vgs_testimonial_date', sanitize_text_field( $_POST['vgs_testimonial_date'] ) );
	}
}
add_action( 'save_post_testimonial', 'vgs_save_testimonial_settings' );
