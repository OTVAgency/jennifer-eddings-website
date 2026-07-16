<?php
/**
 * Blog / posts index — same card layout as Appearances.
 *
 * @package Jennifer_Eddings
 */

get_header();
$theme_uri = get_template_directory_uri();
?>

<section class="page-hero">
	<div class="section-inner">
		<p class="eyebrow"><?php esc_html_e( 'Press · Podcast · Stage', 'jennifer-eddings' ); ?></p>
		<h1 class="display-sans"><?php esc_html_e( 'Appearances & stories', 'jennifer-eddings' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Recent episodes, features, and moments from Jennifer Eddings and The Call Light Collective.', 'jennifer-eddings' ); ?></p>
	</div>
</section>

<section class="section" style="padding-top: 0;">
	<div class="section-inner">
		<?php if ( have_posts() ) : ?>
			<div class="appearance-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					$cats  = get_the_category();
					$label = $cats ? $cats[0]->name : __( 'Story', 'jennifer-eddings' );
					?>
					<article <?php post_class( 'appearance-card' ); ?>>
						<a class="appearance-media" href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/jen-speak.jpg' ); ?>" alt="" width="1200" height="1600">
							<?php endif; ?>
							<span class="appearance-tag"><?php echo esc_html( $label ); ?></span>
						</a>
						<div class="appearance-body">
							<p class="appearance-meta"><?php echo esc_html( get_the_date() ); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<a class="link-arrow" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'jennifer-eddings' ); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p class="lead"><?php esc_html_e( 'No stories published yet.', 'jennifer-eddings' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
