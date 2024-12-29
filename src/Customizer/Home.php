<?php
/**
 * Home Page Customizer Settings
 *
 * @package CUCT
 */

namespace CUCT\Customizer;

/**
 * Home class for customizer settings
 */
class Home {
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
		// Add Home Section.
		$wp_customize->add_section(
			'home_section',
			array(
				'title'    => __( 'Home Page', 'cu-classic-theme' ),
				'priority' => 30,
			)
		);

		// Add hero settings to Home section.
		$hero = new Hero();
		$hero->add_hero_settings(
			$wp_customize,
			'home_section',
			'hero',
			__( 'Hero Title', 'cu-classic-theme' ),
			__( 'Hero Description', 'cu-classic-theme' )
		);
	}
}
