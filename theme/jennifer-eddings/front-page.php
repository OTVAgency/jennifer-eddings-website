<?php
/**
 * Front page — Juliette-inspired personal brand layout.
 *
 * @package Jennifer_Eddings
 */

get_header();

$theme_uri = get_template_directory_uri();
$email     = je_mod( 'je_public_email', '' );
$booking   = je_mod( 'je_booking_url', '' );
$instagram = je_mod( 'je_instagram_url', 'https://www.instagram.com/jen_the_rn_82' );
$linkedin  = je_mod( 'je_linkedin_url', 'https://www.linkedin.com/in/chiefspiritofficer/' );
$facebook  = je_mod( 'je_facebook_url', 'https://www.facebook.com/jennifer.eddings.33' );
$youtube   = je_mod( 'je_youtube_url', 'https://www.youtube.com/@ComfortMeasuresMedia' );
?>

<section class="hero" id="top">
	<div class="hero-copy">
		<h1 class="hero-name">Jennifer<br>Eddings</h1>
		<p class="hero-role">
			Nurse leader <span class="ital">and</span> storyteller
		</p>
		<p class="hero-intro">
			<strong><?php esc_html_e( 'Hello — I’m Jennifer.', 'jennifer-eddings' ); ?></strong>
			<?php esc_html_e( 'BSN, RN, NPD-BC. Host of The Call Light Collective. I create spaces where nurses and leaders feel seen, supported, and still able to laugh.', 'jennifer-eddings' ); ?>
		</p>
		<div class="hero-actions">
			<a class="link-arrow link-solid" href="#connect"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
			<a class="link-arrow" href="#collective"><?php esc_html_e( 'The Collective', 'jennifer-eddings' ); ?></a>
		</div>
	</div>
	<aside class="hero-media">
		<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-hero.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings recording The Call Light Collective', 'jennifer-eddings' ); ?>" width="1200" height="1500">
	</aside>
</section>

<section class="section" id="about">
	<div class="section-inner">
		<p class="eyebrow"><?php esc_html_e( 'About me', 'jennifer-eddings' ); ?></p>
		<h2 class="display-serif">
			<?php esc_html_e( 'Connection', 'jennifer-eddings' ); ?> <span class="ital"><?php esc_html_e( 'has', 'jennifer-eddings' ); ?></span> <?php esc_html_e( 'always been', 'jennifer-eddings' ); ?> <strong><?php esc_html_e( 'my language', 'jennifer-eddings' ); ?></strong>
		</h2>
		<div class="about-grid">
			<div class="about-body">
				<p><?php esc_html_e( 'I’m Jennifer, a Daisy Award–winning nurse leader whose work spans Critical Care, ICU leadership, and nursing professional development. I help people stay human in the work — with professionalism, authenticity, and unfiltered honesty.', 'jennifer-eddings' ); ?></p>
				<p><?php esc_html_e( 'As founder and host of The Call Light Collective, I champion healthcare storytelling and culture. Whether on a stage, a podcast, or a panel, the goal is the same: spaces where people feel seen and supported.', 'jennifer-eddings' ); ?></p>
				<p class="lead" style="margin-top: 1.75rem;"><?php esc_html_e( 'I work with collaborators, sponsors, and audiences who care about nursing culture, healing-centered stories, and voices that tell the truth with heart.', 'jennifer-eddings' ); ?></p>
			</div>
			<div class="about-mosaic">
				<figure class="mosaic-main">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-about.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings portrait', 'jennifer-eddings' ); ?>" width="1000" height="1250">
				</figure>
				<figure class="mosaic-side">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-lifestyle.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings', 'jennifer-eddings' ); ?>" width="1000" height="750">
				</figure>
				<figure class="mosaic-side mosaic-side-b">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-duo.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings at the roundtable', 'jennifer-eddings' ); ?>" width="900" height="900">
				</figure>
			</div>
		</div>
		<div class="stat-row">
			<span>BSN, RN, NPD-BC</span>
			<span><?php esc_html_e( 'Daisy Award', 'jennifer-eddings' ); ?></span>
			<span>ICU · NPD · Leadership</span>
		</div>
	</div>
