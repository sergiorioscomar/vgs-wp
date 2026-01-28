<?php
/**
 * Register Custom Post Type for Products
 *
 * @package _tw
 */

function vgs_register_products_cpt() {
	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'vgs-tw' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'vgs-tw' ),
		'menu_name'             => __( 'Productos', 'vgs-tw' ),
		'name_admin_bar'        => __( 'Producto', 'vgs-tw' ),
		'archives'              => __( 'Product Archives', 'vgs-tw' ),
		'attributes'            => __( 'Product Attributes', 'vgs-tw' ),
		'parent_item_colon'     => __( 'Parent Product:', 'vgs-tw' ),
		'all_items'             => __( 'Todos los Productos', 'vgs-tw' ),
		'add_new_item'          => __( 'Agregar Nuevo Producto', 'vgs-tw' ),
		'add_new'               => __( 'Agregar Nuevo', 'vgs-tw' ),
		'new_item'              => __( 'Nuevo Producto', 'vgs-tw' ),
		'edit_item'             => __( 'Editar Producto', 'vgs-tw' ),
		'update_item'           => __( 'Actualizar Producto', 'vgs-tw' ),
		'view_item'             => __( 'Ver Producto', 'vgs-tw' ),
		'view_items'            => __( 'Ver Productos', 'vgs-tw' ),
		'search_items'          => __( 'Buscar Producto', 'vgs-tw' ),
		'not_found'             => __( 'No encontrado', 'vgs-tw' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'vgs-tw' ),
		'featured_image'        => __( 'Imagen del Producto', 'vgs-tw' ),
		'set_featured_image'    => __( 'Establecer imagen del producto', 'vgs-tw' ),
		'remove_featured_image' => __( 'Eliminar imagen del producto', 'vgs-tw' ),
		'use_featured_image'    => __( 'Usar como imagen del producto', 'vgs-tw' ),
		'insert_into_item'      => __( 'Insertar en producto', 'vgs-tw' ),
		'uploaded_to_this_item' => __( 'Subido a este producto', 'vgs-tw' ),
		'items_list'            => __( 'Lista de productos', 'vgs-tw' ),
		'items_list_navigation' => __( 'Navegación de productos', 'vgs-tw' ),
		'filter_items_list'     => __( 'Filtrar productos', 'vgs-tw' ),
	);

	$args = array(
		'label'                 => __( 'Producto', 'vgs-tw' ),
		'description'           => __( 'Productos del catálogo', 'vgs-tw' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);

	register_post_type( 'producto', $args );
}
add_action( 'init', 'vgs_register_products_cpt', 0 );

/**
 * Add custom meta boxes for product settings
 */
function vgs_add_product_meta_boxes() {
	add_meta_box(
		'vgs_product_settings',
		__( 'Configuración del Producto', 'vgs-tw' ),
		'vgs_product_settings_callback',
		'producto',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vgs_add_product_meta_boxes' );

/**
 * Meta box callback function
 */
function vgs_product_settings_callback( $post ) {
	wp_nonce_field( 'vgs_product_settings_nonce', 'vgs_product_settings_nonce' );
	
	$button_url = get_post_meta( $post->ID, '_vgs_product_url', true );
	?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="vgs_product_url"><?php _e( 'URL del Botón "Leer Más"', 'vgs-tw' ); ?></label>
			</th>
			<td>
				<input type="url" id="vgs_product_url" name="vgs_product_url" value="<?php echo esc_url( $button_url ); ?>" class="regular-text" placeholder="https://ejemplo.com/producto">
				<p class="description"><?php _e( 'URL a donde lleva el botón "Leer Más" (opcional, por defecto es #)', 'vgs-tw' ); ?></p>
			</td>
		</tr>
	</table>
	<div style="margin-top: 20px; padding: 15px; background: #f0f0f1; border-left: 4px solid #2271b1;">
		<h4 style="margin-top: 0;">📝 Instrucciones:</h4>
		<ul style="margin-left: 20px;">
			<li><strong>Título:</strong> Nombre del producto (ej: "Panel sándwich Cubierta")</li>
			<li><strong>Contenido:</strong> Descripción del producto</li>
			<li><strong>Imagen Destacada:</strong> Imagen del producto</li>
			<li><strong>URL del Botón:</strong> Enlace a la página del producto (opcional)</li>
		</ul>
	</div>
	<?php
}

/**
 * Save meta box data
 */
function vgs_save_product_settings( $post_id ) {
	// Check nonce
	if ( ! isset( $_POST['vgs_product_settings_nonce'] ) || ! wp_verify_nonce( $_POST['vgs_product_settings_nonce'], 'vgs_product_settings_nonce' ) ) {
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

	// Save button URL
	if ( isset( $_POST['vgs_product_url'] ) ) {
		update_post_meta( $post_id, '_vgs_product_url', esc_url_raw( $_POST['vgs_product_url'] ) );
	}
}
add_action( 'save_post_producto', 'vgs_save_product_settings' );
