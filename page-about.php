<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 *
 * @package CUCT
 */

get_header();

get_template_part(
	'template-parts/hero',
	null,
	array(
		'context'  => 'about',
		'title'    => get_theme_mod( 'about_hero_title', get_the_title() ),
		'subtitle' => get_theme_mod( 'about_hero_description' ),
	)
);
?>

<div class="max-w-6xl mx-auto px-4 py-16">
	<div class="prose lg:prose-lg mx-auto">
		<?php the_content(); ?>
	</div>

</div>

<?php get_footer(); ?>