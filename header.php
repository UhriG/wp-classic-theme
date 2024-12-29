<?php
/**
 * The header for our theme.
 *
 * @package CUCT
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'flex flex-col min-h-screen' ); ?>>
	<header class="sticky top-0 z-50">
		<nav class="bg-white/95 backdrop-blur-sm shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between items-center h-16">
					<div class="navbar-brand text-xl font-bold">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-gray-800 hover:text-gray-600">
							<?php if ( get_theme_mod( 'header_logo' ) ) : ?>
								<img src="<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>" 
									alt="<?php bloginfo( 'name' ); ?>" 
									class="h-16">
							<?php else : ?>
								<?php bloginfo( 'name' ); ?>
							<?php endif; ?>
						</a>
					</div>
					
					<button id="mobile-menu-button" 
						class="md:hidden flex items-center px-3 py-2 border rounded text-gray-500 border-gray-500 hover:text-gray-600 hover:border-gray-600" 
						aria-controls="mobile-menu" 
						aria-expanded="false">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>

					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => 'hidden md:block',
							'container_id'    => 'main-nav',
							'menu_class'      => 'md:flex md:space-x-8',
							'li_class'        => 'block mt-4 md:inline-block md:mt-0 text-gray-600 hover:text-gray-900',
						)
					);
					?>
				</div>
			</div>
			<!-- Mobile menu -->
			<div id="mobile-menu" 
			class="mobile-menu absolute w-full bg-white shadow-lg md:hidden"
			aria-hidden="true">
			<div class="px-4 py-6 space-y-1">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'space-y-4',
					'li_class'       => 'block px-3 py-2 text-gray-600 hover:text-gray-900 transition-colors',
				)
			);
			?>
			</div>
			</div>
		</nav>
	</header>
	<main class="flex-grow">
