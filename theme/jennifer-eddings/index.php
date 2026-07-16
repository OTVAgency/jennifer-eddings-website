<?php
/**
 * Fallback index — redirects layout to front-page content when no posts.
 *
 * @package Jennifer_Eddings
 */

get_header();
?>
<section class="content-section">
	<div class="section-heading">
		<p class="eyebrow"><?php esc_html_e( 'Jennifer Eddings', 'jennifer-eddings' ); ?></p>
		<h2><?php esc_html_e( 'Set a static front page in Settings → Reading to use the brand home layout.', 'jennifer-eddings' ); ?></h2>
	</div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class( 'story-body' ); ?>>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</section>
<?php
get_footer();
