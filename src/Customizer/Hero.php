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
				'title'    => __( 'Global Hero Section', 'cu-classic-theme' ),
				'priority' => 30,
			)
		);

		// Home Hero Settings.
		$this->add_hero_settings( $wp_customize, 'hero_section', 'hero', __( 'Home Hero Title', 'cu-classic-theme' ), __( 'Home Hero Description', 'cu-classic-theme' ) );

		// About Page Hero Settings.
		$wp_customize->add_section(
			'about_hero_section',
			array(
				'title'    => __( 'About Page Hero', 'cu-classic-theme' ),
				'priority' => 35,
			)
		);

		$this->add_hero_settings( $wp_customize, 'about_hero_section', 'about_hero', __( 'About Hero Title', 'cu-classic-theme' ), __( 'About Hero Description', 'cu-classic-theme' ) );

		// Page Hero Settings.
		$wp_customize->add_section(
			'page_hero_section',
			array(
				'title'    => __( 'Page Hero', 'cu-classic-theme' ),
				'priority' => 40,
			)
		);

		$this->add_hero_settings( $wp_customize, 'page_hero_section', 'page_hero', __( 'Page Hero Title', 'cu-classic-theme' ), __( 'Page Hero Description', 'cu-classic-theme' ) );
	}

	/**
	 * Add hero settings to a section
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer instance.
	 * @param string                $section_id Section to add hero settings to.
	 * @param string                $setting_prefix Prefix for the setting IDs.
	 * @param string                $title_label Label for title field.
	 * @param string                $description_label Label for description field.
	 * @return void
	 */
	public function add_hero_settings( $wp_customize, $section_id, $setting_prefix, $title_label, $description_label ) {
		$this->add_title_setting( $wp_customize, $setting_prefix . '_title', $title_label, $section_id );
		$this->add_description_setting( $wp_customize, $setting_prefix . '_description', $description_label, $section_id );
	}

	/**
	 * Add title setting and control
	 *
	 * @param \WP_Customize_Manager $wp_customize WordPress customizer object.
	 * @param string                $setting_id Setting ID.
	 * @param string                $label Control label.
	 * @param string                $section Section ID (optional).
	 */
	private function add_title_setting( $wp_customize, $setting_id, $label, $section = 'hero_section' ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => $section,
				'type'    => 'text',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$setting_id,
			array(
				'selector'            => ".hero-title[data-hero='{$setting_id}']",
				'container_inclusive' => false,
				'render_callback'     => function () use ( $setting_id ) {
					return esc_html( get_theme_mod( $setting_id ) );
				},
			)
		);
	}

	/**
	 * Add description setting and control
	 *
	 * @param \WP_Customize_Manager $wp_customize WordPress customizer object.
	 * @param string                $setting_id Setting ID.
	 * @param string                $label Control label.
	 * @param string                $section Section ID (optional).
	 */
	private function add_description_setting( $wp_customize, $setting_id, $label, $section = 'hero_section' ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => $section,
				'type'    => 'textarea',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			$setting_id,
			array(
				'selector'            => ".hero-description[data-hero='{$setting_id}']",
				'container_inclusive' => false,
				'render_callback'     => function () use ( $setting_id ) {
					return esc_html( get_theme_mod( $setting_id ) );
				},
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
