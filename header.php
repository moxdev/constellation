<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Constellation_Technologies
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'constellation' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="masthead-wrapper">
				<div class="site-branding">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
						else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
						endif;
						$maverick_description = get_bloginfo( 'description', 'display' );
						if ( $maverick_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $maverick_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
						<button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<div id="nav-icon">
										<span>&bull;</span>
										<span>&bull;</span>
										<span>&bull;</span>
								</div>
						</button>

						<?php
								wp_nav_menu( array(
										'theme_location'  => 'main-menu',
										'menu_id'         => 'primary-menu',
										'container'       => 'div',
										'container_class' => 'masthead-menu-container'
								) );
						?>
				</nav><!-- #site-navigation -->

		</div><!-- .masthead-wrapper -->
	</header><!-- #masthead -->

	<?php if( function_exists( 'constellation_custom_header_section' ) ) : constellation_custom_header_section(); endif; ?>

	<div id="content" class="site-content">
