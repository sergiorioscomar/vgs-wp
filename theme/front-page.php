<?php

/**
 * The template for displaying the front page.
 *
 * @package _tw
 */

get_header('landing');

// Assets URI
$assets_uri = get_template_directory_uri() . '/assets/images';

// Hero Fields (Editable)
$hero_title = get_the_title();
if (empty($hero_title)) {
	$hero_title = 'Venta y corte a medida de PANEL SÁNDWICH';
}
// Hero Background - using image.png
$hero_bg = $assets_uri . '/contenedor.png';
if (has_post_thumbnail()) {
	$hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');
}

?>

<main id="primary" class="site-main font-['Roboto']">

	<!-- HERO SECTION -->
	<section class="relative min-h-[500px] sm:min-h-[600px] md:h-[697px] overflow-hidden pt-[70px] md:pt-0">

		<?php
		// Get hero slider background images and gradient
		get_template_part('template-parts/hero/hero-slider-bg');
		?>

		<div class="container mx-auto px-4 relative z-10 h-full flex flex-col">
			<!-- Menu Dynamic -->
			<?php get_template_part('template-parts/navigation/hero-nav'); ?>
			<!-- Slider Dynamic -->
			<?php get_template_part('template-parts/hero/hero-slider-content'); ?>
		</div>
	</section>

	<!-- FEATURES SECTION -->
	<section class="py-16 bg-white">
		<div class="container mx-auto px-4">
			<h2 class="text-3xl font-bold text-center text-[#2E3A8C] mb-12 font-['Roboto']">
				¿Por qué nuestro <span class="text-[#9FCE00] relative inline-block">
					PANEL SÁNDWICH
					<span class="block mt-2 mx-auto w-[270px] h-[25px]">
						<svg class="w-full h-full block" width="270" height="25" viewBox="0 0 270 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M256.566 3.63219C269.235 5.89621 267.165 4.20187 266.826 5.31773C267.731 5.69506 268.645 6.07534 270 6.64061C268.944 7.4775 268.278 8.00607 267.605 8.53904C267.756 8.73578 267.967 9.01181 268.18 9.28931C268.024 9.41851 267.846 9.69601 267.687 9.68279C263.763 9.35244 259.968 10.8794 256.011 10.5711C252.043 10.2627 247.997 10.0895 244.067 10.6327C240.866 11.0732 237.694 11.2098 234.496 11.3419C233.51 11.3815 232.705 10.436 231.506 11.1921C230.609 11.7589 229.215 11.3052 228.041 11.3052H224.172C222.998 11.3052 221.827 11.3008 220.653 11.3067C219.485 11.3096 218.316 11.3199 217.148 11.3507C217.063 11.3522 216.982 11.5269 216.685 11.8646C217.786 12.0261 218.715 12.1612 219.645 12.2948C219.64 12.4651 219.635 12.6339 219.631 12.8028C218.408 12.838 217.184 12.8865 215.962 12.9012C214.672 12.9188 213.382 12.9114 212.092 12.8997C211.872 12.8982 211.546 12.9114 211.45 12.7661C210.152 10.7825 208.688 11.0277 206.959 12.0437C206.31 12.424 205.345 12.1054 204.524 12.1054C193.5 12.1054 182.475 12.0848 171.453 12.1347C170.252 12.1406 168.866 11.4682 167.865 12.8982C167.818 12.9614 167.58 12.9628 167.531 12.8982C166.541 11.5739 165.413 13.5501 164.625 12.8498C163.608 11.9468 162.924 12.1039 161.967 12.8439C161.675 13.0715 160.911 12.6648 160.435 12.3888C159.769 12.0011 159.812 11.4652 160.428 10.9954C160.307 10.831 160.209 10.5755 160.059 10.5256C159.855 10.4595 159.488 10.4595 159.411 10.5946C159.18 11.0027 159.151 11.5959 158.868 11.9174C158.493 12.3462 157.954 12.841 157.482 12.8483C156.669 12.8601 155.668 12.0907 155.079 12.4196C154.133 12.9496 153.539 12.8835 152.602 12.449C151.964 12.1538 151.018 12.8659 150.204 12.8806C146.93 12.9423 143.655 12.9056 140.457 12.9056C140.134 12.3095 139.862 11.8059 139.589 11.3052C139.151 11.7295 138.713 12.1553 137.894 12.9496C136.524 13.3431 134.15 11.8587 132.72 14.5632C132.299 14.0361 131.909 13.5472 131.562 13.1126C128.78 13.9979 126.087 14.1257 123.399 13.0788C120.619 14.5383 117.739 13.2668 114.929 13.7674C114.99 13.0304 115.137 12.1949 115.049 12.1626C113.955 11.7442 114.13 12.8806 113.823 13.6426H110.096C109.907 14.2255 109.758 14.688 109.6 15.1784C109.436 15.0859 109.209 15.0419 109.124 14.8921C108.456 13.7322 107.313 13.2565 106.411 13.7748C104.299 14.9919 102.125 14.3474 99.9867 14.4839C98.1451 14.6014 96.2931 14.5074 94.4101 15.0874C95.5381 15.2166 96.6661 15.3472 97.794 15.475C95.2155 15.7319 92.4743 17.3866 90.5448 14.7291C89.1923 14.9508 88.1108 15.2621 87.0241 15.2841C83.6493 15.3502 80.2718 15.3076 76.9667 15.3076C76.7589 15.9889 76.6156 16.4528 76.4053 17.1473C75.8361 16.1724 75.3728 15.3781 74.9095 14.5838C74.6707 15.682 74.1158 16.8214 73.1091 16.0344C72.0444 15.2019 71.4352 15.773 70.4608 15.9947C68.6798 16.3985 66.7762 16.1093 64.87 16.6276C65.7438 16.7832 66.6175 16.9388 67.5364 17.1047C67.3905 17.3646 67.295 17.6876 67.197 17.6891C64.6171 17.717 62.0295 17.8477 59.4574 17.6671C57.5602 17.5335 55.7289 16.5674 53.7672 16.9139C53.4484 16.9711 53.1361 17.0754 52.816 17.5276C53.7569 17.6406 54.6977 17.7522 55.6398 17.8638C52.6973 18.2088 49.8154 19.1221 46.8497 17.8711C45.5372 17.3176 43.8955 17.7786 42.312 18.2044C42.9586 18.385 43.6064 18.5656 44.275 18.7521C44.1601 18.962 44.0685 19.288 43.9704 19.2895C42.8011 19.3174 41.6319 19.2953 40.4626 19.2865C39.8341 17.5981 38.8945 20.1058 37.9395 18.9958C37.3175 18.2749 36.023 19.9707 34.766 18.6552C34.0807 17.9416 32.3474 18.5289 31.0375 19.0472C31.9422 19.2072 32.8469 19.3702 33.8084 19.5405C33.6032 19.796 33.4793 20.0911 33.3489 20.0941C31.5911 20.1234 29.8282 20.0265 28.073 20.1322C24.6491 20.3363 21.1749 20.3202 17.831 21.0455C16.028 21.436 14.2599 21.5168 12.4764 21.7634C10.9457 21.9734 9.45383 22.5871 8.85629 24.8908C8.24584 24.8908 6.88945 25.1653 6.76942 24.8438C6.24674 23.4372 4.65803 23.2904 4.30183 22.0806C3.96628 20.9368 3.41391 20.5844 2.58149 20.0529C0.902444 18.9797 0.541082 16.9271 1.39028 14.9259C0.928256 14.3679 0.459775 13.8056 0.00290994 13.2535C0.0235592 12.9643 -0.0487133 12.6163 0.0726013 12.4622C1.3877 10.7649 2.92866 9.89569 5.02972 9.5991C8.4717 9.11312 11.8362 7.91357 15.3634 8.1015C17.3844 6.69787 19.6236 7.54798 21.7556 7.28663C23.4231 7.08401 25.0737 6.6641 26.7437 6.52902C28.3763 6.39541 30.196 7.00326 31.6273 6.37926C33.687 5.48364 35.7055 5.59669 37.7033 5.76994C40.2716 5.99311 42.6385 4.81412 45.1564 4.88313C47.735 4.95067 50.4233 5.42784 52.8741 4.78476C57.6041 3.54263 62.3637 4.77888 67.0201 4.0154C72.7929 3.06839 78.6212 3.98897 84.3139 3.15795C91.9813 2.03622 99.6189 2.88779 107.259 2.50018C108.195 2.4532 109.134 2.50605 110.073 2.49137C110.862 2.47962 111.73 2.72923 112.258 1.72936C112.676 2.99351 113.583 1.60309 114.315 2.21241C114.763 2.58534 115.878 1.81305 116.709 1.71761C117.638 1.61337 118.583 1.69412 119.521 1.69412H121.983H124.798H127.613H130.075C131.014 1.69412 131.958 1.6163 132.889 1.71321C133.988 1.8292 135.076 1.40781 136.216 2.29463C136.764 2.72188 138.039 1.75725 138.992 1.72642C141.922 1.63686 144.856 1.75138 147.786 1.66329C148.876 1.63245 150.103 2.24471 151.033 0.91008C151.642 0.0335431 152.098 2.43998 153.021 1.12885C153.311 0.714805 154.773 0.645798 154.929 0.94385C155.816 2.62498 156.819 0.0731853 157.494 1.10829C158.451 2.57359 159.046 0.849882 159.818 0.905676C160.254 0.936508 160.685 1.09067 161.119 1.18611C161.878 1.35642 163.083 1.94519 163.319 1.62071C164.282 0.296357 165.408 1.59428 166.463 1.08627C167.556 0.557703 168.982 0.896866 170.263 0.896866C193.247 0.892462 216.233 0.932104 239.218 0.846946C242.283 0.8352 245.448 1.71027 248.425 0.0922724C249.991 1.62217 251.537 -0.0765747 253.123 0.00270982C258.036 0.247905 262.964 0.0922724 268.224 0.0922724C268.047 0.716273 267.94 1.61337 267.762 1.63245C265.279 1.89086 262.873 2.66609 260.317 2.55891C255.163 2.34455 249.999 2.49137 244.839 2.51046C244.653 2.51193 244.467 2.76006 244.28 2.89367C244.515 3.02728 244.737 3.21521 244.985 3.28569C245.605 3.46041 246.175 4.34722 246.905 3.33561C247.094 3.07279 247.801 3.29596 248.269 3.29596C255.062 3.29596 261.853 3.29596 256.566 3.63219C244.311 3.82893 244.324 3.68652 244.337 3.54556C243.248 3.21227 242.173 2.77474 241.063 2.58534C240.474 2.4855 236.751 2.63232 236.216 2.54716C235.761 2.47375 235.058 2.27994 234.865 2.53395C233.909 3.79076 232.692 3.271 231.598 3.27394C214.937 3.30477 198.277 3.30771 181.618 3.26219C180.64 3.26073 179.525 3.85096 178.637 2.74391C178.468 2.53248 177.855 2.4297 177.733 2.578C176.665 3.89207 175.314 3.13152 174.103 3.27688C171.624 3.57346 169.088 2.79383 166.626 4.02127C165.93 4.36778 164.869 3.86858 163.999 3.64687C162.324 3.21962 160.662 2.91276 159.029 3.78782C158.459 4.09322 157.754 2.94799 157.285 4.03155C156.384 2.74244 154.873 2.95093 154.09 3.41783C152.786 4.19893 151.842 2.71895 150.743 3.29156C150.546 3.39287 150.251 3.36057 150.13 3.51914C149.551 4.27234 149.136 4.10056 148.38 3.63366C147.647 3.18144 146.498 3.05371 145.722 3.37672C144.717 3.79663 143.5 4.11965 142.727 3.94052C141.525 3.66302 140.508 4.03889 139.411 4.08588C130.828 4.44413 122.241 3.59989 113.646 4.80091C107.231 5.69653 100.726 4.48083 94.2204 5.55852C88.3031 6.53636 82.2374 5.30451 76.2117 6.3822C71.461 7.23231 66.5543 6.02688 61.7184 7.20735C59.4754 7.755 57.0311 7.13247 54.7003 7.3483C52.5618 7.54798 50.4736 6.98711 48.2267 7.87099C46.1321 8.69467 43.6 8.07067 41.2615 8.11178C40.9001 8.11912 40.54 8.27035 40.18 8.35551C40.6575 8.90169 41.0937 8.91637 41.5286 8.89875C45.6598 8.73578 49.769 8.95602 53.9246 8.2263C58.9153 7.35123 64.0247 8.46562 69.1238 7.42758C73.8551 6.46442 78.8264 8.15436 83.5899 6.48351C84.2597 6.24859 84.8302 8.02075 85.4922 6.54958C86.255 7.86805 86.9687 6.46736 87.7056 6.44974C93.4783 6.31319 99.2821 7.10751 105.02 5.72883C105.789 5.54383 106.94 5.39261 107.38 5.86685C108.378 6.9416 108.866 5.2634 109.732 5.63487C110.451 5.94319 111.353 5.698 112.174 5.698C116.868 5.698 121.561 5.74205 126.253 5.66863C127.459 5.64955 128.804 6.27502 129.887 4.9815C130.008 4.83761 130.642 5.30598 131.052 5.40876C131.597 5.5453 132.484 5.88887 132.649 5.64221C133.303 4.66877 133.69 5.51887 134.249 5.61871C134.805 5.71709 135.452 4.94773 136.058 4.94773C137.038 4.94773 138.183 4.39127 138.965 5.61578C139.645 4.6996 140.581 4.89634 141.46 4.90515C142.351 4.91396 143.344 4.5748 143.979 5.68479C144.611 4.54837 145.619 4.91103 146.507 4.90809C152.374 4.88753 158.242 5.05198 164.104 4.85376C169.873 4.65702 175.693 5.76554 181.413 4.09615C182.118 4.86551 183.033 4.45147 183.823 4.52341C184.842 4.61885 185.894 4.13433 186.933 4.12992C188.136 4.12552 189.451 3.65715 190.489 4.82734C191.637 3.3958 193.134 4.14167 194.446 4.1358C209.931 4.0756 225.418 4.09909 240.905 4.09028C242.036 4.09028 243.168 4.01246 256.566 3.63219Z" fill="#3E509D" />
						</svg>
					</span>
				</span>?
			</h2>

			<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
				<!-- Item 1 -->
				<div class="flex items-center space-x-4 p-4 rounded-lg group hover:shadow-lg transition-shadow" style="background: #E8EDEF66;">
					<div class="w-12 h-12 flex-shrink-0 text-[#9FCE00] group-hover:scale-110 transition-transform">
						<img src="<?php echo esc_url($assets_uri . '/vector-2.png'); ?>" class="w-full h-full object-contain" alt="">
					</div>
					<div class="text-[#2E3A8C] font-semibold text-sm leading-tight font-['Roboto']">
						Atención<br>real y personalizada
					</div>
				</div>
				<!-- Item 2 -->
				<div class="flex items-center space-x-4 p-4 rounded-lg group hover:shadow-lg transition-shadow" style="background: #E8EDEF66;">
					<div class="w-12 h-12 flex-shrink-0 text-[#9FCE00] group-hover:scale-110 transition-transform">
						<img src="<?php echo esc_url($assets_uri . '/vector-3.png'); ?>" class="w-full h-full object-contain" alt="">
					</div>
					<div class="text-[#2E3A8C] font-semibold text-sm leading-tight font-['Roboto']">
						Asesoramiento<br>técnico especializado
					</div>
				</div>
				<!-- Item 3 -->
				<div class="flex items-center space-x-4 p-4 rounded-lg group hover:shadow-lg transition-shadow" style="background: #E8EDEF66;">
					<div class="w-12 h-12 flex-shrink-0 text-[#9FCE00] group-hover:scale-110 transition-transform">
						<img src="<?php echo esc_url($assets_uri . '/vector-4.png'); ?>" class="w-full h-full object-contain" alt="">
					</div>
					<div class="text-[#2E3A8C] font-semibold text-sm leading-tight font-['Roboto']">
						Logística<br>eficiente y adaptable
					</div>
				</div>
				<!-- Item 4 -->
				<div class="flex items-center space-x-4 p-4 rounded-lg group hover:shadow-lg transition-shadow" style="background: #E8EDEF66;">
					<div class="w-12 h-12 flex-shrink-0 text-[#9FCE00] group-hover:scale-110 transition-transform">
						<img src="<?php echo esc_url($assets_uri . '/vector-5.png'); ?>" class="w-full h-full object-contain" alt="">
					</div>
					<div class="text-[#2E3A8C] font-semibold text-sm leading-tight font-['Roboto']">
						Compromiso con la calidad
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- PRODUCTS SECTION 
	<section class="py-16 bg-white">
		<div class="container mx-auto px-4">
			<h2 class="text-3xl font-bold text-center text-[#9FCE00] mb-12 font-['Roboto']">
				PANEL SÁNDWICH <span class="text-[#2E3A8C]">para tu proyecto</span>
			</h2>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php /*
			// Query products from database
			$products_query = new WP_Query(array(
				'post_type'      => 'producto',
				'posts_per_page' => 6,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post_status'    => 'publish',
			));

			if ($products_query->have_posts()) :
				while ($products_query->have_posts()) :
					$products_query->the_post();

					// Get product data
					$product_url = get_post_meta(get_the_ID(), '_vgs_product_url', true);
					if (empty($product_url)) {
						$product_url = '#';
					}

					$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
					if (empty($thumbnail_url)) {
						$thumbnail_url = $assets_uri . '/panel.png'; // Fallback image
					}

					// Display product card
					get_template_part('template-parts/components/card-product', null, [
						'title'       => get_the_title(),
						'description' => get_the_excerpt(),
						'image_url'   => $thumbnail_url,
						'link'        => $product_url,
					]);
				endwhile;
				wp_reset_postdata();
			else :
				// Fallback: Show message if no products exist
			?>
				<div class="col-span-full text-center py-12">
					<p class="text-gray-600 text-lg">No hay productos disponibles. <a href="<?php echo admin_url('post-new.php?post_type=producto'); ?>" class="text-[#9FCE00] hover:underline">Agregar productos</a></p>
				</div>
				<?php
			endif;
				*/ ?>
		</div>
		</div>
	</section>
	-->
	<!-- PRODUCTS SECTION SHORTCODE PLUGIN LPPRODUCTS -->
	<section class="py-16" style="background: #F5F8F9;">
		<div class="container mx-auto px-4">
			<h2 class="text-3xl font-bold text-center text-[#9FCE00] mb-12 font-['Roboto']">
				PANEL SÁNDWICH <span class="text-[#2E3A8C]">para tu proyecto</span>
			</h2>
			<!-- LPPRODUCTS SHORTCODE (plugin de VGS) show 6 and 3 columns-->
			<?php echo do_shortcode('[lp_products limit="6" cols="3"]'); ?>
		</div>
	</section>
	<!-- QUOTE FORM SECTION -->
	<section class="py-16 relative z-10" style="background: #E8EDEF;">
		<div class="container mx-auto px-4 relative" style="max-width: 1309px;">
			<!-- Decorative "Pide PRESUPUESTO" is centered top or part of design. 
			     Mockup puts it above form or overlapping. -->
			<div class="text-center mb-8">
				<h2 class="text-4xl font-bold text-[#2E3A8C] font-['Roboto']">
					Pide
					<span class="text-[#9FCE00] relative inline-block">
						PRESUPUESTO
						<span class="block mt-2 mx-auto w-[270px] h-[25px]">
							<img src="<?php echo esc_url($assets_uri . '/Page-1.png'); ?>" class="w-full h-full object-contain" alt="">
						</span>
					</span>
				</h2>
				<!-- Underline squiggle -->
			</div>

			<form class="space-y-6">
				<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
					<!-- Row 1 -->
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="nombre">Nombre*</label>
						<input class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" type="text" id="nombre" placeholder="Nombre">
					</div>
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="telefono">Teléfono</label>
						<input class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" type="text" id="telefono" placeholder="+34">
					</div>
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="email">Correo electrónico*</label>
						<input class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" id="email" placeholder="mail@mail.com">
					</div>

					<!-- Row 2 -->
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="material">Material*</label>
						<select class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" id="material">
							<option>Material</option>
						</select>
					</div>
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="metros">Metros cuadrados*</label>
						<select class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" id="metros">
							<option>m2</option>
						</select>
					</div>
					<div>
						<label class="block text-xs font-bold text-gray-700 mb-1 font-['Roboto']" for="provincia">Provincia de entrega*</label>
						<select class="w-full rounded border-gray-300 p-2 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500" id="provincia">
							<option>Seleccione provincia</option>
						</select>
					</div>
				</div>

				<!-- Checkbox -->
				<div class="text-xs text-gray-600 font-['Roboto']">
					<div class="flex items-start mb-2">
						<input type="checkbox" class="mt-1 mr-2 rounded border-gray-300" id="info">
						<label for="info">Acepto recibir información comercial, así como descuentos, promociones y actualizaciones de producto pertinentes.</label>
					</div>
					<div class="flex items-start">
						<input type="checkbox" class="mt-1 mr-2 rounded text-[#9FCE00] border-gray-300 focus:ring-[#9FCE00]" id="privacy" checked>
						<label for="privacy">Confirmo que he leído y aceptado la <a href="#" class="underline text-blue-600">política de privacidad y venta</a> *</label>
					</div>
				</div>

			</form>
		</div>
	</section>

	<!-- Button between sections -->
	<div class="relative -mt-6 mb-6 z-30 flex justify-center">
		<button type="button" class="bg-[#2E3A8C] text-white font-bold py-3 px-12 rounded-full hover:bg-opacity-90 transition-colors uppercase text-sm shadow-xl font-['Roboto']">
			PIDE PRESUPUESTO
		</button>
	</div>

	<!-- ABOUT SECTION -->
	<section class="pt-12 pb-16 bg-white overflow-hidden relative z-0">
		<div class="container mx-auto px-4">
			<div class="flex flex-col md:flex-row items-start gap-11">
				<div class="w-full md:w-1/3">
					<div class="max-w-[320px] md:max-w-[360px] mx-auto md:mx-0">
						<img src="<?php echo esc_url($assets_uri . '/image-1.png'); ?>" alt="Nave industrial" class="w-full h-auto object-cover">
					</div>
				</div>
				<div class="w-full md:w-2/3 relative">
					<!-- Green arrow visual -->
					<div class="hidden md:block absolute right-[-40px] top-2 w-[240px] h-[240px]">
						<img src="<?php echo esc_url($assets_uri . '/vector.png'); ?>" class="w-full h-full object-contain" alt="">
					</div>

					<h2 class="text-3xl font-bold text-[#2E3A8C] mb-4 font-['Roboto']">
						Profesionales y <span class="text-[#9FCE00]">CERCANOS</span>
					</h2>
					<p class="text-gray-600 mb-4 text-base leading-loose font-['Roboto'] max-w-3xl">
						Por eso, en <strong>XXXXXX</strong> estamos en constante desarrollo en los materiales y técnicas de la construcción modular prefabricada.
					</p>
					<p class="text-gray-600 mb-4 text-base leading-loose font-['Roboto'] max-w-3xl">
						Contamos con un excelente equipo de ingenieros, delineantes, técnicos y montadores con experiencia y profesionalidad con el fin de que el cliente siempre tenga el mejor resultado posible.
					</p>
					<p class="text-gray-600 mb-8 text-base leading-loose font-['Roboto'] max-w-3xl">
						Nos encanta asesorarte e intentar dar solución a tus inquietudes y proyectos y para ello creemos en el trato personal y humano para poder resolver todas tus dudas.
					</p>

					<a href="#" class="inline-block border-2 border-[#9FCE00] text-[#2E3A8C] font-bold py-2 px-8 rounded-full hover:bg-[#9FCE00] hover:text-white transition-colors uppercase text-sm font-['Roboto']">
						CONTACTA CON NOSOTROS
					</a>
				</div>
			</div>

			<!-- Services Icons Row -->
			<div class="mt-16 bg-gray-50 rounded-2xl p-6 shadow-sm">
				<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
					<div class="flex items-center space-x-4 md:border-r md:border-[#2E3A8C] md:pr-6">
						<div class="w-12 h-12 text-[#9FCE00]">
							<img src="<?php echo esc_url($assets_uri . '/Vector-2.svg'); ?>" alt="">
						</div>
						<div class="text-[#2E3A8C] font-bold text-sm leading-tight font-['Roboto']">Punto de venta<br>de panel sándwich</div>
					</div>
					<div class="flex items-center space-x-4 md:border-r md:border-[#2E3A8C] md:pr-6">
						<div class="w-12 h-12 text-[#9FCE00]">
							<img src="<?php echo esc_url($assets_uri . '/Vector-3.svg'); ?>" alt="">
						</div>
						<div class="text-[#2E3A8C] font-bold text-sm leading-tight font-['Roboto']">Diseño y fabricación<br>de estructuras</div>
					</div>
					<div class="flex items-center space-x-4 md:border-r md:border-[#2E3A8C] md:pr-6">
						<div class="w-12 h-12 text-[#9FCE00]">
							<img src="<?php echo esc_url($assets_uri . '/Vector-4.svg'); ?>" alt="">
						</div>
						<div class="text-[#2E3A8C] font-bold text-sm leading-tight font-['Roboto']">Ingeniería</div>
					</div>
					<div class="flex items-center space-x-4">
						<div class="w-12 h-12 text-[#9FCE00]">
							<img src="<?php echo esc_url($assets_uri . '/Vector-5.svg'); ?>" alt="">
						</div>
						<div class="text-[#2E3A8C] font-bold text-sm leading-tight font-['Roboto']">Construcción<br>modular prefabricada</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- TESTIMONIALS SECTION -->
	<section class="py-16 bg-gray-50">
		<div class="container mx-auto px-4">
			<!-- Title and navigation buttons -->
			<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#2E3A8C] font-['Roboto'] text-center md:text-center flex-1">
					Reseñas de <span class="text-[#9FCE00]">CLIENTES</span>
				</h2>
				<!-- Navigation buttons centered on mobile, right-aligned on desktop -->
				<div class="flex space-x-2 justify-center md:justify-end">
					<button class="w-10 h-10 rounded-full border border-[#2E3A8C] text-[#2E3A8C] flex items-center justify-center hover:bg-[#2E3A8C] hover:text-white transition-colors">
						<span class="sr-only">Previous</span>
						&larr;
					</button>
					<button class="w-10 h-10 rounded-full bg-[#2E3A8C] text-white flex items-center justify-center hover:bg-opacity-90 transition-colors">
						<span class="sr-only">Next</span>
						&rarr;
					</button>
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				<!-- Review 1 -->
				<div class="bg-white p-6 rounded-lg shadow-sm">
					<div class="flex items-start mb-4">
						<!-- Avatar -->
						<div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
							<img src="<?php echo esc_url($assets_uri . '/image-2.png'); ?>" alt="Carlos Javier" class="w-full h-full object-cover">
						</div>
						<!-- Vertical divider -->
						<div class="w-px h-12 bg-gray-300 mx-3"></div>
						<!-- Name and stars container -->
						<div class="flex-1 flex flex-col">
							<div class="flex items-start justify-between">
								<div class="font-bold text-[#2E3A8C] font-['Roboto'] text-sm">Carlos Javier</div>
								<div class="text-yellow-400 text-base">★★★★★</div>
							</div>
							<div class="text-xs text-gray-400 font-['Roboto'] text-right mt-1">30/01/2024</div>
						</div>
					</div>
					<p class="text-gray-600 text-xs leading-relaxed font-['Roboto']">
						Me considero un cliente satisfecho. Me asesoraron como ninguna otra empresa. Cumplieron en los tiempos y excelente trato humano.
					</p>
				</div>
				<!-- Review 2 -->
				<div class="bg-white p-6 rounded-lg shadow-sm">
					<div class="flex items-start mb-4">
						<!-- Avatar -->
						<div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
							<img src="<?php echo esc_url($assets_uri . '/image-2.png'); ?>" alt="Carlos Javier" class="w-full h-full object-cover">
						</div>
						<!-- Vertical divider -->
						<div class="w-px h-12 bg-gray-300 mx-3"></div>
						<!-- Name and stars container -->
						<div class="flex-1 flex flex-col">
							<div class="flex items-start justify-between">
								<div class="font-bold text-[#2E3A8C] font-['Roboto'] text-sm">Carlos Javier</div>
								<div class="text-yellow-400 text-base">★★★★★</div>
							</div>
							<div class="text-xs text-gray-400 font-['Roboto'] text-right mt-1">30/01/2024</div>
						</div>
					</div>
					<p class="text-gray-600 text-xs leading-relaxed font-['Roboto']">
						Atención muy buena por parte del comercial y entrega muy rápida.
					</p>
				</div>
				<!-- Review 3 -->
				<div class="bg-white p-6 rounded-lg shadow-sm">
					<div class="flex items-start mb-4">
						<!-- Avatar -->
						<div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
							<img src="<?php echo esc_url($assets_uri . '/image-2.png'); ?>" alt="Carlos Javier" class="w-full h-full object-cover">
						</div>
						<!-- Vertical divider -->
						<div class="w-px h-12 bg-gray-300 mx-3"></div>
						<!-- Name and stars container -->
						<div class="flex-1 flex flex-col">
							<div class="flex items-start justify-between">
								<div class="font-bold text-[#2E3A8C] font-['Roboto'] text-sm">Carlos Javier</div>
								<div class="text-yellow-400 text-base">★★★★★</div>
							</div>
							<div class="text-xs text-gray-400 font-['Roboto'] text-right mt-1">30/01/2024</div>
						</div>
					</div>
					<p class="text-gray-600 text-xs leading-relaxed font-['Roboto']">
						Necesitaba unos paneles para un trabajo en mi casa, fui de forma particular y me atendieron muy bien...
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- CTA SECTION - Asesoramiento Personalizado -->
	<section class="py-16 bg-[#9FCE00] relative overflow-hidden">
		<div class="container mx-auto px-4">
			<div class="max-w-4xl mx-auto text-center relative">
				<!-- Decorative arrow on the left -->
				<div class="hidden md:block absolute left-[-120px] top-1/2 -translate-y-1/2 w-[200px] h-[200px]">
					<img src="<?php echo esc_url($assets_uri . '/Vector-1.png'); ?>" class="w-full h-full object-contain" alt="">
				</div>

				<h2 class="text-3xl font-bold text-[#2E3A8C] mb-4 font-['Roboto']">
					¿Necesitas asesoramiento
					<br><span class="text-white">PERSONALIZADO</span>?
				</h2>

				<p class="text-[#2E3A8C] mb-8 text-base leading-relaxed font-['Roboto'] max-w-2xl mx-auto">
					Todos nuestros <strong>Paneles Sándwich</strong> disponen de guías de montaje exclusivas. <br>
					Además, disponemos de un <strong>departamento técnico</strong> para resolver sus dudas
					y calculamos los elementos necesarios para su correcto montaje e instalación.
				</p>

				<a href="#" class="inline-block bg-white border-2 border-white text-[#2E3A8C] font-bold py-3 px-10 rounded-full hover:bg-[#2E3A8C] hover:text-white transition-colors uppercase text-sm font-['Roboto'] shadow-lg">
					CONTACTA CON NOSOTROS
				</a>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer('landing');
