<?php
/**
 * Front page template — personal brand one-pager.
 *
 * @package Jennifer_Eddings
 */

get_header();

$theme_uri    = get_template_directory_uri();
$headline     = je_mod( 'je_headline', 'Nurse leader, storyteller, and host of The Call Light Collective.' );
$support      = je_mod( 'je_support_line', 'A grounded home for Jennifer Eddings — professionalism with authenticity, heart, and humor.' );
$email        = je_mod( 'je_public_email', '' );
$booking      = je_mod( 'je_booking_url', '' );
$media_kit    = je_mod( 'je_media_kit_url', '' );
$instagram    = je_mod( 'je_instagram_url', 'https://www.instagram.com/jen_the_rn_82' );
$linkedin     = je_mod( 'je_linkedin_url', 'https://www.linkedin.com/in/chiefspiritofficer/' );
$facebook     = je_mod( 'je_facebook_url', 'https://www.facebook.com/jennifer.eddings.33' );
$youtube      = je_mod( 'je_youtube_url', 'https://www.youtube.com/@ComfortMeasuresMedia' );
?>

<section class="hero-section">
	<div class="hero-copy">
		<p class="eyebrow"><?php esc_html_e( 'BSN, RN, NPD-BC', 'jennifer-eddings' ); ?></p>
		<h1><?php echo esc_html( $headline ); ?></h1>
		<p class="hero-credentials"><?php esc_html_e( 'Podcast Host · Nurse Leader · Speaker', 'jennifer-eddings' ); ?></p>
		<p class="hero-text"><?php echo esc_html( $support ); ?></p>
		<div class="hero-actions">
			<a class="button button-primary" href="#connect"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
			<a class="button button-secondary" href="#collective"><?php esc_html_e( 'The Call Light Collective', 'jennifer-eddings' ); ?></a>
		</div>
	</div>
	<aside class="hero-side">
		<div class="monogram-panel">
			<img
				class="monogram"
				src="<?php echo esc_url( $theme_uri . '/assets/images/clc-monogram.png' ); ?>"
				alt="<?php esc_attr_e( 'Call Light Collective monogram', 'jennifer-eddings' ); ?>"
				width="438"
				height="438"
			>
		</div>
		<p class="roles-row">
			<span><?php esc_html_e( 'Critical Care', 'jennifer-eddings' ); ?></span>
			<span><?php esc_html_e( 'ICU Leadership', 'jennifer-eddings' ); ?></span>
			<span><?php esc_html_e( 'Nursing Professional Development', 'jennifer-eddings' ); ?></span>
		</p>
	</aside>
</section>

<section class="content-section" id="story">
	<div class="section-heading">
		<p class="eyebrow"><?php esc_html_e( 'About Jennifer', 'jennifer-eddings' ); ?></p>
		<h2><?php esc_html_e( 'Connection, storytelling, and culture — with room for heart and humor.', 'jennifer-eddings' ); ?></h2>
	</div>
	<div class="story-grid">
		<div class="story-body">
			<p>
				<?php esc_html_e( 'Jennifer Eddings is a Daisy Award–winning nurse leader whose work spans Critical Care, ICU leadership, and nursing professional development. She builds spaces where people feel seen and supported — pairing professionalism with authenticity and unfiltered honesty.', 'jennifer-eddings' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'As founder and host of The Call Light Collective, she champions healthcare storytelling and culture that helps nurses and leaders stay human in the work. Her voice has been featured in Women’s History Month healthcare storytelling, and she collaborates across podcast sponsorships, speaking, panels, advocacy, and brand partnerships.', 'jennifer-eddings' ); ?>
			</p>
		</div>
		<aside class="quote-panel">
			<p class="quote-mark" aria-hidden="true">&ldquo;</p>
			<p class="quote-text"><?php esc_html_e( 'Spaces where people feel seen, supported, and still able to laugh.', 'jennifer-eddings' ); ?></p>
		</aside>
	</div>
</section>

