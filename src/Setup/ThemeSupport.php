<?php
/**
 * Add Theme Support.
 *
 * @package CUCT
 */

namespace CUCT\Setup;

/**
 * ThemeSupport.
 */
class ThemeSupport {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
	}

	/**
	 * Add theme support.
	 */
	public function theme_support() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
}
