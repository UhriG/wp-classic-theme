<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CUCT
 */

get_header();
?>

<div class="max-w-6xl mx-auto px-4 py-16 text-center">
	<h1 class="text-9xl font-bold text-gray-200 mb-4">404</h1>
	<h2 class="text-4xl font-bold mb-4"><?php esc_html_e( 'Oops! Page Not Found', 'cu-classic-theme' ); ?></h2>
	<p class="text-gray-600 mb-8"><?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'cu-classic-theme' ); ?></p>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
		<?php esc_html_e( 'Return Home', 'cu-classic-theme' ); ?>
	</a>
</div>

<?php get_footer(); ?>
