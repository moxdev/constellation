<?php
/**
 * Template Name: Capabilities
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Constellation_Technologies
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="wrapper">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				<?php if( function_exists( 'constellation_capabilities_icon_section' ) ) : constellation_capabilities_icon_section(); endif; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
