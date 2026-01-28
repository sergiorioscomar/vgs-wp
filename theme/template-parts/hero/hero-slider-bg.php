<?php
/**
 * Template part for displaying hero slider background images
 *
 * @package _tw
 */

// Query hero slides
$args = array(
	'post_type'      => 'hero_slide',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'post_status'    => 'publish',
);

$slides_query = new WP_Query( $args );
$has_slides = $slides_query->post_count > 0;
?>

<!-- Background Image Container (Full Width - will change dynamically) -->
<div id="hero-background" class="absolute inset-0 pointer-events-none z-0">
	<?php
	// Store all slide backgrounds
	if ( $has_slides ) :
		$bg_index = 0;
		while ( $slides_query->have_posts() ) :
			$slides_query->the_post();
			$slide_bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			
			// Fallback to default background if no featured image
			if ( empty( $slide_bg ) ) {
				$slide_bg = get_template_directory_uri() . '/assets/images/contenedor.png';
			}
			
			$is_active_bg = $bg_index === 0 ? '' : 'hidden';
			?>
			<img src="<?php echo esc_url( $slide_bg ); ?>" 
				 alt="Background" 
				 class="hero-bg-image absolute inset-0 w-full h-full object-cover transition-opacity duration-500 <?php echo esc_attr( $is_active_bg ); ?>" 
				 data-bg-index="<?php echo esc_attr( $bg_index ); ?>">
			<?php
			$bg_index++;
		endwhile;
		wp_reset_postdata();
	else :
		// Fallback background when no slides exist
		?>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/contenedor.png' ); ?>" 
			 alt="Background" 
			 class="hero-bg-image absolute inset-0 w-full h-full object-cover">
		<?php
	endif;
	?>
</div>

<!-- Gradient Overlay (over all images) -->
<div class="absolute inset-0 pointer-events-none z-10" style="background: linear-gradient(180deg, #1A2862 17.67%, #3552C8 100%); opacity: 0.75;"></div>
