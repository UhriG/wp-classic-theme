<?php
/**
 * Hero Customizer Settings
 *
 * @package CUCT
 */

namespace CUCT\Customizer;

/**
 * Hero class for customizer settings
 */
class Hero {

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
		// Add Hero Section.
		$wp_customize->add_section(
			'hero_section',
			array(
				'title'    => __( 'Hero Section', 'cu-classic-theme' ),
				'priority' => 30,
			)
		);

		$this->add_title_setting( $wp_customize );
		$this->add_description_setting( $wp_customize );
	}

	/**
	 * Add title setting and control
	 *
	 * @param \WP_Customize_Manager $wp_customize WordPress customizer object.
	 * @return void
	 */
	private function add_title_setting( $wp_customize ) {
		$wp_customize->add_setting(
			'hero_title',
			array(
				'default'           => __( 'Welcome to our site', 'cu-classic-theme' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'hero_title',
			array(
				'label'   => __( 'Hero Title', 'cu-classic-theme' ),
				'section' => 'hero_section',
				'type'    => 'text',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'hero_title',
			array(
				'selector'            => '.hero-title',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_hero_title' ),
			)
		);
	}

	/**
	 * Add description setting and control
	 *
	 * @param \WP_Customize_Manager $wp_customize WordPress customizer object.
	 * @return void
	 */
	private function add_description_setting( $wp_customize ) {
		$wp_customize->add_setting(
			'hero_description',
			array(
				'default'           => __( 'Discover amazing content', 'cu-classic-theme' ),
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'hero_description',
			array(
				'label'   => __( 'Hero Description', 'cu-classic-theme' ),
				'section' => 'hero_section',
				'type'    => 'textarea',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'hero_description',
			array(
				'selector'            => '.hero-description',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_hero_description' ),
			)
		);
	}

	/**
	 * Render hero title
	 *
	 * @return string
	 */
	public function render_hero_title() {
		return esc_html( get_theme_mod( 'hero_title', __( 'Welcome to our site', 'cu-classic-theme' ) ) );
	}

	/**
	 * Render hero description
	 *
	 * @return string
	 */
	public function render_hero_description() {
		return esc_html( get_theme_mod( 'hero_description', __( 'Discover amazing content', 'cu-classic-theme' ) ) );
	}
}
