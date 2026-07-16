<?php
/**
 * Header — Juliette-inspired personal brand layout.
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
<header class="site-header">
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img class="logo-mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/clc-mark.png' ); ?>" alt="<?php esc_attr_e( 'Call Light Collective', 'jennifer-eddings' ); ?>" width="56" height="56">
		<span>Jennifer Eddings</span>
	</a>
	<nav class="nav" aria-label="<?php esc_attr_e( 'Primary', 'jennifer-eddings' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'jennifer-eddings' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'About', 'jennifer-eddings' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#collaborate' ) ); ?>"><?php esc_html_e( 'Collaborate', 'jennifer-eddings' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#collective' ) ); ?>"><?php esc_html_e( 'Collective', 'jennifer-eddings' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/appearances/' ) ); ?>"><?php esc_html_e( 'Appearances', 'jennifer-eddings' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#connect' ) ); ?>"><?php esc_html_e( 'Connect', 'jennifer-eddings' ); ?></a>
	</nav>
</header>
