<?php
/**
 * Front page — personal brand layout for Jennifer Eddings.
 *
 * @package Jennifer_Eddings
 */

get_header();

$theme_uri = get_template_directory_uri();
$email     = je_mod( 'je_public_email', '' );
$booking   = je_mod( 'je_booking_url', '' );
$instagram = je_mod( 'je_instagram_url', 'https://www.instagram.com/jen_the_rn_82' );
$tiktok    = je_mod( 'je_tiktok_url', 'https://www.tiktok.com/@jen_the_rn_82' );
$linkedin  = je_mod( 'je_linkedin_url', 'https://www.linkedin.com/in/chiefspiritofficer/' );
$facebook  = je_mod( 'je_facebook_url', 'https://www.facebook.com/jennifer.eddings.33' );
$youtube   = je_mod( 'je_youtube_url', 'https://www.youtube.com/playlist?list=PL-4T6LUTX9bmv0SdZEaJEWEPFSuGzuqQJ' );
$podcast   = je_mod( 'je_podcast_url', 'https://thecalllightco.buzzsprout.com' );
?>

<section class="hero" id="top">
	<div class="hero-copy">
		<div class="sparkle-field" data-sparkles="55" aria-hidden="true"></div>
		<h1 class="hero-name"><span class="hero-name-text">Jennifer<br>Eddings</span></h1>
		<p class="hero-role">
			Nurse leader <span class="ital">and</span> storyteller
		</p>
		<hr class="glitz-rule" aria-hidden="true">
		<p class="hero-intro">
			<strong><?php esc_html_e( 'Hello — I’m Jennifer.', 'jennifer-eddings' ); ?></strong>
			<?php esc_html_e( 'BSN, RN, NPD-BC. I create spaces where nurses and leaders feel seen, supported, and still able to laugh.', 'jennifer-eddings' ); ?>
		</p>
		<div class="hero-actions">
			<a class="link-arrow link-solid" href="#collaborate"><?php esc_html_e( 'Collaborate', 'jennifer-eddings' ); ?></a>
			<a class="link-arrow" href="#connect"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
		</div>
	</div>
	<aside class="hero-media">
		<div class="sparkle-field" data-sparkles="36" aria-hidden="true"></div>
		<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-hero.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings', 'jennifer-eddings' ); ?>" width="1200" height="1600">
	</aside>
</section>

<section class="section" id="about">
	<div class="section-inner">
		<p class="eyebrow reveal"><?php esc_html_e( 'About me', 'jennifer-eddings' ); ?></p>
		<h2 class="display-serif reveal">
			<?php esc_html_e( 'Connection', 'jennifer-eddings' ); ?> <span class="ital"><?php esc_html_e( 'has', 'jennifer-eddings' ); ?></span> <?php esc_html_e( 'always been', 'jennifer-eddings' ); ?> <strong><?php esc_html_e( 'my language', 'jennifer-eddings' ); ?></strong>
		</h2>
		<div class="about-grid">
			<div class="about-body reveal reveal-left">
				<p><?php esc_html_e( 'I’m Jennifer, a Daisy Award–winning nurse leader whose work spans Critical Care, ICU leadership, and nursing professional development. I help people stay human in the work — with professionalism, authenticity, and unfiltered honesty.', 'jennifer-eddings' ); ?></p>
				<p><?php esc_html_e( 'Whether on a stage, a podcast, or a panel, the goal is the same: spaces where people feel seen and supported. I champion healthcare storytelling and culture that tells the truth with heart.', 'jennifer-eddings' ); ?></p>
				<p class="lead" style="margin-top: 1.75rem;"><?php esc_html_e( 'I work with collaborators, sponsors, and audiences who care about nursing culture, healing-centered stories, and voices that refuse to shrink.', 'jennifer-eddings' ); ?></p>
			</div>
			<div class="about-mosaic reveal reveal-scale">
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
	</div>
</section>

