<?php
/**
 * About Page Customizer Settings
 *
 * @package CUCT
 */

namespace CUCT\Customizer;

/**
 * About class for customizer settings
 */
class About {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );
	}

	/**
	 * Register customizer settings
	 *
	 * @param \WP_Customize_Manager $wp_customize WordPress customizer object.
	 * @return void
	 */
	public function register( $wp_customize ) {
		// Add About Section.
		$wp_customize->add_section(
			'about_section',
			array(
				'title'    => __( 'About Page', 'cu-classic-theme' ),
				'priority' => 35,
			)
		);

		// Add hero settings to About section.
		$hero = new Hero();
		$hero->add_hero_settings(
			$wp_customize,
			'about_section',
			'about_hero',
			__( 'Hero Title', 'cu-classic-theme' ),
			__( 'Hero Description', 'cu-classic-theme' )
		);
	}
}
