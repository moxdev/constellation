<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Constellation_Technologies
 */

get_header();
?>

	<div id="primary" class="content-area hentry">
		<div class='wrapper'>
			<main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation( array(
									'prev_text'                  => __( 'Previous' ),
									'next_text'                  => __( 'Next' ),
									'screen_reader_text' => __( 'Continue Reading' )
					) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>


			</main><!-- #main -->

			<?php get_sidebar(); ?>

		</div><!-- wrapper -->
	</div><!-- #primary -->

<?php

get_footer();