</section>

<section class="section band-plum" id="collaborate">
	<div class="section-inner">
		<div class="services-head">
			<div>
				<img class="clc-mark" src="<?php echo esc_url( $theme_uri . '/assets/images/clc-monogram.png' ); ?>" alt="" width="80" height="80">
				<p class="eyebrow"><?php esc_html_e( 'Explore', 'jennifer-eddings' ); ?></p>
				<h2 class="display-sans"><?php esc_html_e( 'Collaborate', 'jennifer-eddings' ); ?></h2>
			</div>
			<p class="lead" style="margin: 0;"><?php esc_html_e( 'Personalized collaborations designed to reveal the heart of nursing stories — on mic, on stage, and in culture.', 'jennifer-eddings' ); ?></p>
		</div>
		<div class="service-grid">
			<article class="service-card">
				<p class="service-kicker"><?php esc_html_e( 'podcast', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Host & features', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Guest features, sponsorships, and story-led episodes through The Call Light Collective.', 'jennifer-eddings' ); ?></p>
			</article>
			<article class="service-card">
				<p class="service-kicker"><?php esc_html_e( 'stage', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Speaking', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Keynotes, panels, and event hosting rooted in leadership, culture, and lived experience.', 'jennifer-eddings' ); ?></p>
			</article>
			<article class="service-card">
				<p class="service-kicker"><?php esc_html_e( 'brand', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Partnerships', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Advocacy, product spotlights, and campaigns that align with authenticity over polish.', 'jennifer-eddings' ); ?></p>
			</article>
		</div>

		<figure class="speak-banner">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-speak.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings at the roundtable', 'jennifer-eddings' ); ?>" width="1200" height="1600">
			<figcaption><?php esc_html_e( 'At the mic — stories told in the room.', 'jennifer-eddings' ); ?></figcaption>
		</figure>

		<div class="collective-block" id="collective">
			<div class="video-frame">
				<video controls playsinline preload="metadata" poster="<?php echo esc_url( $theme_uri . '/assets/images/jen-stage.jpg' ); ?>">
					<source src="<?php echo esc_url( $theme_uri . '/assets/video/call-light-intro.mp4' ); ?>" type="video/mp4">
					<?php esc_html_e( 'Your browser does not support embedded video.', 'jennifer-eddings' ); ?>
				</video>
			</div>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'The Call Light Collective', 'jennifer-eddings' ); ?></p>
				<h2 class="display-serif" style="max-width: 12ch; font-size: clamp(2rem, 4vw, 3rem);">
					<?php esc_html_e( 'Story-led conversations for anyone who answers the call', 'jennifer-eddings' ); ?>
				</h2>
				<p class="lead"><?php esc_html_e( 'Healing-centered storytelling for nurses, leaders, and collaborators — with room to grow guests, press, and community.', 'jennifer-eddings' ); ?></p>
				<div class="hero-actions">
					<?php if ( $youtube ) : ?>
						<a class="link-arrow" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Watch on YouTube', 'jennifer-eddings' ); ?></a>
					<?php endif; ?>
					<?php if ( $booking ) : ?>
						<a class="link-arrow" href="<?php echo esc_url( $booking ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Book speaking', 'jennifer-eddings' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section connect" id="connect">
	<div class="section-inner">
		<div class="connect-grid">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></p>
				<h2 class="display-sans"><?php esc_html_e( 'Let’s talk', 'jennifer-eddings' ); ?></h2>
				<p class="lead"><?php esc_html_e( 'For podcast sponsorships, speaking, panels, advocacy, or brand partnerships — start here.', 'jennifer-eddings' ); ?></p>
				<?php if ( $email ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php esc_html_e( 'Email Jennifer', 'jennifer-eddings' ); ?></a>
				<?php else : ?>
					<span class="pending"><?php esc_html_e( 'Public email coming soon', 'jennifer-eddings' ); ?></span>
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
					<li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer">YouTube <span>CMC Media</span></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>

<?php
get_footer();
