<?php
/**
 * Add Theme Support.
 *
 * @package CUCT
 */

namespace CUCT\Setup;

use CUCT\Customizer\Hero;

/**
 * ThemeSupport.
 */
class ThemeSupport {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
		add_filter( 'nav_menu_css_class', array( $this, 'add_menu_li_class' ), 10, 4 );
		add_filter( 'nav_menu_link_attributes', array( $this, 'add_menu_link_class' ), 10, 4 );

		// Initialize Customizer classes.
		new Hero();
	}

	/**
	 * Add theme support.
	 */
	public function theme_support() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// Register navigation menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'cu-classic-theme' ),
				'footer'  => __( 'Footer Menu', 'cu-classic-theme' ),
			)
		);
	}

	/**
	 * Add custom classes to menu li elements.
	 *
	 * @param array    $classes An array of classes for the list item.
	 * @param WP_Post  $item The current menu item.
	 * @param stdClass $args An object of wp_nav_menu() arguments.
	 * @param int      $depth Depth of menu item. Used for padding.
	 *
	 * @return array
	 */
	public function add_menu_li_class( $classes, $item, $args, $depth ) {
		if ( isset( $args->li_class ) ) {
			$classes[] = $args->li_class;
		}
		return $classes;
	}

	/**
	 * Add custom classes to menu link elements.
	 *
	 * @param array    $atts The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
	 * @param WP_Post  $item The current menu item.
	 * @param stdClass $args An object of wp_nav_menu() arguments.
	 * @param int      $depth Depth of menu item. Used for padding.
	 *
	 * @return array
	 */
	public function add_menu_link_class( $atts, $item, $args, $depth ) {
		if ( isset( $args->link_class ) ) {
			$atts['class'] = $args->link_class;
		}
		return $atts;
	}
}
