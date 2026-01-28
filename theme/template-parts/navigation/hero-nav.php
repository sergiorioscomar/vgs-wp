<?php
/**
 * Template part for displaying the hero navigation menu
 *
 * @package _tw
 */
?>

<!-- Navbar (Inside Hero) -->
<nav class="absolute top-[20px] right-0 w-full md:max-w-[811px] px-4 md:px-0 text-white text-[16px] font-semibold leading-[22px]">
	<!-- Hamburger Button (Mobile Only) -->
	<button id="mobile-menu-toggle" class="md:hidden fixed top-[70px] right-4 flex items-center justify-center w-10 h-10 z-[9999] bg-[#2E3A8C] bg-opacity-90 rounded-md">
		<svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
		</svg>
		<svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
		</svg>
	</button>

	<!-- Dynamic WordPress Menu -->
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => 'mobile-menu',
			'menu_class'     => 'hidden md:flex md:flex-wrap md:justify-end gap-[20px] md:gap-[30px] list-none p-0 m-0 md:relative fixed top-[96px] left-0 right-0 md:bg-transparent bg-[#2E3A8C] bg-opacity-95 md:flex-row flex-col md:p-0 p-6 z-40',
			'container'      => false,
			'fallback_cb'    => false,
			'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'link_before'    => '',
			'link_after'     => '',
			'walker'         => new class extends Walker_Nav_Menu {
				function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
					$classes = array( 'md:inline-block' );
					$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
					$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
					
					$output .= '<li' . $class_names . '>';
					
					$atts = array();
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
					$atts['class'] = 'block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0';
					
					$attributes = '';
					foreach ( $atts as $attr => $value ) {
						if ( ! empty( $value ) ) {
							$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
						}
					}
					
					$output .= '<a' . $attributes . '>';
					$output .= apply_filters( 'the_title', $item->title, $item->ID );
					$output .= '</a>';
				}
			}
		) );
	} else {
		// Fallback menu when no menu is assigned
		?>
		<ul id="mobile-menu" class="hidden md:flex md:flex-wrap md:justify-end gap-[20px] md:gap-[30px] list-none p-0 m-0 md:relative fixed top-[96px] left-0 right-0 md:bg-transparent bg-[#2E3A8C] bg-opacity-95 md:flex-row flex-col md:p-0 p-6 z-40">
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Cubierta</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Fachada</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Lana de Roca</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Panel Teja</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Panel Segunda</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Chapa</a></li>
			<li class="md:inline-block"><a href="#" class="block md:inline hover:text-[#9FCE00] transition-colors py-2 md:py-0">Rematería</a></li>
			<li class="md:inline-block">
				<a href="#" class="block md:inline text-[#9FCE00] hover:text-white transition-colors py-2 md:py-0">
					Contacto
				</a>
			</li>
		</ul>
		<?php
	}
	?>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const menuToggle = document.getElementById('mobile-menu-toggle');
	const mobileMenu = document.getElementById('mobile-menu');
	const hamburgerIcon = document.getElementById('hamburger-icon');
	const closeIcon = document.getElementById('close-icon');

	if (menuToggle) {
		menuToggle.addEventListener('click', function() {
			mobileMenu.classList.toggle('hidden');
			hamburgerIcon.classList.toggle('hidden');
			closeIcon.classList.toggle('hidden');
		});
	}
});
</script>
