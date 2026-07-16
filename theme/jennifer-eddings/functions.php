<?php
/**
 * Jennifer Eddings theme functions.
 *
 * @package Jennifer_Eddings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JE_THEME_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function je_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 120,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'jennifer-eddings' ),
		)
	);
}
add_action( 'after_setup_theme', 'je_theme_setup' );

/**
 * Enqueue styles and scripts.
 */
function je_enqueue_assets() {
	$uri = get_template_directory_uri();

	wp_enqueue_style(
		'je-main',
		$uri . '/assets/css/main.css',
		array(),
		JE_THEME_VERSION
	);

	wp_enqueue_script(
		'je-main',
		$uri . '/assets/js/main.js',
		array(),
		JE_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'je_enqueue_assets' );

/**
 * Customizer: contact + socials (filled after client spreadsheet returns).
 */
function je_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'je_brand',
		array(
			'title'    => __( 'Jennifer Eddings Brand', 'jennifer-eddings' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'je_public_email'   => array( 'label' => __( 'Public contact email', 'jennifer-eddings' ), 'default' => '' ),
		'je_booking_url'    => array( 'label' => __( 'Booking / speaking URL', 'jennifer-eddings' ), 'default' => '' ),
		'je_media_kit_url'  => array( 'label' => __( 'Media kit URL', 'jennifer-eddings' ), 'default' => '' ),
		'je_instagram_url'  => array( 'label' => __( 'Instagram URL', 'jennifer-eddings' ), 'default' => 'https://www.instagram.com/jen_the_rn_82' ),
		'je_linkedin_url'   => array( 'label' => __( 'LinkedIn URL', 'jennifer-eddings' ), 'default' => 'https://www.linkedin.com/in/chiefspiritofficer/' ),
		'je_facebook_url'   => array( 'label' => __( 'Facebook URL', 'jennifer-eddings' ), 'default' => 'https://www.facebook.com/jennifer.eddings.33' ),
		'je_youtube_url'    => array( 'label' => __( 'YouTube URL', 'jennifer-eddings' ), 'default' => 'https://www.youtube.com/@ComfortMeasuresMedia' ),
		'je_podcast_url'    => array( 'label' => __( 'Podcast URL', 'jennifer-eddings' ), 'default' => 'https://thecalllightco.buzzsprout.com' ),
		'je_headline'       => array( 'label' => __( 'Hero headline', 'jennifer-eddings' ), 'default' => 'Nurse leader, storyteller, and host of The Call Light Collective.' ),
		'je_support_line'   => array( 'label' => __( 'Hero support line', 'jennifer-eddings' ), 'default' => 'A grounded home for Jennifer Eddings — professionalism with authenticity, heart, and humor.' ),
	);

	foreach ( $fields as $id => $args ) {
		if ( false !== strpos( $id, 'email' ) ) {
			$sanitize = 'sanitize_email';
			$type     = 'email';
		} elseif ( false !== strpos( $id, 'url' ) ) {
			$sanitize = 'esc_url_raw';
			$type     = 'url';
		} else {
			$sanitize = 'sanitize_text_field';
			$type     = 'textarea';
		}

		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $args['default'],
				'sanitize_callback' => $sanitize,
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $args['label'],
				'section' => 'je_brand',
				'type'    => $type,
			)
		);
	}
}
add_action( 'customize_register', 'je_customize_register' );

/**
 * Helper: theme mod with fallback.
 *
 * @param string $key     Theme mod key.
 * @param string $default Default value.
 * @return string
 */
function je_mod( $key, $default = '' ) {
	$value = get_theme_mod( $key, $default );
	return is_string( $value ) ? $value : $default;
}
