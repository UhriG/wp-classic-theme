<?php
/**
 * Footer Customizer Settings
 *
 * @package CUCT
 */

namespace CUCT\Customizer;

/**
 * Footer class for customizer settings
 */
class Footer {

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
		// Add Footer Section.
		$wp_customize->add_section(
			'footer_section',
			array(
				'title'    => __( 'Footer Settings', 'cu-classic-theme' ),
				'priority' => 90,
			)
		);

		// Footer Logo.
		$wp_customize->add_setting(
			'footer_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label'   => __( 'Footer Logo', 'cu-classic-theme' ),
					'section' => 'footer_section',
				)
			)
		);

		// Contact Information.
		$wp_customize->add_setting(
			'footer_contact_title',
			array(
				'default'           => __( 'Contact', 'cu-classic-theme' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_contact_title',
			array(
				'label'   => __( 'Contact Section Title', 'cu-classic-theme' ),
				'section' => 'footer_section',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'footer_contact_content',
			array(
				'default'           => __( 'Get in touch with us', 'cu-classic-theme' ),
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_contact_content',
			array(
				'label'   => __( 'Contact Content', 'cu-classic-theme' ),
				'section' => 'footer_section',
				'type'    => 'textarea',
			)
		);

		// Add partials for live preview.
		$wp_customize->selective_refresh->add_partial(
			'footer_contact_title',
			array(
				'selector'            => '.footer-contact-title',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_contact_title' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_contact_content',
			array(
				'selector'            => '.footer-contact-content',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_contact_content' ),
			)
		);

		// Add logo partial.
		$wp_customize->selective_refresh->add_partial(
			'footer_logo',
			array(
				'selector'            => '.footer-logo-wrapper',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_footer_logo' ),
			)
		);

		// Quick Links Title Setting.
		$wp_customize->add_setting(
			'footer_quicklinks_title',
			array(
				'default'           => __( 'Quick Links', 'cu-classic-theme' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_quicklinks_title',
			array(
				'label'   => __( 'Quick Links Title', 'cu-classic-theme' ),
				'section' => 'footer_section',
				'type'    => 'text',
			)
		);

		// Add Quick Links partial.
		$wp_customize->selective_refresh->add_partial(
			'footer_quicklinks_title',
			array(
				'selector'            => '.footer-quicklinks-title',
				'container_inclusive' => false,
				'render_callback'     => array( $this, 'render_quicklinks_title' ),
			)
		);
	}

	/**
	 * Render contact title
	 *
	 * @return string
	 */
	public function render_contact_title() {
		return esc_html( get_theme_mod( 'footer_contact_title', __( 'Contact', 'cu-classic-theme' ) ) );
	}

	/**
	 * Render contact content
	 *
	 * @return string
	 */
	public function render_contact_content() {
		return wp_kses_post( get_theme_mod( 'footer_contact_content', __( 'Get in touch with us', 'cu-classic-theme' ) ) );
	}
}
