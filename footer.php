<?php
/**
 * The footer for our theme.
 *
 * @package CUCT
 */

?>

</main>

<footer class="bg-gray-900 text-white mt-auto">
	<div class="max-w-6xl mx-auto px-4 py-12">
	<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
		<div class="footer-logo-wrapper">
		<?php if ( get_theme_mod( 'footer_logo' ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_mod( 'footer_logo' ) ); ?>"
				alt="<?php bloginfo( 'name' ); ?>"
				class="h-24 mb-4 object-contain">
			</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
			class="text-xl font-bold mb-4 hover:text-gray-300">
				<?php bloginfo( 'name' ); ?>
			</a>
		<?php endif; ?>
			<p class="text-gray-400"><?php bloginfo( 'description' ); ?></p>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<div>
		<h3 class="footer-quicklinks-title text-xl font-bold mb-4">
			<?php echo esc_html( get_theme_mod( 'footer_quicklinks_title', __( 'Quick Links', 'cu-classic-theme' ) ) ); ?>
		</h3>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'space-y-2 text-gray-400',
					'depth'          => 1,
				)
			);
			?>
		</div>
		<?php endif; ?>

		<div>
		<h3 class="footer-contact-title text-xl font-bold mb-4">
			<?php echo esc_html( get_theme_mod( 'footer_contact_title', __( 'Contact', 'cu-classic-theme' ) ) ); ?>
		</h3>
		<div class="footer-contact-content text-gray-400">
			<?php echo wp_kses_post( get_theme_mod( 'footer_contact_content', __( 'Get in touch with us', 'cu-classic-theme' ) ) ); ?>
		</div>
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
