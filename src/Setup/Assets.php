<?php
/**
 * Handles dynamic asset enqueueing.
 *
 * @package CUCT
 */

namespace CUCT\Setup;

/**
 * Assets class.
 */
class Assets {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue CSS and JS assets dynamically.
	 */
	public function enqueue_assets() {
		$template_slug = $this->get_template_slug();

		// Always enqueue global assets.
		$this->enqueue_file( 'global' );

		// Enqueue template-specific assets if they exist.
		if ( $template_slug ) {
			$this->enqueue_file( $template_slug );
		}
	}

	/**
	 * Get the current template slug.
	 *
	 * @return string|null Template slug or null if not applicable.
	 */
	private function get_template_slug() {
		// Use WordPress template functions to detect the current template.
		if ( is_page_template() ) {
			return basename( get_page_template_slug(), '.php' );
		}

		if ( is_home() ) {
			return 'home';
		}

		if ( is_singular() ) {
			return get_post_type() ? 'single-' . get_post_type() : 'single';
		}

		if ( is_archive() ) {
			return get_post_type() ? 'archive-' . get_post_type() : 'archive';
		}

		if ( is_search() ) {
			return 'search';
		}

		if ( is_404() ) {
			return '404';
		}

		return null; // Default fallback.
	}

	/**
	 * Enqueue a file by slug.
	 *
	 * @param string $slug File slug (without extensions).
	 */
	private function enqueue_file( $slug ) {
		// Enqueue CSS if it exists.
		$css_file = get_template_directory() . "/build/css/css-$slug.min.css";
		if ( file_exists( $css_file ) ) {
			wp_enqueue_style(
				"cuct-$slug-style",
				get_template_directory_uri() . "/build/css/css-$slug.min.css",
				array(),
				filemtime( $css_file )
			);
		}

		// Enqueue JS if it exists.
		$js_file = get_template_directory() . "/build/js/js-$slug.min.js";
		if ( file_exists( $js_file ) ) {
			wp_enqueue_script(
				"cuct-$slug-script",
				get_template_directory_uri() . "/build/js/js-$slug.min.js",
				array(),
				filemtime( $js_file ),
				true
			);
		}
	}
}
