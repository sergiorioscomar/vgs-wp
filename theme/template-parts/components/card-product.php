<?php
/**
 * Component: Product Card
 *
 * @package _tw
 * @param array $args Arguments for the card (title, image_url, description, link).
 */

$title       = $args['title'] ?? '';
$image_url   = $args['image_url'] ?? '';
$description = $args['description'] ?? '';
$link        = $args['link'] ?? '#';

// Fallback image if needed
if ( empty( $image_url ) ) {
	$image_url = get_template_directory_uri() . '/assets/images/panel.png'; // Placeholder path
}
?>
<div class="bg-white rounded-lg shadow-[0_4px_20px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col h-full group transition-transform hover:-translate-y-1 duration-300">
	<div class="aspect-video relative overflow-hidden bg-gray-100 shadow-[0_6px_18px_rgba(0,0,0,0.12)]">
		<?php if ( $image_url ) : ?>
			<img 
				src="<?php echo esc_url( $image_url ); ?>" 
				alt="<?php echo esc_attr( $title ); ?>" 
				class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500"
				loading="lazy"
			>
		<?php else : ?>
			<div class="flex items-center justify-center h-full text-gray-400">
				<span class="sr-only"><?php esc_html_e( 'No image', '_tw' ); ?></span>
				<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
			</div>
		<?php endif; ?>
		<!-- Overlay gradient optionally -->
	</div>
	
	<div class="p-6 flex-grow flex flex-col text-center">
		<h3 class="text-xl font-bold text-[#2E3A8C] mb-3 leading-tight">
			<?php echo esc_html( $title ); ?>
		</h3>
		
		<?php if ( $description ) : ?>
			<div class="text-gray-500 text-sm mb-6 flex-grow line-clamp-3">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		<?php endif; ?>
		
		<div class="mt-auto pt-2">
			<a href="<?php echo esc_url( $link ); ?>" class="inline-block bg-[#A3D900] text-white font-bold py-2.5 px-8 rounded-full hover:bg-[#8Cb800] transition-colors uppercase text-xs tracking-wider shadow-lg shadow-[#A3D900]/30 icon-button-hover relative overflow-hidden">
				<span class="relative z-10"><?php esc_html_e( 'LEER MÁS', '_tw' ); ?></span>
			</a>
		</div>
	</div>
</div>
