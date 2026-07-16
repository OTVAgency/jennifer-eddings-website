<?php
/**
 * Single post / appearance detail.
 *
 * @package Jennifer_Eddings
 */

get_header();
?>

<section class="page-hero">
	<div class="section-inner">
		<p class="eyebrow"><?php esc_html_e( 'Story', 'jennifer-eddings' ); ?></p>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<h1 class="display-serif" style="max-width: 18ch;"><?php the_title(); ?></h1>
			<p class="appearance-meta" style="margin-top: 1rem;"><?php echo esc_html( get_the_date() ); ?></p>
		<?php endwhile; ?>
		<?php rewind_posts(); ?>
	</div>
</section>

<section class="section" style="padding-top: 2rem;">
	<div class="section-inner" style="max-width: 720px;">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'story-body' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="speak-banner" style="max-width: none; margin-bottom: 2rem;">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
				<?php endif; ?>
				<div class="about-body">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<div class="hero-actions" style="margin-top: 2.5rem;">
			<a class="link-arrow" href="<?php echo esc_url( home_url( '/appearances/' ) ); ?>"><?php esc_html_e( 'All appearances', 'jennifer-eddings' ); ?></a>
			<a class="link-arrow link-solid" href="<?php echo esc_url( home_url( '/#connect' ) ); ?>"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
