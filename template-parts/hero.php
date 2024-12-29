<?php
/**
 * Template part for displaying the hero section
 *
 * @package CUCT
 */

$cuct_context         = isset( $args['context'] ) ? $args['context'] : 'home';
$cuct_settings_prefix = ( 'about' === $cuct_context ) ? 'about_hero_' : ( 'page' === $cuct_context ? 'page_hero_' : 'hero_' );

$cuct_title       = isset( $args['title'] ) ? $args['title'] : get_theme_mod( $cuct_settings_prefix . 'title' );
$cuct_description = isset( $args['subtitle'] ) ? $args['subtitle'] : get_theme_mod( $cuct_settings_prefix . 'description' );
?>

<div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-24">
	<div class="max-w-6xl mx-auto px-4 text-center">
		<h1 class="hero-title text-4xl md:text-6xl font-bold mb-4" data-hero="<?php echo esc_attr( $cuct_settings_prefix . 'title' ); ?>">
			<?php echo esc_html( $cuct_title ); ?>
		</h1>
		<p class="hero-description text-xl md:text-2xl opacity-90" data-hero="<?php echo esc_attr( $cuct_settings_prefix . 'description' ); ?>">
			<?php echo esc_html( $cuct_description ); ?>
		</p>
	</div>
</div>
