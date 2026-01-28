<?php

/**
 * Template part for displaying the landing header content (Top Bar)
 *
 * @package _tw
 */
?>

<header id="masthead" class="z-50 relative font-['Roboto']">
	<!-- Top Bar -->
	<div class="bg-[#9FCE00] text-white shadow-sm fixed md:relative z-[9999] h-[70px] flex items-center w-full top-0 left-0">
		<div class="container mx-auto flex flex-row justify-between items-center px-4 w-full h-full max-w-[1600px]">
			<!-- Logo/Email -->
			<div class="flex items-center space-x-6 text-[15px] font-medium leading-[28px] tracking-[0%]">
				<a href="mailto:dominio@dominio.es" class="flex items-center hover:text-blue-900 transition-colors">
					<!-- Icon Email -->
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/Email.png'); ?>" class="w-6 h-4 mr-2" alt="email">
					dominio@dominio.es
				</a>
			</div>

			<!-- Phone Button -->
			<div class="flex items-center">
				<div class="bg-white text-[#3E509D] min-w-[132px] sm:min-w-[152px] h-[45px] rounded-[30px] flex items-center justify-center gap-[5px] sm:gap-[10px] px-[24px] shadow-sm whitespace-nowrap">
					<!-- Icon Phone -->
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/Phone .png'); ?>" class="w-4 h-4" alt="phone">
					<span class="font-bold text-[14px] leading-none tracking-[-0.8%] capitalize mt-1">123 456 789</span>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->