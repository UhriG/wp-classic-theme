<?php
	/**
	 * The main template file.
	 *
	 * @package CUCT
	 */

?>

	<?php get_header(); ?>
	<main>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div><?php the_content(); ?></div>
		</article>
			<?php
		endwhile;
	else :
		?>
		<p><?php esc_html_e( 'No posts found.', 'cu-classic-theme' ); ?></p>
		<?php
	endif;
	?>
	</main>
	<?php get_footer(); ?>
