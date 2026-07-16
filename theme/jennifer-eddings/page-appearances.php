<?php
/**
 * Template Name: Appearances
 * Description: Recent appearances / blog-style listing for Jennifer Eddings.
 *
 * @package Jennifer_Eddings
 */

get_header();

$theme_uri = get_template_directory_uri();
$podcast   = je_mod( 'je_podcast_url', 'https://thecalllightco.buzzsprout.com' );

$query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 12,
		'ignore_sticky_posts' => true,
	)
);
?>

<section class="page-hero">
	<div class="section-inner">
		<p class="eyebrow"><?php esc_html_e( 'Press · Podcast · Stage', 'jennifer-eddings' ); ?></p>
		<h1 class="display-sans"><?php esc_html_e( 'Appearances & stories', 'jennifer-eddings' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Recent episodes, features, and moments from Jennifer Eddings and The Call Light Collective — a living feed of where the conversation is happening.', 'jennifer-eddings' ); ?></p>
	</div>
</section>

<section class="section" style="padding-top: 0;">
	<div class="section-inner">
		<?php if ( $query->have_posts() ) : ?>
			<div class="appearance-grid">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					$cats  = get_the_category();
					$label = $cats ? $cats[0]->name : __( 'Story', 'jennifer-eddings' );
					$link  = get_permalink();
					$ext   = get_post_meta( get_the_ID(), 'appearance_external_url', true );
					if ( $ext ) {
						$link = $ext;
					}
					?>
					<article <?php post_class( 'appearance-card' ); ?>>
						<a class="appearance-media" href="<?php echo esc_url( $link ); ?>" <?php echo $ext ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-speak.jpg' ); ?>" alt="" width="1200" height="1600">
							<?php endif; ?>
							<span class="appearance-tag"><?php echo esc_html( $label ); ?></span>
						</a>
						<div class="appearance-body">
							<p class="appearance-meta"><?php echo esc_html( get_the_date() ); ?></p>
							<h2><a href="<?php echo esc_url( $link ); ?>" <?php echo $ext ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<a class="link-arrow" href="<?php echo esc_url( $link ); ?>" <?php echo $ext ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>><?php esc_html_e( 'Read more', 'jennifer-eddings' ); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<div class="appearance-grid">
				<article class="appearance-card">
					<a class="appearance-media" href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-speak.jpg' ); ?>" alt="" width="1200" height="1600">
						<span class="appearance-tag"><?php esc_html_e( 'Podcast', 'jennifer-eddings' ); ?></span>
					</a>
					<div class="appearance-body">
						<p class="appearance-meta"><?php esc_html_e( 'The Call Light Collective', 'jennifer-eddings' ); ?></p>
						<h2><a href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Listen to the latest episodes', 'jennifer-eddings' ); ?></a></h2>
						<p><?php esc_html_e( 'Publish WordPress posts (or add an Appearances page with posts) to fill this feed. Until then, the podcast is the living archive.', 'jennifer-eddings' ); ?></p>
						<a class="link-arrow" href="<?php echo esc_url( $podcast ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Listen', 'jennifer-eddings' ); ?></a>
					</div>
				</article>
			</div>
		<?php endif; ?>

		<div class="appearances-cta">
			<p class="eyebrow"><?php esc_html_e( 'Want Jennifer on your stage or show?', 'jennifer-eddings' ); ?></p>
			<h2 class="display-serif" style="max-width: 18ch; font-size: clamp(2rem, 4vw, 3rem);"><?php esc_html_e( 'Let’s build the next appearance together.', 'jennifer-eddings' ); ?></h2>
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
