<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Constellation_Technologies
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'constellation' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'constellation' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'constellation' ), 'constellation', '<a href="https://www.mm4solutions.com/">Millennium Marketing Solutions</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<nav id="mobile-navigation">

			<?php
					wp_nav_menu( array(
							'theme_location' => 'main-menu',
							'menu_id'        => 'mobile-menu',
							'container'        => 'div',
							'container_class'        => 'mobile-menu-container'
					) );
			?>

	</nav>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
