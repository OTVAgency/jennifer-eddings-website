<?php
/**
 * Blog / posts index — auto-updating feed + WordPress posts.
 *
 * @package Jennifer_Eddings
 */

get_header();

$theme_uri = get_template_directory_uri();
$podcast   = je_mod( 'je_podcast_url', 'https://thecalllightco.buzzsprout.com' );
$instagram = je_mod( 'je_instagram_url', 'https://www.instagram.com/jen_the_rn_82' );
$tiktok    = je_mod( 'je_tiktok_url', 'https://www.tiktok.com/@jen_the_rn_82' );
$linkedin  = je_mod( 'je_linkedin_url', 'https://www.linkedin.com/in/chiefspiritofficer/' );
$youtube   = je_mod( 'je_youtube_url', 'https://www.youtube.com/playlist?list=PL-4T6LUTX9bmv0SdZEaJEWEPFSuGzuqQJ' );
$items     = je_blog_feed_items();
?>

<section class="page-hero">
	<div class="sparkle-field" data-sparkles="40" aria-hidden="true"></div>
	<div class="section-inner">
		<p class="eyebrow reveal"><?php esc_html_e( 'Podcast · Stage · Social', 'jennifer-eddings' ); ?></p>
		<h1 class="display-sans reveal"><?php esc_html_e( 'Blog', 'jennifer-eddings' ); ?></h1>
		<hr class="glitz-rule reveal" aria-hidden="true">
		<p class="lead reveal"><?php esc_html_e( 'Episodes, videos, and moments from Jennifer Eddings — a living feed that updates as new stories go live.', 'jennifer-eddings' ); ?></p>
		<p class="feed-status reveal"><?php esc_html_e( 'Updated from podcast RSS, Call Light Collective YouTube, and site posts.', 'jennifer-eddings' ); ?></p>
	</div>
</section>

<section class="section" style="padding-top: 0;">
	<div class="section-inner">
		<div class="appearance-filters reveal" role="group" aria-label="<?php esc_attr_e( 'Filter blog', 'jennifer-eddings' ); ?>">
			<button type="button" class="filter-chip is-active" data-filter="all" aria-pressed="true"><?php esc_html_e( 'All', 'jennifer-eddings' ); ?></button>
			<button type="button" class="filter-chip" data-filter="podcast" aria-pressed="false"><?php esc_html_e( 'Podcast', 'jennifer-eddings' ); ?></button>
			<button type="button" class="filter-chip" data-filter="video" aria-pressed="false"><?php esc_html_e( 'Video', 'jennifer-eddings' ); ?></button>
			<button type="button" class="filter-chip" data-filter="speaking" aria-pressed="false"><?php esc_html_e( 'Speaking', 'jennifer-eddings' ); ?></button>
			<button type="button" class="filter-chip" data-filter="feature" aria-pressed="false"><?php esc_html_e( 'Feature', 'jennifer-eddings' ); ?></button>
		</div>

		<p class="appearance-empty" hidden><?php esc_html_e( 'No posts in this category yet.', 'jennifer-eddings' ); ?></p>

		<div class="appearance-grid reveal-stagger">
			<?php if ( $items ) : ?>
				<?php foreach ( $items as $item ) : ?>
					<?php
					$external = 0 === strpos( $item['url'], 'http' );
					$rel      = $external ? ' target="_blank" rel="noopener noreferrer"' : '';
					?>
					<article class="appearance-card reveal" data-category="<?php echo esc_attr( $item['category'] ); ?>">
						<a class="appearance-media" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $rel; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
							<img src="<?php echo esc_url( $item['image'] ); ?>" alt="" width="1200" height="1600" loading="lazy">
							<span class="appearance-tag"><?php echo esc_html( $item['tag'] ); ?></span>
						</a>
						<div class="appearance-body">
							<p class="appearance-meta"><?php echo esc_html( $item['dateLabel'] ); ?></p>
							<h2><a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $rel; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $item['title'] ); ?></a></h2>
							<p><?php echo esc_html( $item['excerpt'] ); ?></p>
							<a class="link-arrow" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $rel; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $item['cta'] ); ?></a>
						</div>
					</article>
				<?php endforeach; ?>
			<?php else : ?>
				<p class="blog-loading"><?php esc_html_e( 'No posts yet — check back soon.', 'jennifer-eddings' ); ?></p>
			<?php endif; ?>
		</div>

		<aside class="social-strip reveal">
			<p class="eyebrow"><?php esc_html_e( 'Follow along', 'jennifer-eddings' ); ?></p>
			<div class="social-strip-links">
				<?php if ( $podcast ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Podcast', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
				<?php if ( $youtube ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'YouTube', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
				<?php if ( $instagram ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Instagram', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
				<?php if ( $tiktok ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'TikTok', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
				<?php if ( $linkedin ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LinkedIn', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
			</div>
		</aside>

		<div class="appearances-cta">
			<p class="eyebrow"><?php esc_html_e( 'Want Jennifer on your stage or show?', 'jennifer-eddings' ); ?></p>
			<h2 class="display-serif" style="max-width: 18ch; font-size: clamp(2rem, 4vw, 3rem);"><?php esc_html_e( 'Let’s build the next story together.', 'jennifer-eddings' ); ?></h2>
			<div class="hero-actions" style="margin-top: 1.5rem;">
				<a class="link-arrow link-solid" href="<?php echo esc_url( home_url( '/#connect' ) ); ?>"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
				<?php if ( $podcast ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'All episodes', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
