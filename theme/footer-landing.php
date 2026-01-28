<?php
/**
 * The template for displaying the footer on landing page
 *
 * Ends #content div and displays footer content.
 *
 * @package _tw
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/layout/footer', 'landing' ); ?>

</div><!-- #page -->

<!-- Scroll to Top Button (Desktop Only) -->
<button id="scroll-to-top" class="hidden md:flex fixed bottom-8 right-8 w-12 h-12 items-center justify-center bg-[#2E3A8C] text-white rounded-full shadow-lg hover:bg-[#9FCE00] transition-all duration-300 z-50 opacity-0 invisible" aria-label="Volver arriba">
	<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
	</svg>
</button>

<script>
(function() {
	const scrollToTopBtn = document.getElementById('scroll-to-top');
	
	// Show button when user scrolls down 300px
	window.addEventListener('scroll', function() {
		if (window.pageYOffset > 300) {
			scrollToTopBtn.classList.remove('opacity-0', 'invisible');
			scrollToTopBtn.classList.add('opacity-100', 'visible');
		} else {
			scrollToTopBtn.classList.add('opacity-0', 'invisible');
			scrollToTopBtn.classList.remove('opacity-100', 'visible');
		}
	});
	
	// Smooth scroll to top when clicked
	scrollToTopBtn.addEventListener('click', function() {
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	});
})();
</script>

<?php wp_footer(); ?>

</body>
</html>