<section class="content-section" id="collective">
	<div class="section-heading">
		<p class="eyebrow"><?php esc_html_e( 'The Call Light Collective', 'jennifer-eddings' ); ?></p>
		<h2><?php esc_html_e( 'Story-led conversations for nurses, leaders, and anyone who answers the call.', 'jennifer-eddings' ); ?></h2>
	</div>
	<div class="collective-grid">
		<div class="video-frame">
			<video
				controls
				playsinline
				preload="metadata"
				poster="<?php echo esc_url( $theme_uri . '/assets/images/call-light-watermark.png' ); ?>"
			>
				<source src="<?php echo esc_url( $theme_uri . '/assets/video/call-light-intro.mp4' ); ?>" type="video/mp4">
				<?php esc_html_e( 'Your browser does not support embedded video.', 'jennifer-eddings' ); ?>
			</video>
		</div>
		<div class="collective-copy">
			<p>
				<?php esc_html_e( 'The Call Light Collective is Jennifer’s platform for healing-centered storytelling — a place to grow the podcast, guest features, and future press without losing the human tone that makes the brand trustable.', 'jennifer-eddings' ); ?>
			</p>
			<ul class="promise-list">
				<li><?php esc_html_e( 'Rooted in Jennifer’s voice and lived experience', 'jennifer-eddings' ); ?></li>
				<li><?php esc_html_e( 'Built for podcast growth, guests, and collaborations', 'jennifer-eddings' ); ?></li>
				<li><?php esc_html_e( 'Ready for media kit and appearance links as they land', 'jennifer-eddings' ); ?></li>
			</ul>
			<div class="hero-actions" style="margin-top: 1.5rem;">
				<?php if ( $youtube ) : ?>
					<a class="button button-secondary" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Watch on YouTube', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
				<?php if ( $media_kit ) : ?>
					<a class="button button-primary" href="<?php echo esc_url( $media_kit ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Media kit', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="content-section connect-section" id="connect">
	<div class="section-heading">
		<p class="eyebrow"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></p>
		<h2><?php esc_html_e( 'Collaborations, speaking, and conversations that matter.', 'jennifer-eddings' ); ?></h2>
	</div>
	<div class="connect-panel">
		<div class="connect-copy">
			<p>
				<?php esc_html_e( 'For podcast sponsorships, speaking, panels, advocacy, or brand partnerships — start here. Public email and booking details will appear as soon as Jennifer confirms them.', 'jennifer-eddings' ); ?>
			</p>
			<div class="hero-actions">
				<?php if ( $email ) : ?>
					<a class="button button-primary" href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php esc_html_e( 'Email Jennifer', 'jennifer-eddings' ); ?></a>
				<?php else : ?>
					<span class="button button-primary button-disabled" aria-disabled="true"><?php esc_html_e( 'Public email coming soon', 'jennifer-eddings' ); ?></span>
				<?php endif; ?>
				<?php if ( $booking ) : ?>
					<a class="button button-secondary" href="<?php echo esc_url( $booking ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Book speaking', 'jennifer-eddings' ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( ! $email ) : ?>
				<p class="pending-note"><?php esc_html_e( 'Preferred public contact email is requested in the OTV content sheet — not published until confirmed.', 'jennifer-eddings' ); ?></p>
			<?php endif; ?>
		</div>
		<ul class="social-list">
			<?php if ( $instagram ) : ?>
				<li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer">Instagram <span>@jen_the_rn_82</span></a></li>
			<?php endif; ?>
			<?php if ( $linkedin ) : ?>
				<li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn <span>chiefspiritofficer</span></a></li>
			<?php endif; ?>
			<?php if ( $facebook ) : ?>
				<li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer">Facebook <span>Jennifer Eddings</span></a></li>
			<?php endif; ?>
			<?php if ( $youtube ) : ?>
				<li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer">YouTube <span>Comfort Measures Media</span></a></li>
			<?php endif; ?>
		</ul>
	</div>
</section>

<?php
get_footer();
