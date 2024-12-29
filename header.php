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
<body <?php body_class(); ?>>
	<header>
		<nav class="bg-white shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between items-center h-16">
					<h1 class="text-xl font-bold">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-gray-800 hover:text-gray-600">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					
					<!-- Mobile menu button -->
					<button id="mobile-menu-button" class="md:hidden flex items-center px-3 py-2 border rounded text-gray-500 border-gray-500 hover:text-gray-600 hover:border-gray-600">
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
			<div id="mobile-menu" class="hidden md:hidden px-2 pt-2 pb-3 space-y-1">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'space-y-2',
						'li_class'       => 'block px-3 py-2 text-gray-600 hover:text-gray-900',
					)
				);
				?>
			</div>
		</nav>
	</header>
