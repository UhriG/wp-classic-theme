<?php
/**
 * The template for displaying all single posts.
 *
 * @package CUCT
 */

get_header();
?>

<div class="max-w-6xl mx-auto px-4 py-16">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="mb-8">
					<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
				</div>
			<?php endif; ?>

			<h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
			<div class="text-gray-600 mb-4 text-sm">
				<?php echo get_the_date(); ?> • <?php echo get_the_author(); ?>
			</div>
			<div class="prose lg:prose-lg">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
