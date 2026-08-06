<?php
/**
 * Jennifer Eddings theme functions.
 *
 * @package Jennifer_Eddings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JE_THEME_VERSION', '1.1.0' );

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
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

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
 * Customizer: contact + socials + feed URLs.
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
		'je_podcast_rss'    => array( 'label' => __( 'Podcast RSS URL', 'jennifer-eddings' ), 'default' => 'https://feeds.buzzsprout.com/2539726.rss' ),
		'je_youtube_rss'    => array( 'label' => __( 'YouTube RSS URL', 'jennifer-eddings' ), 'default' => 'https://www.youtube.com/feeds/videos.xml?channel_id=UCZ110niJgCXxHuk2AEcCnNg' ),
		'je_headline'       => array( 'label' => __( 'Hero headline', 'jennifer-eddings' ), 'default' => 'Nurse leader, storyteller, and speaker.' ),
		'je_support_line'   => array( 'label' => __( 'Hero support line', 'jennifer-eddings' ), 'default' => 'A personal brand home for Jennifer Eddings — professionalism with authenticity, heart, and humor.' ),
	);

	foreach ( $fields as $id => $args ) {
		if ( false !== strpos( $id, 'email' ) ) {
			$sanitize = 'sanitize_email';
			$type     = 'email';
		} elseif ( false !== strpos( $id, 'url' ) || false !== strpos( $id, 'rss' ) ) {
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

/**
 * Strip tags / collapse whitespace for feed excerpts.
 *
 * @param string $html Raw HTML.
 * @return string
 */
function je_plain_excerpt( $html, $length = 180 ) {
	$text = wp_strip_all_tags( $html );
	$text = preg_replace( '/\s+/', ' ', $text );
	$text = trim( $text );
	if ( strlen( $text ) <= $length ) {
		return $text;
	}
	return substr( $text, 0, $length - 1 ) . '…';
}

/**
 * Fetch RSS items via WordPress SimplePie wrapper.
 *
 * @param string $rss_url Feed URL.
 * @param string $category podcast|video.
 * @param int    $limit Max items.
 * @return array<int, array<string, string>>
 */
function je_fetch_rss_items( $rss_url, $category, $limit = 12 ) {
	if ( ! $rss_url ) {
		return array();
	}

	include_once ABSPATH . WPINC . '/feed.php';
	$feed = fetch_feed( $rss_url );
	if ( is_wp_error( $feed ) ) {
		return array();
	}

	$max   = $feed->get_item_quantity( $limit );
	$items = $feed->get_items( 0, $max );
	$out   = array();

	foreach ( $items as $item ) {
		$link  = $item->get_permalink();
		$title = $item->get_title();
		$date  = $item->get_date( 'c' );
		$img   = '';

		if ( method_exists( $item, 'get_enclosure' ) ) {
			$enc = $item->get_enclosure();
			if ( $enc && $enc->get_thumbnail() ) {
				$img = $enc->get_thumbnail();
			} elseif ( $enc && $enc->get_link() && false !== strpos( (string) $enc->get_type(), 'image' ) ) {
				$img = $enc->get_link();
			}
		}

		$out[] = array(
			'id'        => $item->get_id() ?: $link,
			'category'  => $category,
			'title'     => $title,
			'excerpt'   => je_plain_excerpt( $item->get_description() ),
			'url'       => $link,
			'date'      => $date ? gmdate( 'Y-m-d', strtotime( $date ) ) : '',
			'dateLabel' => $date ? date_i18n( get_option( 'date_format' ), strtotime( $date ) ) : '',
			'image'     => $img,
			'cta'       => 'podcast' === $category ? __( 'Listen', 'jennifer-eddings' ) : __( 'Watch', 'jennifer-eddings' ),
			'source'    => 'rss',
		);
	}

	return $out;
}

/**
 * Build merged blog feed: RSS + WP posts.
 *
 * @return array<int, array<string, string>>
 */
function je_blog_feed_items() {
	$theme_uri   = get_template_directory_uri();
	$fallback    = $theme_uri . '/assets/images/jen-speak.jpg';
	$podcast_rss = je_mod( 'je_podcast_rss', 'https://feeds.buzzsprout.com/2539726.rss' );
	$youtube_rss = je_mod( 'je_youtube_rss', 'https://www.youtube.com/feeds/videos.xml?channel_id=UCZ110niJgCXxHuk2AEcCnNg' );

	$items = array_merge(
		je_fetch_rss_items( $podcast_rss, 'podcast', 12 ),
		je_fetch_rss_items( $youtube_rss, 'video', 8 )
	);

	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => 12,
			'ignore_sticky_posts' => true,
		)
	);

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$cats  = get_the_category();
			$slug  = $cats ? sanitize_title( $cats[0]->slug ) : 'feature';
			$label = $cats ? $cats[0]->name : __( 'Feature', 'jennifer-eddings' );
			$ext   = get_post_meta( get_the_ID(), 'appearance_external_url', true );
			$link  = $ext ? $ext : get_permalink();
			$img   = get_the_post_thumbnail_url( get_the_ID(), 'large' );
			if ( ! $img ) {
				$img = $fallback;
			}
			$items[] = array(
				'id'        => 'post-' . get_the_ID(),
				'category'  => $slug,
				'title'     => get_the_title(),
				'excerpt'   => je_plain_excerpt( get_the_excerpt() ),
				'url'       => $link,
				'date'      => get_the_date( 'Y-m-d' ),
				'dateLabel' => get_the_date(),
				'image'     => $img,
				'cta'       => __( 'Read more', 'jennifer-eddings' ),
				'source'    => 'wordpress',
				'tag'       => $label,
			);
		}
		wp_reset_postdata();
	}

	usort(
		$items,
		static function ( $a, $b ) {
			return strcmp( $b['date'], $a['date'] );
		}
	);

	foreach ( $items as &$item ) {
		if ( empty( $item['image'] ) ) {
			$item['image'] = $fallback;
		}
		if ( empty( $item['tag'] ) ) {
			$item['tag'] = ucfirst( $item['category'] );
		}
	}

	return $items;
}

/**
 * Redirect legacy Appearances page slug to Blog posts page.
 */
function je_redirect_appearances_to_blog() {
	if ( is_admin() ) {
		return;
	}
	$request = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	if ( preg_match( '#/appearances/?$#', $request ) ) {
		$blog = get_permalink( get_option( 'page_for_posts' ) );
		if ( ! $blog ) {
			$blog = home_url( '/blog/' );
		}
		wp_safe_redirect( $blog, 301 );
		exit;
	}
}
add_action( 'template_redirect', 'je_redirect_appearances_to_blog' );
