<?php
/**
 * Header Customizer Settings
 *
 * @package CUCT
 */

namespace CUCT\Customizer;

/**
 * Header class for customizer settings
 */
class Header {

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
		// Add Header Section.
		$wp_customize->add_section(
			'header_section',
			array(
				'title'    => __( 'Header Settings', 'cu-classic-theme' ),
				'priority' => 85,
			)
		);

		// Header Logo Setting.
		$wp_customize->add_setting(
			'header_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'header_logo',
				array(
					'label'       => __( 'Header Logo', 'cu-classic-theme' ),
					'section'     => 'header_section',
					'description' => __( 'Upload a logo for the navigation bar. If no logo is provided, the site name will be displayed.', 'cu-classic-theme' ),
				)
			)
		);

		// Add logo partial for live preview.
		$wp_customize->selective_refresh->add_partial(
			'header_logo',
			array(
				'selector'            => '.navbar-brand',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_header_logo' ),
			)
		);
	}

	/**
	 * Render header logo/brand
	 *
	 * @return string
	 */
	public function render_header_logo() {
		$logo = get_theme_mod( 'header_logo' );
		if ( $logo ) {
			return sprintf(
				'<img src="%1$s" alt="%2$s" class="h-8">',
				esc_url( $logo ),
				esc_attr( get_bloginfo( 'name' ) )
			);
		}
		return esc_html( get_bloginfo( 'name' ) );
	}
}
