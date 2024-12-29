<?php
/**
 * The footer for our theme.
 *
 * @package CUCT
 */

?>

<footer class="bg-gray-900 text-white">
		<div class="max-w-6xl mx-auto px-4 py-12">
			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<div>
					<h3 class="text-xl font-bold mb-4"><?php bloginfo( 'name' ); ?></h3>
					<p class="text-gray-400"><?php bloginfo( 'description' ); ?></p>
				</div>
				<div>
					<h3 class="text-xl font-bold mb-4">Quick Links</h3>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'space-y-2 text-gray-400',
						)
					);
					?>
				</div>
				<div>
					<h3 class="text-xl font-bold mb-4">Contact</h3>
					<p class="text-gray-400">Get in touch with us</p>
				</div>
			</div>
			<div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
