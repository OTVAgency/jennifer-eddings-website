<?php
/**
 * Header template.
 *
 * @package Jennifer_Eddings
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>" type="image/svg+xml">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="page-shell">
	<header class="topbar">
		<div class="brand-lockup">
			<span class="brand-dot" aria-hidden="true"></span>
			<div>
				<p class="topbar-label">Jennifer Eddings</p>
				<p class="topbar-subtitle">The Call Light Collective</p>
			</div>
		</div>
		<nav class="topnav" aria-label="<?php esc_attr_e( 'Primary', 'jennifer-eddings' ); ?>">
			<a href="#story"><?php esc_html_e( 'About', 'jennifer-eddings' ); ?></a>
			<a href="#collective"><?php esc_html_e( 'The Collective', 'jennifer-eddings' ); ?></a>
			<a href="#connect"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
		</nav>
	</header>
