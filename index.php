<?php
	/**
	 * The main template file.
	 *
	 * @package CUCT
	 */

?>

	<?php get_header(); ?>

<main>
	<?php if ( is_home() && ! is_paged() ) : ?>
		<div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-24">
			<div class="max-w-6xl mx-auto px-4 text-center">
				<h2 class="hero-title text-4xl md:text-6xl font-bold mb-4">
					<?php echo esc_html( get_theme_mod( 'hero_title', 'Welcome to our site' ) ); ?>
				</h2>
				<p class="hero-description text-xl md:text-2xl opacity-90">
					<?php echo esc_html( get_theme_mod( 'hero_description', 'Discover amazing content' ) ); ?>
				</p>
			</div>
		</div>
	<?php endif; ?>

	<div class="max-w-6xl mx-auto px-4 py-12">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:-translate-y-1' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="aspect-w-16 aspect-h-9">
							<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
						</div>
					<?php endif; ?>
					
					<div class="p-6">
						<h2 class="text-xl font-bold mb-2">
							<a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="text-gray-600 mb-4 text-sm">
							<?php echo get_the_date(); ?> • <?php echo get_the_author(); ?>
						</div>
						<div class="text-gray-700 mb-4">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
							Read More
						</a>
					</div>
				</article>
			<?php endwhile; else : ?>
				<p class="text-gray-600"><?php esc_html_e( 'No posts found.', 'cu-classic-theme' ); ?></p>
			<?php endif; ?>
		</div>

		<div class="mt-8 flex justify-center">
			<?php
			echo wp_kses_post(
				paginate_links(
					array(
						'prev_text' => __( '← Previous', 'cu-classic-theme' ),
						'next_text' => __( 'Next →', 'cu-classic-theme' ),
						'class'     => 'inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50',
					)
				)
			);
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
