/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// Testimonials Slider
document.addEventListener('DOMContentLoaded', function() {
	const slider = document.getElementById('testimonials-slider');
	const prevBtn = document.getElementById('testimonials-prev');
	const nextBtn = document.getElementById('testimonials-next');
	
	if (!slider || !prevBtn || !nextBtn) return;
	
	const testimonials = slider.querySelectorAll('.testimonial-item');
	const totalTestimonials = testimonials.length;
	
	if (totalTestimonials === 0) return;
	
	let itemsPerView = 3; // Default for desktop
	let currentIndex = 0;
	let itemWidth = 0;
	let gap = 24; // 1.5rem = 24px gap
	
	// Calculate item width and container width
	function calculateDimensions() {
		const container = slider.parentElement;
		const containerWidth = container.offsetWidth;
		
		if (window.innerWidth < 768) {
			// Mobile: 1 item at a time
			itemsPerView = 1;
			itemWidth = containerWidth;
			
			// Update all items to full width
			testimonials.forEach(item => {
				item.style.width = `${containerWidth}px`;
				item.style.minWidth = `${containerWidth}px`;
			});
		} else {
			// Desktop: 3 items at a time
			itemsPerView = 3;
			itemWidth = (containerWidth - (gap * 2)) / 3;
			
			// Update all items to 1/3 width
			testimonials.forEach(item => {
				item.style.width = `${itemWidth}px`;
				item.style.minWidth = `${itemWidth}px`;
			});
		}
	}
	
	// Calculate max index
	function getMaxIndex() {
		return Math.max(0, totalTestimonials - itemsPerView);
	}
	
	// Update slider position
	function updateSlider() {
		const maxIndex = getMaxIndex();
		
		// Constrain current index
		if (currentIndex > maxIndex) {
			currentIndex = maxIndex;
		}
		if (currentIndex < 0) {
			currentIndex = 0;
		}
		
		// Calculate translate distance
		const translateX = currentIndex * (itemWidth + gap);
		slider.style.transform = `translateX(-${translateX}px)`;
		
		// Update button states
		prevBtn.disabled = currentIndex === 0;
		nextBtn.disabled = currentIndex >= maxIndex;
		
		// Update button opacity
		if (currentIndex === 0) {
			prevBtn.style.opacity = '0.5';
		} else {
			prevBtn.style.opacity = '1';
		}
		
		if (currentIndex >= maxIndex) {
			nextBtn.style.opacity = '0.5';
		} else {
			nextBtn.style.opacity = '1';
		}
	}
	
	// Previous button
	prevBtn.addEventListener('click', function() {
		if (currentIndex > 0) {
			currentIndex--;
			updateSlider();
		}
	});
	
	// Next button
	nextBtn.addEventListener('click', function() {
		const maxIndex = getMaxIndex();
		if (currentIndex < maxIndex) {
			currentIndex++;
			updateSlider();
		}
	});
	
	// Handle window resize
	let resizeTimer;
	window.addEventListener('resize', function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			calculateDimensions();
			updateSlider();
		}, 250);
	});
	
	// Initialize
	calculateDimensions();
	updateSlider();
});