<section class="section band-plum" id="collaborate">
	<div class="sparkle-field" data-sparkles="60" aria-hidden="true"></div>
	<div class="section-inner">
		<div class="services-head reveal">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Explore', 'jennifer-eddings' ); ?></p>
				<h2 class="display-sans"><?php esc_html_e( 'Collaborate', 'jennifer-eddings' ); ?></h2>
			</div>
			<p class="lead" style="margin: 0;"><?php esc_html_e( 'Personalized collaborations designed to reveal the heart of nursing stories — on mic, on stage, and in culture.', 'jennifer-eddings' ); ?></p>
		</div>
		<div class="service-grid reveal-stagger">
			<article class="service-card reveal">
				<p class="service-kicker"><?php esc_html_e( 'podcast', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Host & features', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Guest features, sponsorships, and story-led episodes through her podcast, The Call Light Collective.', 'jennifer-eddings' ); ?></p>
			</article>
			<article class="service-card reveal">
				<p class="service-kicker"><?php esc_html_e( 'stage', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Speaking', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Keynotes, panels, and event hosting rooted in leadership, culture, and lived experience.', 'jennifer-eddings' ); ?></p>
			</article>
			<article class="service-card reveal">
				<p class="service-kicker"><?php esc_html_e( 'brand', 'jennifer-eddings' ); ?></p>
				<h3><?php esc_html_e( 'Partnerships', 'jennifer-eddings' ); ?></h3>
				<p><?php esc_html_e( 'Advocacy, product spotlights, and campaigns that align with authenticity over polish.', 'jennifer-eddings' ); ?></p>
			</article>
		</div>

		<figure class="speak-banner reveal reveal-scale">
			<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-speak.jpg' ); ?>" alt="<?php esc_attr_e( 'Jennifer Eddings at the roundtable', 'jennifer-eddings' ); ?>" width="1200" height="1600">
			<figcaption><?php esc_html_e( 'At the mic — stories told in the room.', 'jennifer-eddings' ); ?></figcaption>
		</figure>

		<div class="collective-block reveal" id="podcast">
			<div class="video-frame">
				<video controls playsinline preload="metadata" poster="<?php echo esc_url( $theme_uri . '/assets/images/jen-stage.jpg' ); ?>">
					<source src="<?php echo esc_url( $theme_uri . '/assets/video/call-light-intro.mp4' ); ?>" type="video/mp4">
					<?php esc_html_e( 'Your browser does not support embedded video.', 'jennifer-eddings' ); ?>
				</video>
			</div>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Podcast', 'jennifer-eddings' ); ?></p>
				<h2 class="display-serif" style="max-width: 14ch; font-size: clamp(2rem, 4vw, 3rem);">
					<?php esc_html_e( 'Story-led conversations for anyone who answers the call', 'jennifer-eddings' ); ?>
				</h2>
				<p class="lead"><?php esc_html_e( 'Jennifer hosts The Call Light Collective — healing-centered storytelling for nurses, leaders, and collaborators.', 'jennifer-eddings' ); ?></p>
				<div class="hero-actions">
					<?php if ( $podcast ) : ?>
						<a class="link-arrow link-solid" href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Listen to the podcast', 'jennifer-eddings' ); ?></a>
					<?php endif; ?>
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
			<div class="reveal reveal-left">
				<p class="eyebrow"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></p>
				<h2 class="display-sans"><?php esc_html_e( 'Let’s talk', 'jennifer-eddings' ); ?></h2>
				<hr class="glitz-rule" aria-hidden="true">
				<p class="lead"><?php esc_html_e( 'For podcast sponsorships, speaking, panels, advocacy, or brand partnerships — start here.', 'jennifer-eddings' ); ?></p>
				<?php if ( $email ) : ?>
					<a class="link-arrow" href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php esc_html_e( 'Email Jennifer', 'jennifer-eddings' ); ?></a>
				<?php else : ?>
					<span class="pending"><?php esc_html_e( 'Public email coming soon', 'jennifer-eddings' ); ?></span>
				<?php endif; ?>

				<ul class="social-list reveal-stagger">
					<?php if ( $podcast ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer">Podcast <span><?php esc_html_e( 'Listen', 'jennifer-eddings' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( $youtube ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer">YouTube <span><?php esc_html_e( 'Call Light Collective', 'jennifer-eddings' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( $instagram ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer">Instagram <span>@jen_the_rn_82</span></a></li>
					<?php endif; ?>
					<?php if ( $tiktok ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener noreferrer">TikTok <span>@jen_the_rn_82</span></a></li>
					<?php endif; ?>
					<?php if ( $linkedin ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn <span>chiefspiritofficer</span></a></li>
					<?php endif; ?>
					<?php if ( $facebook ) : ?>
						<li class="reveal"><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer">Facebook <span>Jennifer Eddings</span></a></li>
					<?php endif; ?>
				</ul>
			</div>

			<?php
			$form_to = $email ? $email : 'cory@otv.agency';
			$form_action = 'https://formsubmit.co/ajax/' . rawurlencode( $form_to );
			?>
			<form
				class="inquiry-form reveal"
				id="inquiry-form"
				action="<?php echo esc_url( $form_action ); ?>"
				method="POST"
				novalidate
			>
				<p class="inquiry-form-label"><?php esc_html_e( 'Booking & collaboration inquiry', 'jennifer-eddings' ); ?></p>
				<input type="hidden" name="_subject" value="<?php echo esc_attr__( 'Jennifer Eddings — website inquiry', 'jennifer-eddings' ); ?>">
				<input type="hidden" name="_template" value="table">
				<input type="text" name="_honey" class="inquiry-honey" tabindex="-1" autocomplete="off" aria-hidden="true">

				<label class="inquiry-field">
					<span><?php esc_html_e( 'Name', 'jennifer-eddings' ); ?></span>
					<input type="text" name="name" required autocomplete="name" placeholder="<?php esc_attr_e( 'Your name', 'jennifer-eddings' ); ?>">
				</label>
				<label class="inquiry-field">
					<span><?php esc_html_e( 'Email', 'jennifer-eddings' ); ?></span>
					<input type="email" name="email" required autocomplete="email" placeholder="you@email.com">
				</label>
				<label class="inquiry-field">
					<span><?php esc_html_e( 'Organization', 'jennifer-eddings' ); ?> <em><?php esc_html_e( '(optional)', 'jennifer-eddings' ); ?></em></span>
					<input type="text" name="organization" autocomplete="organization" placeholder="<?php esc_attr_e( 'Podcast, brand, or event', 'jennifer-eddings' ); ?>">
				</label>
				<label class="inquiry-field">
					<span><?php esc_html_e( 'I’m interested in', 'jennifer-eddings' ); ?></span>
					<select name="interest" required>
						<option value="" disabled selected><?php esc_html_e( 'Select one', 'jennifer-eddings' ); ?></option>
						<option value="Speaking / keynote"><?php esc_html_e( 'Speaking / keynote', 'jennifer-eddings' ); ?></option>
						<option value="Podcast guest or feature"><?php esc_html_e( 'Podcast guest or feature', 'jennifer-eddings' ); ?></option>
						<option value="Sponsorship / partnership"><?php esc_html_e( 'Sponsorship / partnership', 'jennifer-eddings' ); ?></option>
						<option value="Media / interview"><?php esc_html_e( 'Media / interview', 'jennifer-eddings' ); ?></option>
						<option value="Something else"><?php esc_html_e( 'Something else', 'jennifer-eddings' ); ?></option>
					</select>
				</label>
				<label class="inquiry-field">
					<span><?php esc_html_e( 'Message', 'jennifer-eddings' ); ?></span>
					<textarea name="message" rows="5" required placeholder="<?php esc_attr_e( 'Tell Jennifer a bit about the opportunity…', 'jennifer-eddings' ); ?>"></textarea>
				</label>

				<button type="submit" class="link-arrow link-solid inquiry-submit"><?php esc_html_e( 'Send inquiry', 'jennifer-eddings' ); ?></button>
				<p class="inquiry-status" id="inquiry-status" role="status" aria-live="polite" hidden></p>
			</form>
		</div>
	</div>
</section>

<?php
get_footer();
